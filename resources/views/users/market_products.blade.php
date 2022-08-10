@extends('layouts.main') 
@section('title', 'Market Products')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 


    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Market Products List')}}</h5>
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


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if (Session::has('flash_message'))
                         <div class="card-header">
                            
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            
                        </div>
                        @endif
                        
                        </div>
                    <div class="card-body table-responsive">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Name')}}</th>
                                    <th>{{ __('Price')}}</th>
                                    <th>{{ __('Discount Percent')}}</th>
                                    <th>{{ __('Gst')}}</th>
                                    <th>{{ __('Hsn Code')}}</th>
                                    <th>{{ __('Quantity')}}</th>
                                    <th>{{ __('Category Name ')}}</th>
                                    <th>{{ __('Discription ')}}</th>
                                    <th>{{ __('Image ')}}</th>
                                    <th class="nosort">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                    <td>{{ $product->id}}</td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->price}}</td>
                                    <td>{{ $product->discount_percentage}}</td>
                                    <td>{{ $product->gst}}</td>
                                    <td>{{ $product->hsn_code}}</td>
                                    <td>{{ $product->quantity}}</td>
                                    <td>{{ $product->category}}</td>
                                    <td>{{ $product->description}}</td>
                                    <td><img src="{{ URL::asset('../storage/app/'.$product->image) }}" class="table-user-thumb" alt=""></td>
                                    <td style="display:inline;">
                                        <div>
                                            <a href="getMarketProduct/{{$product->id}}"><i class="fa fa-edit"></i></a>
                                            @if ($product->status == 1)
                                                <a style="color: white;" href="{{ URL::to('marketProductStatus/'.$product->id.'/'.$product->status) }}" class="btn btn-success">Active</a>
                                            @else
                                                <a style="color: white;" href="{{ URL::to('marketProductStatus/'.$product->id.'/'.$product->status) }}" class="btn btn-danger">InActive</a>
                                            @endif
                                            
                                            {{-- <a href="#"><i class="ik ik-edit-2"></i></a>
                                            <a href="#"><i class="ik ik-trash-2"></i></a> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        {{--  --}}
    </div>
               

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
      
