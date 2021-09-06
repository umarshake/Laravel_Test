<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $roomRules = [
    	'room_number' => 'required',
    	'room_type' => 'required',
    	'room_price' => 'required',
    	'room_images' => 'sometimes|required|array'
    ];

    public $fillable = [
    	'room_number',
    	'room_type',
    	'room_price',
    	'number_of_people',
    ];

    public function roomimage(){
    	return $this->hasMany(RoomImage::class);
    }

    public function validateFile($file, $fileName, $fileDestinationPath){
        $message = "";
        if ($file->getSize() == 0) {
            $message = "Invalid file";
            goto errorLabel;
        }
        
        $fileExtention = $file->getClientOriginalExtension();
        if (!in_array($fileExtention, ['jpeg', 'jpg'])) {
            $message = "Please upload " . implode(" / ", $fileExtention) . " file types only.";
            goto errorLabel;
        }

        if ($file->isValid()) {
            try {
                $file->move($fileDestinationPath, $fileName);
                goto successLabel;
            } catch (\Exception $e) {
                $message = "Some error occured while uploading file";
                goto errorLabel;
            }
        }

        errorLabel: if (!empty($message)) {
            return ['status' => false, 'message' => $message];
        }

        successLabel: if (empty($message)) {
            return ['status' => true, 'message' => $message];
        }
        return ['status' => false, 'message' => "Some error occured. Please try again!"];
    }

    function roomScreenOutput($rooms){
    	$return = [];
    	foreach($rooms as $room) {
	        $return [] = [
	            '<a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Click to view detail" data-original-title="Click to view detail" target="_blank" href="">'.$room->id.'</a>',
	            $room->room_number,
	            $room->room_type,
	            $room->room_price,
	            $room->number_of_people,
	            $room->created_at,
	            $action = '<a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Edit" target="_blank" href="'. route('room.edit',$room->id) .'"><i class="fa fa-edit"></i></a>&nbsp;
	            		<a class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Delete" href="'. route('room.delete',$room->id) .'" style="margin-top:2px;"><i class="fa fa-trash"></i></a>',
	            
	        ];
	    } 
	    return $return;
    }
}
