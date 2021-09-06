<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingOtherMember extends Model{
    
    public $timestamps = true;

    public function booking(){
    	return $this->belongs(Booking::class);
    }
}
