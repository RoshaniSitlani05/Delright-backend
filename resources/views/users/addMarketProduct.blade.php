@extends('layouts.main') 
@section('title', 'Market Products')
@section('content')
<script src="js/app.js"></script>
 <div class="container-fluid">
     <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Add Market Products')}}</h5>
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
                                <a href="#">Market Products</a>
                            </li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

     
        <div class="page-header">
             <div class="row">
                <div class="col-lg-15 col-md-20">
                    <div class="card">
                        @if (Session::has('flash_message'))
                         <div class="card-header">
                            
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            
                        </div>
                        @endif
                        <div class="card-body">
                             <form class="form-horizontal" method="post" action="{{ route('InsertMarketProduct') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <div class="form-row">
                                    <div class="col">
                                       <label class="control-label" for="name">Product Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                       <label class="control-label" for="name">Price</label>
                                        <input type="text" class="form-control" name="price" required>
                                       <label class="control-label" for="name">discount_percentage</label>
                                        <input type="text" class="form-control" name="discount_percentage">
                                       <label class="control-label" for="name">gst</label>
                                        <input type="text" class="form-control" name="gst">
                                       
                                    </div>
                               
                                    <div class="col">
                                        <label class="control-label" for="name">hsn_code</label>
                                       <input type="text" class="form-control" name="hsn_code">
                                       <label class="control-label" for="name">quantity</label>
                                       <input type="text" class="form-control" name="quantity" required>
                                       <label class="control-label" for="name">category</label>
                                       <select class="form-control" name="category">
                                            @foreach ($category as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach
                                        
                                       </select>
                                       <label class="control-label" for="name">Description</label>
                                       <textarea class="form-control"type="texx" class="form-control" name="description"></textarea>
                                       <label class="control-label" for="name">Image</label>
                                       <input type="file" class="form-control" name="image" required>
                                      
                                    </div>
                                </div>
                                 <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-5">
                    
                    <div class="card">
                          <div class="card-header">
                            <h6>Last added Products</h6>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table">
                                <th>ID</th>
                                <th>Name</th>
                                <th>quantity</th>
                                @foreach ($products as $product)
                                    
                                
                                <tr>
                                    <td>{{ $product->id }}</td><td>{{ $product->name }}</td><td>{{ $product->quantity }}</td>
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