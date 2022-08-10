@extends('layouts.main') 
@section('title', 'Data Tables')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 



<!--<script src="js/app.js"></script>-->
 <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Add Slider')}}</h5>
                            <span>{{ __('Upload your slider here, Use size 1920x1080 px or 16:9 Ratio.')}}</span>
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
                                <a href="#">Slider</a>
                            </li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

     
     
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
                            <form class="form-horizontal" method="post" action="{{ route('InsertSlider') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label" for="name">Category</label>
                                <select class="form-control" name="shop_category" required>
                                    <option value="">Select Option</option>
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->name }}">{{ $cate->name }}</option>
                                    @endforeach
                                    <!--<option value="Restaurants">Restaurants</option>-->
                                    <!--<option value="Groceries">Groceries</option>-->
                                    <!--<option value="Fish&Meat">Fish&Meat</option>-->
                                    <!--<option value="Fruits & Vegetables">Fruits & Vegetables</option>-->
                                    <!--<option value="Medicine">Medicine</option>-->
                                    <!--<option value="Pet shop">Pet shop</option>-->
                                    <option value="Home">Home</option>
                                </select>
                                <label class="control-label" for="name">Image</label>
                                 <input type="file" class="form-control" name="slider_image" >
                                 @if ($errors->has('slider_image'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('slider_image') }}
                                    </span>
                                @endif
                                <br>
                                 <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                   <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" style="margin-bottom:20px;">
                                <th>id</th>
                                <th>Name</th>
                                <th>image</th>
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->shop_category }}</td>
                                    <td><img src="{{ URL::asset('../storage/app/'.$slider->slider_image) }}" alt="" class="img-fluid img-50"></td>
                                    <td><a href="deleteSlider/{{$slider->id}}"><i class="fa fa-trash"></i></a></td>
                                </tr>  
                                @endforeach
                            </table>
                             {!! $sliders->links() !!} 
                        </div>
                    </div>
                </div>
            
             </div>
        </div>
 </div>
 @endsection