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
                        <a href="{{ route('booking.index') }}">{{ __('Room') }}</a>
                    </li>
                    <li class="active">
                        <span>{{ __('Add') }}</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                {{ __('Room') }}
            </h2>
            <small>{{ __('Add Room') }}</small>
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
                    <i class="fa fa-bars"></i> Add Room
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('room.store') }}" method="POST" id="room-form" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Room Number</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Room Number" class="form-control" name="room_number" value="{{old('room_number')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Room Type</label>
                            <div class="col-sm-9">
                                <!-- <select class="form-control" name="room_type">
                                    <option value="" selected>Select Room Type</option>
                                </select> -->
                                
                                <input type="text" placeholder="Room Type" class="form-control" name="room_type" value="{{old('room_type')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Room Price</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Room Price" class="form-control" name="room_price" value="{{old('room_price')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Number of People</label>
                            <div class="col-sm-9">
                                <input type="number" min="1" placeholder="Number of People" class="form-control" name="number_of_people" value="{{old('number_of_people')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Room Image</label>
                            <div class="col-sm-6">
                                <input type="file" placeholder="Select room image" class="form-control" name="room_images[]" accept="image/jpg,image/jpeg" required>
                            </div>
                            <div class="col-sm-3">
                                <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove" onclick="deleteOtherImage(this,'.more-image-row');"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <!-- Start of other images --> 
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Add more room images</label>
                            <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Add" onclick="addMoreImages(this,'.more-image-div')"><i class="fa fa-plus"></i></a>
                        </div> 
                        <div class="more-image-div">
                            <!-- By jquery -->
                        </div>
                        <!-- End of other images --> 
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button class="btn btn-lg btn-success m-t-n-xs pull-right" type="submit"><strong>Add Room</strong></button>
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
        $("#room-form").validate({
            rules: {
                'room_images[]': {
                    required: true, 
                    accept: "image/jpg,image/jpeg"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    function addMoreImages(ds,rowToAdd){
        var html = '<div class="form-group more-image-row">\
                        <div class="form-group">\
                            <label class="col-sm-3 control-label">Room Image</label>\
                            <div class="col-sm-6">\
                                <input type="file" placeholder="Select room image" class="form-control" name="room_images[]" accept="image/jpg,image/jpeg" required>\
                            </div>\
                            <div class="col-sm-3">\
                                <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove" onclick="deleteOtherImage(this,\'.more-image-row\');"><i class="fa fa-minus"></i></a>\
                            </div>\
                        </div>\
                    </div>';
        $(rowToAdd).append(html);            
    }

    function deleteOtherImage(ds,rowToDelete){
        $(ds).parents(rowToDelete).remove();
    }

</script>
@endpush