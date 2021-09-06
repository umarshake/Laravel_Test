<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\ApiService;

use App\PropertyType;
use App\Property;
use App\Http\Requests\PropertyStoreRequest;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(){
        return view('dashboard');
    }

    public function datatable(){
        return view('datatable');
    }

    public function blankpage(){
        return view('blankpage');
    }

    public function getData($page,ApiService $api_service){

        $response = $api_service->getDataFromApi($page);

        try {
            foreach ($response['data'] as $key => $item) {
                # code...
               $id = PropertyType::find($item['property_type_id']);
                if(! $id) {
                    $property_type = PropertyType::create($item['property_type']);
                }

                $property = Property::updateOrCreate([
                    'uuid' => $item['uuid']
                ],[
                    'uuid'  => $item['uuid'],
                    'county'  => $item['county'],
                    'country'  => $item['country'],
                    'town'  => $item['town'],
                    'description'  => $item['description'],
                    'address'  => $item['address'],
                    'latitude'  => $item['latitude'],
                    'longitude'  => $item['longitude'],
                    'image_full'  => $item['image_full'],
                    'image_thumbnail'  => $item['image_thumbnail'],
                    'num_bedrooms'  => $item['num_bedrooms'],
                    'num_bathrooms'  => $item['num_bathrooms'],
                    'price'  => $item['price'],
                    'for'  => $item['type'],
                    'property_type_id'  => $item['property_type_id'],
                    'created_at'  => $item['created_at'],
                    'updated_at'  => $item['updated_at'],
                ]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return "Data Saved Successfully";

    }

    public function listData(){

        if(request()->ajax()){
            $request = request()->all();
            $offset = $request['start'];
            $limit = $request['length'];

            $recordsFiltered = $recordsTotal = Property::count();
            $results = [
                "draw" => $request['draw'],
                "recordsTotal" => $recordsTotal,
                "recordsFiltered" => $recordsFiltered
            ];

            $properties = Property::select([
                'uuid','county','country','town','address','image_full','image_thumbnail'
            ])->offset($offset)->limit($limit)->get()->toArray();
            if (count($properties) > 0) {

                $properties =array_map(function($item){
                    return 
                        [
                            $item['uuid'],
                            $item['county'],
                            $item['country'],
                            $item['town'],
                            $item['address'],
                            "<img width=100 height=100 src='".$item['image_full']."'>",
                            "<img width=50 height=50 src='".$item['image_thumbnail']."'>",
                            "<a class='btn btn-danger' href='/delete/".$item['uuid']."'>Delete</a>",
                            "<a class='btn btn-danger' href='/edit/".$item['uuid']."'>Edit</a>"
                        ];
    
                        
                },$properties);
                
                $results['data'] = $properties;
                
            } else {

                $results['data'] = [];
            }

            echo json_encode($results);

        }
        else
            return view('property.list-properties');
    }

    public function addData(){

        $property_types = PropertyType::select('id','title')->get();
        return view('property.add-property',compact('property_types'));

    }

    public function postData(PropertyStoreRequest $request){

        $image_full = $request->file('image_full');
        $file_path = $image_full->store('images');

        $destinationPath = storage_path('app/');
        $img = \Image::make($image_full->path());
        $img->resize(100, 100);
        $thumnail_path = "thumbnails/".time().'.'.$image_full->extension();
        $img->save($destinationPath.$thumnail_path,50);

        $this->createStorageLink($thumnail_path,$file_path);

        $property = Property::create([
            'uuid' => str_random(35),
            'county'  => $request->county,
            'country'  => $request->country,
            'town'  => $request->town,
            'description'  => $request->description,
            'address'  => $request->address,
            'image_full'  => $file_path,
            'image_thumbnail'  => $thumnail_path,
            'num_bedrooms'  => $request->num_bedrooms,
            'num_bathrooms'  => $request->num_bathrooms,
            'price'  => $request->price,
            'for'  => $request->for,
            'property_type_id'  => $request->property_type_id,
            'created_at'  => date('Y-m-d h:i:s'),
            'updated_at'  => date('Y-m-d h:i:s')
        ]);
        
        return redirect()->back()->with('success', "Property Saved Successfully");
    }

    public function createStorageLink(&$thumnail_path,&$file_path){

        $thumnail_path = (config('app.url')."property_images/".$thumnail_path);
        $file_path = (config('app.url')."property_images/".$file_path);

    }

    public function editData($uuid){
        
        $property = Property::where('uuid',$uuid)->first();
        if(! $property)
            return view('property.list-properties')->with('error', "uuid is not available");
        $property_types = PropertyType::select('id','title')->get();

        return view('property.edit-property',compact('property_types','property'));
    }

    public function updateData($uuid,Request $request){
        $editData = ($request->except('_token'));

        Property::where('uuid',$uuid)->update($editData);

        return redirect()->back()->with('success', "Property Updated Successfully");
    }

    public function deleteData($uuid){

        Property::where('uuid',$uuid)->delete();

        return redirect()->back()->with('success', "Property Updated Successfully");
    }

}
