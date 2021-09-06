<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Room;
use App\Models\Booking;
use App\Models\BookingOtherMember;
use Exception;
use Session;
use DB;

class BookingController extends Controller{
    
    public function index(){
    	if(request()->ajax()){
            $draw = $_REQUEST['draw'];
            $start = $_REQUEST['start'];
            $length = $_REQUEST['length'];

            $discountFields = [
                'id',
                'check_in_date',
                'check_out_date',
                'full_name',
                'mobile_number',
                'room_number',
                'payment_amount',
                'balance_total',
                'created_at'
            ];

            $bookingRaw = Booking::select($discountFields);
            $recordsFiltered = $recordsTotal = $bookingRaw->count();
            $apisearch = false;
            if (!empty($_REQUEST['search']['value'])) {
                $searchValue = trim($_REQUEST['search']['value']);
                $bookingRaw->where(function ($query) use($discountFields, $searchValue) {
                    foreach ($discountFields as $column) {
                        $query->orWhere($column, "like", "$searchValue");
                    }
                });
                $apisearch = true;
            }
            if(!empty($_REQUEST['order'][0]['dir'])){
                $dir = $_REQUEST['order'][0]['dir'];
                $columnNumber = $_REQUEST['order'][0]['column'];

                $columnOrderBy = "";
                switch ($columnNumber) {
                    case 0:
                        $columnOrderBy = "id";
                        break;
                    case 1:
                        $columnOrderBy = "check_in_date";
                        break;
                    case 2:
                        $columnOrderBy = "check_out_date";
                        break;    
                    case 3:
                        $columnOrderBy = "full_name";
                        break;
                    case 4:
                        $columnOrderBy = "mobile_number";
                        break;
                    case 4:
                        $columnOrderBy = "room_number";
                        break;
                    case 5:
                        $columnOrderBy = "payment_amount";
                        break;
                    case 6:
                        $columnOrderBy = "balance_total";
                        break;
                    case 6:
                        $columnOrderBy = "created_at";
                        break;    
                }
                if(!empty($columnOrderBy)){
                    $bookingRaw->orderBy($columnOrderBy,$dir);
                    $apisearch = true;
                }
            }

            if ($apisearch) {
                $recordsFiltered = $recordsTotal = $bookingRaw->count();
            }
            $booking = $bookingRaw
                            ->offset($start)
                            ->limit($length)
                            ->get();

            $results = ["draw" => intval($draw),
                "recordsTotal" => $recordsTotal,
                "recordsFiltered" => $recordsFiltered
            ];
            $bookingObj = new Booking;
            if (count($booking) > 0) {
                $results['data'] = $bookingObj->bookingScreenOutput($booking);
            } else {
                $results['data'] = array();
            }

            echo json_encode($results);
            exit;
        } else {
            return view('booking.booking');
        }
    }

    public function add(){
        $rooms = Room::select('id','room_number','room_price','room_type')->get();

    	return view('booking.booking-add',compact('rooms'));
    }

    public function store(Request $request){
    	$booking = new Booking; 
        $validator = Validator::make($request->all(),$booking->bookingRules);

        # If error in form data
    	if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $data = $request->except('_token');
        # Change date formats
        $data['check_in_date'] = date('Y-m-d',strtotime($data['check_in_date']));
        $data['check_out_date'] = date('Y-m-d',strtotime($data['check_out_date']));
        DB::beginTransaction();
        try{
        	$otherName = null;
        	if($request->has('other_name')){
        		$otherName = $request->other_name; 
        		unset($data['other_name']);
        	}
        	$otherMobile = null;
        	if($request->has('other_mobile')){
        		$otherMobile = $request->other_mobile; 
        		unset($data['other_mobile']);
        	}
        	$otherCnic = null;
        	if($request->has('other_cnic')){
        		$otherCnic = $request->other_cnic; 
        		unset($data['other_cnic']);
        	}
	    	$data['room_number'] =  explode('=', $data['room_number'])[0];
	    	$bookingRow = $booking->create($data);

	    	if(is_array($otherName) && is_array($otherMobile) && is_array($otherCnic)){
	    		foreach ($otherName as $key => $value) {
		    		BookingOtherMember::insert([
		    			'booking_id' => $bookingRow->id,
		    			'name' => $value,
		    			'mobile' => $otherMobile[$key],
		    			'cnic' => $otherCnic[$key],
		    		]);
		    	}	
	    	}
	    	DB::commit();
	        return redirect(route('booking.index'))->with('success', 'Booking added successfully');
	    } catch(\Exception $e){
	    	DB::rollBack();
	    	return redirect()->back()->with('error', $e->getMessage())->withInput();

	    	return redirect()->back()->with('error', 'Some error occured. Please try again!')->withInput();
	    }    
    }

