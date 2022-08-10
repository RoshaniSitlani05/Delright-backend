@extends('layouts.main') 
@section('title', 'Product Category')
@section('content')
<script src="js/app.js"></script>
 <div class="container-fluid">
     <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Add Product Category')}}</h5>
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
                                <a href="#">Product Categories</a>
                            </li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

     
        <div class="page-header">
             <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            @if (Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif

                        </div>
                                
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ route('InsertProductCategory') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label" for="shop_category">Shop Category</label>
                                 <select class="form-control" name="shop_category">
                                        <option value="">Select category</option>
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                               </select>
                               @if ($errors->has('shop_category'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('shop_category') }}
                                    </span>
                                @endif
                                <br>
                                <label class="control-label" for="name">Category Name</label>
                                 <input type="text" class="form-control" name="name" required>
                                 @if ($errors->has('name'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                                <br>
                                 <label class="control-label" for="name">Service Charge</label>
                                 <input type="text" class="form-control" name="service_charge" required>
                                 @if ($errors->has('service_charge'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('service_charge') }}
                                    </span>
                                @endif
                                <br>
                                 <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                   <div class="col-lg-7 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" style="margin-bottom:20px;">
                                <th>id</th>
                                <th>Shop Category</th>
                                <th>Category</th>
                                <th>Service Charge</th>
                                <th>#</th>
                                <th>#</th>
                                @foreach ($productCategory as $cate)
                                <tr>
                                    <td>{{ $cate->product_cate_id }}</td>
                                    <td>{{ $cate->name }}</td>
                                    <td>{{ $cate->product_cate_name }}</td>
                                    <td>{{ $cate->service_charge }}</td>
                                    
                                    <td><a href="getProductCategory/{{$cate->product_cate_id}}"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                    @if ($cate->status == 1)
                                        <a style="color: white;" href="{{ URL::to('ProductCategoryStatus/'.$cate->id.'/'.$cate->status) }}" class="btn btn-success">Active</a>
                                    @else
                                        <a style="color: white;" href="{{ URL::to('ProductCategoryStatus/'.$cate->id.'/'.$cate->status) }}" class="btn btn-danger">InActive</a>
                                    @endif
                                    </td>
                                    {{--<td><a href="deleteProductCategory/{{$cate->product_cate_id}}"><i class="fa fa-trash"></i></a></td>--}}
                                </tr>  
                                @endforeach
                            </table>
                             {!! $productCategory->links() !!} 
                        </div>
                    </div>
                </div>
            
             </div>
        </div>
 </div>
 @endsection