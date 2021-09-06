@extends('layouts.main')

@section('content')

<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>
            <div id="hbreadcrumb" class="pull-right m-t-lg">
                <ol class="hbreadcrumb breadcrumb">
                    <li><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="">
                        <a href="{{ route('booking.index') }}">{{ __('Booking') }}</a>
                    </li>
                    <li class="active">
                        <span>{{ __('Edit') }}</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                {{ __('Booking') }}
            </h2>
            <small>{{ __('Edit Booking') }}</small>
        </div>
    </div>
</div>

<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if(count($errors))
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <i class="fa fa-bars"></i> Edit Booking
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('booking.update',$booking->id) }}" method="POST" id="booking-form" class="form-horizontal">
                        @csrf
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Check In Date</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="check_in_date" value ="{{date('d-m-Y',strtotime($booking->check_in_date))}}" id="check-in-date" required>
                            </div>
                            <label class="col-sm-2 control-label">Check Out Date</label>
                            <div class="col-sm-4"> 
                                <input type="text" class="form-control" name="check_out_date" value="{{date('d-m-Y',strtotime($booking->check_out_date))}}" id="check-out-date"required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Full Name" class="form-control" name="full_name" value="{{$booking->full_name}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Father's Name</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Father's Name" class="form-control" name="fathers_name" value="{{$booking->fathers_name}}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mobile Number</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Mobile Number" class="form-control" name="mobile_number" value="{{$booking->mobile_number}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Email Id</label>
                            <div class="col-sm-4"> 
                                <input type="email" placeholder="Email Id" class="form-control" name="email" value="{{$booking->email}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Vehicle Number</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Vehicle Number" class="form-control" name="vehicle_number" value="{{$booking->vehicle_number}}" required>
                            </div>
                            <label class="col-sm-2 control-label">CNIC</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="CNIC" class="form-control" name="cnic" value="{{$booking->cnic}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Room Number</label>
                            <div class="col-sm-4"> 
                                <select class="form-control" name="room_number" required onchange="setPriceToFild(this)">
                                    <option value="" disabled>Select Customer</option>

                                    @if($rooms->count() > 0)
                                    @foreach($rooms as $room)
                                    @php 
                                        $selected = '';
                                        if($booking->room_number == $room->room_number){
                                            $select = 'selected'; 
                                        }
                                    @endphp
                                        
                                        <option value="{{ $room->room_number }}={{$room->room_price}}" {{$selected}}>{{ $room->room_type }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Number of Persons</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Number of Persons" class="form-control" name="number_of_persons" value="{{$booking->number_of_persons}}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Adress" class="form-control" name="address" value="{{$booking->address}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-4"> 
                                <textarea class="form-control" placeholder="Description" name="description" required>{{$booking->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Purpose of Visit</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Purpose of Visit" class="form-control" name="purpose" value="{{$booking->purpose}}" required>
                            </div>
                        </div>
                        <hr>
                        <!--  For other member detail -->
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Add detail for  other members</label>
                            <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Add" onclick="addOtherMemberDetail(this,'.other-member-detail')"><i class="fa fa-plus"></i></a>
                        </div> 
                        <div class="other-member-detail">
                            <!-- By jquery -->
                            @if($booking->othermembers)
                                @foreach($booking->othermembers  as $member)
                                <div class="form-group other-momber-row">
                                    <div class="col-sm-3 col-sm-offset-1">
                                        <label class="col-sm-2">Name</label>
                                        <input type="text" placeholder="Enter Name" class="form-control" name="other_name[]" value="{{$member->name}}">
                                    </div>
                                    <div class=" col-sm-3 ">
                                        <label class="col-sm-2">Mobile</label>
                                        <input type="text" placeholder="Enter Number" class="form-control" name="other_mobile[]" value="{{$member->mobile}}">
                                    </div>
                                    <div class=" col-sm-3">
                                        <label class="col-sm-2">CNIC</label>
                                        <input type="text" placeholder="Enter CNIC" class="form-control" name="other_cnic[]" value="{{$member->cnic}}">
                                    </div>
                                </div>
                                @endforeach
                            @endif    
                        </div>
                        <!-- End of other member --> 
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Payment</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Payment" class="form-control" name="payment_amount" value="{{$booking->payment_amount}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Tax</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Tax" class="form-control" name="tax" value="{{$booking->tax}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Discount</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Discount" class="form-control" name="discount" value="{{$booking->discount}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Total</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Total" class="form-control" name="total" value="{{$booking->total}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Advance Received</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Advance Received" class="form-control" name="advance_received" value="{{$booking->advance_received}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Balance Total</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Balance Total" class="form-control" name="balance_total" value="{{$booking->balance_total}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                @if(empty($book))
                                    <button class="btn btn-lg btn-success m-t-n-xs pull-right" type="submit"><strong>Update Booking</strong></button>
                                @else
                                    <input type="hidden" name="make_booking" value="make_booking">
                                    <button class="btn btn-lg btn-success m-t-n-xs pull-right" type="submit"><strong>Update and Book</strong></button>
                                @endif    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')

<script type="text/javascript">
    $(function(){
        $('#check-in-date').datepicker({format: 'dd-mm-yyyy'});
        $('#check-out-date').datepicker({format: 'dd-mm-yyyy'});

        $("#booking-form").validate({
            rules: {
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    function addOtherMemberDetail(ds,rowToAdd){
        var html = '<div class="form-group other-momber-row">\
                        <div class="col-sm-3 col-sm-offset-1">\
                            <label class="col-sm-2">Name</label>\
                            <input type="text" placeholder="Enter Name" class="form-control" name="other_name[]" >\
                        </div>\
                        <div class=" col-sm-3 ">\
                            <label class="col-sm-2">Mobile</label>\
                            <input type="text" placeholder="Enter Number" class="form-control" name="other_mobile[]" >\
                        </div>\
                        <div class=" col-sm-3">\
                            <label class="col-sm-2">CNIC</label>\
                            <input type="text" placeholder="Enter CNIC" class="form-control" name="other_cnic[]" >\
                        </div>\
                        <div class="form-group col-sm-1">\
                            <a class="btn btn-sm btn-danger" style="margin-top: 25px;" data-toggle="tooltip" data-placement="top" data-original-title="Remove" onclick="deleteOtherCusotmerDetail(this,\'.other-momber-row\');"><i class="fa fa-minus"></i></a>\
                        </div>\
                    </div>';
        $(rowToAdd).append(html);            
    }

    function deleteOtherCusotmerDetail(ds,rowToDelete){
        $(ds).parents(rowToDelete).remove();
    }
    function setPriceToFild(ds){
        var value = $(ds).val();
        var price = value.split('=')[(value.split('=').length-1)];
        $('input[name="payment_amount"]').val(price);
    }
</script>
@endpush