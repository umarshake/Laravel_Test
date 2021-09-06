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
                        <a href="{{ route('booking.index') }}">{{ __('Invoice') }}</a>
                    </li>
                    <li class="active">
                        <span>{{ __('Create') }}</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                {{ __('Invoice') }}
            </h2>
            <small>{{ __('Create Invoice') }}</small>
        </div>
    </div>
</div>

<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <i class="fa fa-bars"></i> Generate Invoice
                </div>
                <div class="panel-body">
                    <table id="bookingTableList" class="table table-bordered  table-responsive" style="width: 100%;">
                        <thead>
                            <tr>
                                <th colspan="2">Room Booking Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Full Name</th><td> {{$data['full_name']}}</td>
                            </tr>
                            <tr>
                                <th>Father's Name</th><td> {{$data['fathers_name']}}</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th><td> {{$data['mobile_number']}}</td>
                            </tr>
                            <tr>
                                <th>Email Id</th><td> {{$data['email']}}</td>
                            </tr>
                            <tr>
                                <th>Room Number</th><td> {{explode('=',$data['room_number'])[0]}}</td>
                            </tr>
                            <tr>
                                <th>Room Amount</th><td> {{explode('=',$data['room_number'])[1]}}</td>
                            </tr>
                            <tr>
                                <th>Check In Date</th><td> {{$data['check_in_date']}}</td>
                            </tr>
                            <tr>
                                <th>Check Out Date</th><td> {{$data['check_out_date']}}</td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input type="hidden" name="make_booking" value="make_booking">
                            <a href="{{ route('invoice.create') }}" class="btn btn-lg btn-success m-t-n-xs pull-right" type="submit"><strong>Generate Invoice</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
</script>
@endpush