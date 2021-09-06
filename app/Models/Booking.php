<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model{

    public $timestamps = true;

    public $fillable = [
        'check_in_date', 
        'check_out_date', 
        'full_name', 
        'mobile_number', 
        'vehicle_number', 
        'cnic', 
        'room_number', 
        'email',
        'number_of_persons', 
        'address',
        'description', 
        'purpose', 
        'payment_amount', 
        'tax', 
        'discount', 
        'total', 
        'advance_received', 
        'balance_total', 
    ];

    public $bookingRules = [
        'check_in_date' => 'required|date_format:d-m-Y',
        'check_out_date' => 'required|date_format:d-m-Y|after:check_in_date',
        'full_name' => 'required',
        'mobile_number' => 'required|min:10',
        'vehicle_number' => 'required',
        'cnic' => 'required',
        'room_number' => 'required',
        'number_of_persons' => 'required',
        'address' => 'required',
        'purpose' => 'required',
        'payment_amount' => 'required',
        'tax' => 'required',
        'discount' => 'required',
        'total' => 'required',
        'advance_received' => 'required',
        'balance_total' => 'required',
    ];

    public function othermembers(){
    	return $this->hasMany(BookingOtherMember::class);
    }
    public function bookingScreenOutput($booking){
		$return = [];
    	foreach($booking as $booking) {
	        $return [] = [
	            '<a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Click to view detail" data-original-title="Click to view detail" target="_blank" href="">'.$booking->id.'</a>',
	            $booking->check_in_date,
	            $booking->check_out_date,
	            $booking->full_name,
	            $booking->mobile_number,
	            $booking->room_number,
	            $booking->payment_amount,
	            $booking->balance_total,
	            $booking->created_at,
	            $action = '
                    <a class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Make Booking" target="_blank" href="'. route('booking.edit',[$booking->id,'book']) .'"><i class="fa fa-plus"></i></a>&nbsp;
                    <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Edit" target="_blank" href="'. route('booking.edit',$booking->id) .'" style="margin-top:2px;"><i class="fa fa-edit"></i></a>&nbsp;'
	            	// <a class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Delete" href="'. route('booking.delete',$booking->id) .'" style="margin-top:2px;"><i class="fa fa-trash"></i></a>',
	            
	        ];
	    } 
	    return $return;
    }
}
