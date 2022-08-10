@extends('layouts.main') 
@section('title', 'Shop Category')
@section('content')
<!--<script src="js/app.js"></script>-->
 <div class="container-fluid">
     <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Update Shop Category')}}</h5>
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
                                <a href="#">Shop Categories</a>
                            </li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

     
        <div class="page-header">
             <div class="row">
                {{--<div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            @if (Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif

                        </div>
                                
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ route('InsertCatrgory') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label" for="name">Category Name</label>
                                 <input type="text" class="form-control" name="name" required>
                                 @if ($errors->has('name'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                                <br>
                                <label class="control-label" for="name">Image</label>
                                 <input type="file" class="form-control" name="image" required>
                                 @if ($errors->has('image'))
                                    <span style="color:#fb0303">
                                        {{ $errors->first('image') }}
                                    </span>
                                @endif
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
                                <th>Name</th>
                                <th>Service Charge</th>
                                <th>image</th>
                                @foreach ($category as $cate)
                                <tr>
                                    <td>{{ $cate->id }}</td>
                                    <td>{{ $cate->name }}</td>
                                    <td>{{ $cate->service_charge }}</td>
                                    <td><img src="{{ URL::asset('../storage/app/'.$cate->image) }}" class="img-fluid img-50" alt=""></td>
                                    <td>
                                        <a href="getCategory/{{$cate->id}}"><i class="fa fa-edit"></i></a>
                                        @if ($cate->consumable == 1)
                                                <a style="color: white;" href="{{ URL::to('shopCategoryStatus/'.$cate->id.'/'.$cate->consumable) }}" class="btn btn-success">Consumable to Fssai</a>
                                            @else
                                                <a style="color: white;" href="{{ URL::to('shopCategoryStatus/'.$cate->id.'/'.$cate->consumable) }}" class="btn btn-danger">Not Consumable</a>
                                            @endif
                                            
                                    </td>
                                    {{--<td><a href="deleteCategory/{{$cate->id}}"><i class="fa fa-trash"></i></a></td>--}}
                                </tr>  
                                @endforeach
                            </table>
                             {!! $category->links() !!} 
                        </div>
                    </div>
                </div>
            
             </div>
        </div>
 </div>
 @endsection