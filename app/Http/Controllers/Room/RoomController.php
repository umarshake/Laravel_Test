<?php

namespace App\Http\Controllers\Room;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Room;
use App\Models\RoomImage;
use Exception;
use DB;

class RoomController extends Controller{
    
    public function index(){
    	if(request()->ajax()){
            $draw = $_REQUEST['draw'];
            $start = $_REQUEST['start'];
            $length = $_REQUEST['length'];

            $discountFields = [
                'id',
                'room_number',
                'room_type',
                'room_price',
                'number_of_people',
                'created_at'
            ];

            $roomRaw = Room::select($discountFields);
            $recordsFiltered = $recordsTotal = $roomRaw->count();
            $apisearch = false;
            if (!empty($_REQUEST['search']['value'])) {
                $searchValue = trim($_REQUEST['search']['value']);
                $roomRaw->where(function ($query) use($discountFields, $searchValue) {
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
                        $columnOrderBy = "room_number";
                        break;
                    case 2:
                        $columnOrderBy = "room_type";
                        break;    
                    case 3:
                        $columnOrderBy = "room_price";
                        break;
                    case 4:
                        $columnOrderBy = "number_of_people";
                        break;
                    
                    case 5:
                        $columnOrderBy = "created_at";
                        break;    
                }
                if(!empty($columnOrderBy)){
                    $roomRaw->orderBy($columnOrderBy,$dir);
                    $apisearch = true;
                }
            }

            if ($apisearch) {
                $recordsFiltered = $recordsTotal = $roomRaw->count();
            }
            $rooms = $roomRaw
                            ->offset($start)
                            ->limit($length)
                            ->get();

            $results = ["draw" => intval($draw),
                "recordsTotal" => $recordsTotal,
                "recordsFiltered" => $recordsFiltered
            ];
            $roomObj = new Room;
            if (count($rooms) > 0) {
                $results['data'] = $roomObj->roomScreenOutput($rooms);
            } else {
                $results['data'] = array();
            }

            echo json_encode($results);
            exit;
        } else {
            return view('room.room');
        }
    }

    public function add(){
    	return view('room.room-add');
    }

    public function store(Request $request){

    	$room = new Room; 
        $validator = Validator::make($request->all(),$room->roomRules);

        # If error in form data
    	if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $data = $request->except('_token','room_images');
        
        DB::beginTransaction();
        try{
            $roomRow = $room->create($data);
        	
        	if($request->has('room_images') and is_array($request->room_images)){
        		foreach ($request->room_images as $key => $file) {
                    $fileName = $roomRow->id .'-room-image-'. date('ymdhis').'.'.  $file->getClientOriginalExtension();
                    $fileDestinationPath = public_path('images/room/');
                    $return = $room->validateFile($file, $fileName, $fileDestinationPath);
                    if (!$return['status']) {
                        return redirect()->back()->withInput()->with('error', 'file is not valid');
                    }

                    RoomImage::insert([
                        'room_id' => $roomRow->id,
                        'image' => 'images/room/'. $fileName,
                    ]);
                }
        	}
	    	
	    	DB::commit();
	        return redirect(route('room.index'))->with('success', 'Room added successfully');
	    } catch(\Exception $e){
	    	DB::rollBack();
	    	return redirect()->back()->with('error', 'Some error occured. Please try again!')->withInput();
	    }    
    }

    public function edit($id){
    	$room = Room::with('roomimage')->findOrFail($id);
    	return view('room.room-edit',compact('room'));
    }

    public function update(Request $request,$id){
        $room = new Room;
        $validator = Validator::make($request->all(),$room->roomRules);

        # If error in form data
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $data = $request->except('_token','room_images');
        
        DB::beginTransaction();
        try{
            $room->where('id',$id)->update($data);
            if($request->has('room_images') and is_array($request->room_images)){
                
                foreach ($request->room_images as $key => $file) {
                    $fileName = $id .'-room-image-'. date('ymdhis').'.'.  $file->getClientOriginalExtension();
                    $fileDestinationPath = public_path('images/room/');
                    $return = $room->validateFile($file, $fileName, $fileDestinationPath);
                    if (!$return['status']) {
                        return redirect()->back()->withInput()->with('error', 'file is not valid');
                    }
                    RoomImage::insert([
                        'room_id' => $id,
                        'image' => 'images/room/'. $fileName,
                    ]);
                }
            }
            
            DB::commit();
            return redirect(route('room.index'))->with('success', 'Room added successfully');
        } catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();

            return redirect()->back()->with('error', 'Some error occured. Please try again!')->withInput();
        }    
    }

    public function delete($id){
    	Booking::findOrFail($id)->delete();
    	return redirect(route('booking.index'))->with('success', 'Booking deleted successfully');
    }

    public function deleteRoomImage($id){
        try{
            $roomImage = RoomImage::findOrFail($id);
            unlink($roomImage->image);
            $roomImage->delete();
            return response()->json([
                'status' => 'SUCCESS',
                'message' => "Image deleted!"
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 'ERROR',
                'message' => "Image not deleted!"
            ]);
        }    
        
    }

    
}
