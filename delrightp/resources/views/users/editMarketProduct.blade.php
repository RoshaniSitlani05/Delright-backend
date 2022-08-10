@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
<script src="js/app.js"></script>
 <div class="container-fluid">
        <div class="page-header">
             <div class="row">
                <div class="col-lg-15 col-md-20">
                    <div class="card">
                        <div class="card-header">
                            @if (Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif

                        </div>
                      
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ URL::to('updateMarketProduct/'.$products->id) }}" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                
                                <input type="hidden" class="form-control" name="id" value="{{$products->id}}" readonly>
                                    <div class="col-lg-12 col-md-12" style="display: flex;">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="control-label" for="name">Product Name</label>
                                        <input type="text" class="form-control" value="{{$products->name}}" name="name" required>
                                        
                                        @if ($errors->has('name'))
                                            <span style="color:#fb0303">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                        <br>
                                        <label class="control-label" for="name">Price</label>
                                        <input type="text" class="form-control" name="price" value="{{$products->price}}" required>
                                         @if ($errors->has('price'))
                                            <span style="color:#fb0303">
                                                {{ $errors->first('price') }}
                                            </span>
                                        @endif
                                        <br>
                                        <label class="control-label" for="name">discount_percentage</label>
                                        <input type="text" class="form-control" name="discount_percentage" value="{{$products->discount_percentage}}">
                                               
                                        @if ($errors->has('discount_percentage'))
                                            <span style="color:#fb0303">
                                                {{ $errors->first('discount_percentage') }}
                                            </span>
                                        @endif
                                        <br>
                                        <label class="control-label" for="name">gst</label>
                                        <input type="text" class="form-control" name="gst" value="{{$products->gst}}">
                                        @if ($errors->has('gst'))
                                            <span style="color:#fb0303">
                                                {{ $errors->first('gst') }}
                                            </span>
                                        @endif
                                        <label class="control-label" for="name">hsn_code</label>
                                        <input type="text" class="form-control" name="hsn_code" value="{{$products->hsn_code}}">
                                        @if ($errors->has('hsn_code'))
                                            <span style="color:#fb0303">
                                                {{ $errors->first('hsn_code') }}
                                            </span>
                                        @endif
                                        
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label class="control-label" for="name">quantity</label>
                                        <input type="text" class="form-control" name="quantity" value="{{$products->quantity}}" required>
                                        @if ($errors->has('quantity'))
                                            <span style="color:#fb0303">
                                                {{ $errors->first('quantity') }}
                                            </span>
                                        @endif
                                        <br>
                                        <label class="control-label" for="name">category</label>
                                       <select class="form-control" name="category">
                                            @foreach ($category as $cate)
                                                <option value="{{ $cate->id }}" {{$products->category == $cate->id ? "selected" : "" }}>{{ $cate->name }}</option>
                                            @endforeach
                                       </select>
                                        @if ($errors->has('category'))
                                            <span style="color:#fb0303">
                                                {{ $errors->first('category') }}
                                            </span>
                                        @endif
                                        <br>
                                        <label class="control-label" for="name">Description</label>
                                        <textarea class="form-control"type="texx" class="form-control" name="description">{{$products->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <span style="color:#fb0303">
                                                {{ $errors->first('description') }}
                                            </span>
                                        @endif
                                        <br>
                                        <label class="control-label" for="image">Image</label>
                                        
                                         <input type="file" class="form-control" name="image">
                                         <br>
                                         <img src="{{ URL::asset('../storage/app/'.$products->image) }}" class="table-user-thumb" alt="img"  style="height: 100px;width: 100px;">
                                         @if ($errors->has('image'))
                                            <span style="color:#fb0303">
                                                {{ $errors->first('image') }}
                                            </span>
                                        @endif
                                    </div>
                                    </div>
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