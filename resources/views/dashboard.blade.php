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
                    <li class="active"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                {{ __('Dashboard') }}
            </h2>
            <small></small>
        </div>
    </div>
</div>


<div class="content animate-panel">
    <div class="row">
    	<div class="col-lg-12">
        	<div class="hpanel">
            	<div class="panel-body">
					<h3>Detail</h3>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection