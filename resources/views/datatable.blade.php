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
                    <table id="datatable" class="table table-striped table-bordered table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Feed Id</th>
                                <th># Of Products</th>
                                <th>Status</th>
                                <th style="max-width:100px">Request</th>
                                <th style="max-width:100px">Response</th>
                                <th>Created At</th>
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
    $('#datatable').DataTable();
</script>
@endpush