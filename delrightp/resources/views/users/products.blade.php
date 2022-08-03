@extends('layouts.main') 
@section('title', 'Data Tables')
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
                            <h5>{{ __('Data Table')}}</h5>
                            <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit')}}</span>
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
                                <a href="#">Tables</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Data Table')}}</h3></div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th class="nosort">{{ __('Product')}}</th>
                                    <th>{{ __('Seller Name')}}</th>
                                    <th>{{ __('Acutal price')}}</th>
                                    <th>{{ __('Discount percentage')}}</th>
                                    <th>{{ __('Price')}}</th>
                                    <th>{{ __('GST')}}</th>
                                    <th>{{ __('hsn_code')}}</th>
                                    <th>{{ __('Quantity')}}</th>
                                    <th class="nosort">{{ __('Action')}}</th>
                                    {{-- <th class="nosort">{{ __('&nbsp;')}}</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                    <td>{{ $product->id}}</td>
                                    {{-- <td><img src="../img/products/1.jpg" class="table-product-thumb" alt=""></td> --}}
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->seller_name}}</td>
                                    <td>{{ $product->price}}</td>
                                    <td>{{ $product->discount_percentage}}</td>
                                    <td>{{ ($product->discount_percentage/100)*$product->price}}</td>
                                    <td>{{ $product->gst.'%'}}</td>
                                    <td>{{ $product->hsn_code}}</td>
                                    <td>{{ $product->quantity}}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="product/{{ $product->id }}"><i class="ik ik-eye"></i></a>
                                            {{-- <a href="#"><i class="ik ik-edit-2"></i></a> --}}
                                            <a href="deleteProduct/{{ $product->id }}"><i class="ik ik-trash-2"></i></a>
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
      
