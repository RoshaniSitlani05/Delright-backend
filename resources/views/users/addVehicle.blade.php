@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
<script src="js/app.js"></script>
 <div class="container-fluid">
     <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Add Vehicle')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Vehicles</a>
                            </li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="page-header">
             <div class="row">
                {{--<div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            @if (Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif

                        </div>
                                
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ route('InsertVehicle') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col">
                                        <label class="control-label" for="vehicle_type">Vehicle Type</label>
                                        <select class="form-control" name="vehicle_type" required>
                                            <option value="">Select Option</option>
                                            <option value="two_wheeler">Two Wheeler</option>
                                            <option value="three_wheeler">Three Wheeler</option>
                                            <option value="car">Car</option>
                                            <option value="miniTruck">MiniTruck</option>
                                            <option value="truck">Truck</option>
                                        </select>
                                        <label class="control-label" for="vehicle_name">Vehicle Name</label>
                                        <input type="text" class="form-control" name="vehicle_name" required>
                                        <br>
                                        <label class="control-label" for="vehicle_price">Price (Add price per KM)</label>
                                        <input type="text" class="form-control" name="vehicle_price" required>
                                        <br>
                                        <label class="control-label" for="vehicle_image">Image</label>
                                        <input type="file" class="form-control" name="vehicle_image" required>
                                    </div>
                                <br>
                                 <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>--}}
                
                   <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" style="margin-bottom:20px;">
                                <th>id</th>
                                <th>Vehicle Type</th>
                                <th>Vehicle Name</th>
                                <th>Image</th>
                                <th>Price/KM</th>
                                <th>Action</th>
                                @foreach ($vehicle as $vehicles)
                                <tr>
                                    <td>{{ $vehicles->id }}</td>
                                    <td>{{ $vehicles->vehicle_type }}</td>
                                    <td>{{ $vehicles->vehicle_name }}</td>
                                    <td><img src="{{ URL::asset('../storage/app/'.$vehicles->vehicle_image) }}" alt="" class="img-fluid img-50"></td>
                                    <td>{{ $vehicles->vehicle_price }}</td>
                                    <td><a href="getVehicle/{{$vehicles->id}}"><i class="fa fa-edit"></i></a>
                                    {{--@if($vehicles->status == 0)
                                        <a href="deleteVehicle/{{$vehicles->id}}/{{$vehicles->status}}" class="btn btn-danger">Enable</a></td>
                                    @else
                                        <a href="deleteVehicle/{{$vehicles->id}}/{{$vehicles->status}}" class="btn btn-success">Disable</i></a></td>
                                    @endif--}}
                                </tr>  
                                @endforeach
                            </table>
                             
                        </div>
                    </div>
                </div>
            
             </div>
        </div>
 </div>
 @endsection