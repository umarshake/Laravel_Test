<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    public function room(){
    	return $this->belongs(Room::class);
    }
}
