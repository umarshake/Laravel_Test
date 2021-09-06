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
                    <i class="fa fa-bars"></i> Page Title
                </div>
                <div class="panel-body">
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