    public function edit($id,$book = ''){
    	$booking = Booking::with('othermembers')->findOrFail($id);
        $rooms = Room::select('id','room_number','room_price','room_type')->get();

    	return view('booking.booking-edit',compact('booking','rooms','book'));
    }

    public function update(Request $request,$id){

    	$booking = new Booking; 
        $validator = Validator::make($request->all(),$booking->bookingRules);

        # If error in form data
    	if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $data = $request->except(['_token']);
        # Change date formats
        $data['check_in_date'] = date('Y-m-d',strtotime($data['check_in_date']));
        $data['check_out_date'] = date('Y-m-d',strtotime($data['check_out_date']));
        $makeBooking = false;
        if(isset($data['make_booking'])){
            $makeBooking = true;
            unset($data['make_booking']);
        }
        DB::beginTransaction();
        try{
        	$otherName = null;
        	if($request->has('other_name')){
        		$otherName = $request->other_name; 
        		unset($data['other_name']);
        	}
        	$otherMobile = null;
        	if($request->has('other_mobile')){
        		$otherMobile = $request->other_mobile; 
        		unset($data['other_mobile']);
        	}
        	$otherCnic = null;
        	if($request->has('other_cnic')){
        		$otherCnic = $request->other_cnic; 
        		unset($data['other_cnic']);
        	}

            $data['room_number'] =  explode('=', $data['room_number'])[0];
	    	$booking->where('id',$id)->update($data);
	    	if(is_array($otherName) && is_array($otherMobile) && is_array($otherCnic)){
                BookingOtherMember::where('booking_id',$id)->delete();
	    		foreach ($otherName as $key => $value) {
		    		BookingOtherMember::insert([
                        'booking_id' => $id,
		    			'name' => $value,
		    			'mobile' => $otherMobile[$key],
		    			'cnic' => $otherCnic[$key],
		    		]);
		    	}	
	    	}
	    	DB::commit();
            if($makeBooking){
                $invoiceData = $request->all();
                Session::put('invoice-data',$invoiceData);
                return redirect(route('invoice.index'));
            } else {
                return redirect(route('booking.index'))->with('success', 'Booking updated successfully');
            }
	    } catch(\Exception $e){
	    	DB::rollBack();
	    	return redirect()->back()->with('error', $e->getMessage())->withInput();
	    	return redirect()->back()->with('error', 'Some error occured. Please try again!')->withInput();
	    }    
    }

    public function delete($id){
    	$booking = Booking::findOrFail($id)->delete();
    	return redirect(route('booking.index'))->with('success', 'Booking deleted successfully');
    }

    public function searchCustomer(Request $request){
        $query = $request->input('search');

        if ($query && strlen($query) > 2) {
            $customers = Booking::where('full_name', 'like', $query . '%')
                                ->orWhere('mobile_number', 'like', $query . '%')
                                ->orWhere('cnic', 'like', $query . '%')
                                ->latest()->first();
            if(!is_null($customers)){
                return response()->json([
                    'status' => 'SUCCESS',
                    'data' => $customers
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'data' => "No data found for customer"
                ]);
            }
            
        }
    }
    
}
