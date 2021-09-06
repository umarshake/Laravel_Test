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
                        <span>{{ __('Add') }}</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                {{ __('Booking') }}
            </h2>
            <small>{{ __('Add Booking') }}</small>
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
                    <i class="fa fa-bars"></i> Add Booking
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('booking.store') }}" method="POST" id="booking-form" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Search for existing customer</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value ="" id="search-customer" placeholder="Search Customer">
                            </div>
                            <a class="btn btn-sm btn-primary ladda-button basic-ladda-button" data-style="expand-left" data-toggle="tooltip" data-placement="top" data-original-title="Search Customer" id="search-customer-btn" onclick="searchCustomer(this)"><i class="fa fa-search"> Search</i></a>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Check In Date</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="check_in_date" value ="{{old('check_in_date')}}" id="check-in-date" required>
                            </div>
                            <label class="col-sm-2 control-label">Check Out Date</label>
                            <div class="col-sm-4"> 
                                <input type="text" class="form-control" name="check_out_date" value="{{old('check_out_date')}}" id="check-out-date"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Room Number</label>
                            <div class="col-sm-4"> 
                                <select class="form-control" name="room_number" required onchange="setPriceToFild(this)">
                                    <option value="" selected disabled>Select Customer</option>
                                    @if($rooms->count() > 0)
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->room_number }}={{$room->room_price}}">{{ $room->room_type }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Number of Persons</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Number of Persons" class="form-control" name="number_of_persons" value="{{old('number_of_persons')}}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Full Name" class="form-control" name="full_name" value="{{old('full_name')}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Father's Name</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Father's Name" class="form-control" name="fathers_name" value="{{old('fathers_name')}}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mobile Number</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Mobile Number" class="form-control" name="mobile_number" value="{{old('mobile_number')}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Email Id</label>
                            <div class="col-sm-4"> 
                                <input type="email" placeholder="Email Id" class="form-control" name="email" value="{{old('email')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Vehicle Number</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Vehicle Number" class="form-control" name="vehicle_number" value="{{old('vehicle_number')}}" required>
                            </div>
                            <label class="col-sm-2 control-label">CNIC</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="CNIC" class="form-control" name="cnic" value="{{old('cnic')}}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Adress" class="form-control" name="address" value="{{old('address')}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-4"> 
                                <textarea class="form-control" placeholder="Description" name="description" id="description" required>{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Purpose of Visit</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Purpose of Visit" class="form-control" name="purpose" value="{{old('purpose')}}" required>
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
                        </div>
                        <!-- End of other member --> 
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Payment</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Payment" class="form-control" name="payment_amount" value="{{old('payment_amount')}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Tax</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Tax" class="form-control" name="tax" value="{{old('tax')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Discount</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Discount" class="form-control" name="discount" value="{{old('discount')}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Total</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Total" class="form-control" name="total" value="{{old('total')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Advance Received</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Advance Received" class="form-control" name="advance_received" value="{{old('advance_received')}}" required>
                            </div>
                            <label class="col-sm-2 control-label">Balance Total</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Balance Total" class="form-control" name="balance_total" value="{{old('balance_total')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button class="btn btn-lg btn-success m-t-n-xs pull-right" type="submit"><strong>Add Booking</strong></button>
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
        $('#check-in-date').datepicker({
            format: 'dd-mm-yyyy',
        }).datepicker("setDate", new Date());

        $('#check-out-date').datepicker({
            format: 'dd-mm-yyyy'
        }).datepicker("setDate", new Date());

        $("#booking-form").validate({
            rules: {
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    function searchCustomer(btnObj){
        var ladda = Ladda.create(btnObj);
        var query = $('#search-customer').val();
        if(query == ''){
            toastr.error('Search field is empty!');
            return;
        }
        console.log();
        var ladda = Ladda.create(btnObj);
        var url = APP_URL + "/admin/booking/customers/search" + "?search=" + query;
        $.get(
            url,
            function(response){
                if(response.status == 'SUCCESS'){
                    var data = response.data;
                    $('input[name="full_name"]').val(data.full_name);
                    $('input[name="fathers_name"]').val(data.fathers_name);
                    $('input[name="mobile_number"]').val(data.mobile_number);
                    $('input[name="email"]').val(data.email);
                    $('input[name="vehicle_number"]').val(data.vehicle_number);
                    $('input[name="cnic"]').val(data.cnic);
                    $('input[name="address"]').val(data.address);
                    $('#description').val(data.description);
                    $('input[name="purpose"]').val(data.purpose);
                } else{
                    toastr.error(response.data);
                    ladda.stop();
                }
            }
        ); 
    }

    function setPriceToFild(ds){
        var value = $(ds).val();
        var price = value.split('=')[(value.split('=').length-1)];
        $('input[name="payment_amount"]').val(price);
    }

    function addOtherMemberDetail(ds,rowToAdd){
        var html = '<div class="form-group other-momber-row">\
                        <div class="col-sm-3 col-sm-offset-1">\
                            <label class="col-sm-2">Name</label>\
                            <input type="text" placeholder="Enter Name" class="form-control" name="other_name[]" required>\
                        </div>\
                        <div class=" col-sm-3 ">\
                            <label class="col-sm-2">Mobile</label>\
                            <input type="text" placeholder="Enter Number" class="form-control" name="other_mobile[]" required>\
                        </div>\
                        <div class=" col-sm-3">\
                            <label class="col-sm-2">CNIC</label>\
                            <input type="text" placeholder="Enter CNIC" class="form-control" name="other_cnic[]" required>\
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
</script>
@endpush