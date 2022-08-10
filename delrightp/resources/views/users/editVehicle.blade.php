@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
<script src="js/app.js"></script>
 <div class="container-fluid">
        <div class="page-header">
             <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            @if (Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif

                        </div>
                      
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ URL::to('updateVehicle/'.$vehicle[0]->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label" for="vehicle_name">Vehicle Type</label>
                                 <input type="hidden" class="form-control" name="id" value="{{$vehicle[0]->id}}" readonly>
                                 <input type="text" class="form-control" name="vehicle_type" value="{{$vehicle[0]->vehicle_type}}" readonly>
                                 @if ($errors->has('vehicle_name'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('vehicle_name') }}
                                    </span>
                                @endif
                                <br>
                                <label class="control-label" for="vehicle_name">Vehicle Name</label>
                                 <input type="text" class="form-control" name="vehicle_name" value="{{$vehicle[0]->vehicle_name}}">
                                 @if ($errors->has('vehicle_name'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('vehicle_name') }}
                                    </span>
                                @endif
                                <br>
                                <label class="control-label" for="vehicle_price">Price (Add price per KM)</label>
                                 <input type="text" class="form-control" name="vehicle_price" value="{{$vehicle[0]->vehicle_price}}">
                                 @if ($errors->has('vehicle_price'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('vehicle_price') }}
                                    </span>
                                @endif
                                <br>
                                <label class="control-label" for="vehicle_image">Image</label>
                                 <input type="file" class="form-control" name="vehicle_image">
                                 @if ($errors->has('vehicle_image'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('vehicle_image') }}
                                    </span>
                                @endif
                                <br>
                                <br>
                                
                                 <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
        </div>
 </div>
 @endsection