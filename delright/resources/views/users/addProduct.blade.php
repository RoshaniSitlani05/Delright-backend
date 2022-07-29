@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
<script src="js/app.js"></script>
 <div class="container-fluid">
        <div class="page-header">
             <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                         <div class="card-header">
                            <h6>Add Products</h6>
                            @if (Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif

                        </div>
                        
                        <div class="card-body">
                             <form class="form-horizontal" method="post" action="{{ route('InsertProduct') }}" enctype="multipart/form-data">
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
                         <h6>Last added Products</h6>
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