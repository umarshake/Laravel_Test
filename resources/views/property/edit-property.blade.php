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
                        <a href="{{ route('listdata') }}"> list data </a>
                    </li>
                    <li class="active">
                        <span>{{ 'Edit' }}</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                {{ 'Properties' }}
            </h2>
            <small>{{ 'Edit Property' }}</small>
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
                    <i class="fa fa-bars"></i> Edit Property
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('updatedata',[$property->uuid]) }}" method="POST" enctype="multipart/form-data" id="booking-form" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">County</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="county" value ="{{$property->county}}" id="county" required>
                            </div>
                            <label class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-4"> 
                                <input type="text" class="form-control" name="country" value="{{ $property->country }}" id="country"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Town</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="town" value ="{{$property->town}}" id="town" required>
                            </div>
                            <label class="col-sm-2 control-label">PostCode</label>
                            <div class="col-sm-4"> 
                                <input type="text" class="form-control" name="postcode" value="{{$property->postcode}}" id="postcode"required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Property Type </label>
                            <div class="col-sm-4"> 
                                <select class="form-control" name="property_type_id" required>
                                    <option value=""  disabled>Select Property Type</option>
                                    @if($property_types->count() > 0)
                                    @foreach($property_types as $type)
                                        <option value="{{ $type->id }}" @if ($type->id == $property->product_type_id)
                                            selected
                                        @endif>{{ $type->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-4"> 
                                <input type="text" placeholder="Description of Property" class="form-control" name="description" value="{{$property->description}}" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Number of Bedrooms </label>
                            <div class="col-sm-4"> 
                                <select class="form-control" name="num_bedrooms" required>
                                    <option value=""  disabled>Select</option>
                                    
                                    @foreach(range(1,10) as $type)
                                        <option value="{{ $type }}" @if ($property->num_bedrooms == $type)
                                             selected
                                        @endif>{{ $type }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <label class="col-sm-2 control-label"> Number of Bathrooms </label>
                            <div class="col-sm-4"> 
                                <select class="form-control" name="num_bathrooms" required>
                                    <option value="" disabled>Select</option>
                                    
                                    @foreach(range(1,10) as $type)
                                        <option value="{{ $type }}" @if ($property->num_bathrooms == $type)
                                             selected
                                        @endif>{{ $type }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="price" value ="{{$property->price}}" id="price" required>
                            </div>
                            <label class="col-sm-2 control-label">For</label>
                            <div class="col-sm-4"> 

                                <input type='radio' name='for' id='main' @if ($property->for == 'rent')
                                             checked
                                        @endif value='rent'/>
                                <label for="main">Rent</label>

                                <input type='radio' name='for' id='main' @if ($property->for == 'sale')
                                             checked
                                        @endif value='sale'/>
                                <label for="main">Sale</label>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Displayable Address</label>
                            <div class="col-sm-4">
                                <input type='text' name="address" value="{{$property->address}}" id='address' />
                            </div>
                            <!-- <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-4">
                                <input id="image_full" type="file" name='image_full' />
                            </div> -->
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button class="btn btn-lg btn-success m-t-n-xs pull-right" type="submit"><strong>Update Property</strong></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection