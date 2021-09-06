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
                    <li class="active">
                        <span>{{ __('Booking') }}</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                {{ __('Booking') }}
            </h2>
            <small>{{ __('All Booking') }}</small>
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
                <div class="panel-heading hbuilt" style="height: 50px;">
                    <i class="fa fa-bars"></i> Booking List
                    <div class="panel-tools">
                        <a class="btn btn-primary" href="{{ route('booking.add') }}"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="bookingTableList" class="table table-striped table-bordered table-hover table-responsive" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Check In Date</th>
                                <th>Check In Date</th>
                                <th>Full Name</th>
                                <th>Number #</th>
                                <th>Room #</th>
                                <th>Amount</th>
                                <th>Balance</th>
                                <th>Created At</th>
                                <th style="max-width: 5%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('scripts/datatables-ajax.js') }}"></script>
<script type="text/javascript">

</script>
@endpush