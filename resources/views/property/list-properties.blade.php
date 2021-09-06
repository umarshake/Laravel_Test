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
                        <span>{{ __('Page') }}</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                {{ __('Page') }}
            </h2>
            <small>{{ __('Page') }}</small>
        </div>
    </div>
</div>

<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <i class="fa fa-bars"></i> Table title
                </div>
                <div class="panel-body">
                    <table id="datatable" class="table table-responsive table-striped table-bordered table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <!-- <th>UUID</th> -->
                                <th>County</th>
                                <th>Country</th>
                                <th>Town</th>
                                <th>Displayable Address</th>
                                <th>Image Full </th>
                                <th>Image Thumbnail </th>
                                <th>Delete</th>
                                <th>Edit</a></th>
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

<script type="text/javascript">
var APP_URL = {!! json_encode(url('/')) !!};
console.log(APP_URL);
    dataTable = $("#datatable").DataTable({
        searching: false,
        serverSide: true,
        processing: true,
        fixedHeader: true,
        ajax: APP_URL + "/listdata/",
    });
</script>
@endpush