<?php

namespace App\Http\Controllers\Invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Room;
use App\Models\Booking;
use App\Models\BookingOtherMember;
use Exception;
use Session;
use DB;

class InvoiceController extends Controller{
    
    public function index(){
        $data = Session('invoice-data');
    	return view('invoice.invoice-create',compact('data'));
    }

    protected function create(){
        $data = Session('invoice-data');
        // create invoices table to save invoice data
        // also
        //return view('invoice.invoice-create',compact('request'));
    }
}
