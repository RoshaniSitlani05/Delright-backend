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
                            <form class="form-horizontal" method="post" action="{{ URL::to('updateCategory/'.$category[0]->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label" for="name">Category Namess</label>
                                 <input type="hidden" class="form-control" name="id" value="{{$category[0]->id}}" readonly>
                                 <input type="text" class="form-control" name="name" value="{{$category[0]->name}}" readonly>
                                 @if ($errors->has('name'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                                <br>
                                <label class="control-label" for="name">Service Charge</label>
                                 <input type="text" class="form-control" name="service_charge" value="{{$category[0]->service_charge}}">
                                 @if ($errors->has('service_charge'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('service_charge') }}
                                    </span>
                                @endif
                                <br>
                                <label class="control-label" for="name">Image</label>
                                 <input type="file" class="form-control" name="image" >
                                 @if ($errors->has('image'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('image') }}
                                    </span>
                                @endif
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