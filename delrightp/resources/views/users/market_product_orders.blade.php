@extends('layouts.main') 
@section('title', 'Market Place Orders')
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
                            <h5>{{ __('Market Place Orders List')}}</h5>
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
                                <a href="#">Market Place Orders</a>
                            </li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!--<div class="card-header"><h3>{{ __('Data Table')}}</h3></div>-->
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Order Id')}}</th>
                                    <th>{{ __('Buyer Name')}}</th>                                    
                                    <th>{{ __('Buyer Address')}}</th>                                    
                                    <th>{{ __('Product Name')}}</th>
                                    <th>{{ __('Price')}}</th>
                                    <th>{{ __('Quantity')}}</th>
                                    <th>{{ __('Status')}}</th>
                                    {{--<th class="nosort">{{ __('Action')}}</th>--}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->order_id}}</td>
                                    <td>{{ $product->buyer_name}}</td>
                                    <td>{{ $product->shop_address}}</td>
                                    <td>{{ $product->product_name}}</td>
                                    <td>{{ $product->price}}</td>
                                    <td>{{ $product->quantity}}</td>
                                    <td>{{ $product->order_status}}</td>
                                    <!--{{--<td><img src="{{ URL::asset('../storage/app/'.$user->image) }}" class="table-user-thumb" alt=""></td>--}}-->
                                    <!--{{--<td>-->
                                    <!--    <div>-->
                                    <!--        <a href="user/{{ $user->id }}"><i class="ik ik-eye"></i></a>-->
                                    <!--        @if ($user->status == 1)-->
                                    <!--            <a style="color: white;" href="{{ URL::to('userStatus/'.$user->id.'/'.$user->status) }}" class="btn btn-success">Block</a>-->
                                    <!--        @else-->
                                    <!--            <a style="color: white;" href="{{ URL::to('userStatus/'.$user->id.'/'.$user->status) }}" class="btn btn-danger">UnBlock</a>-->
                                    <!--        @endif-->
                                            
                                    <!--        {{-- <a href="#"><i class="ik ik-edit-2"></i></a>-->
                                    <!--        <a href="#"><i class="ik ik-trash-2"></i></a> --}}-->
                                    <!--    </div>-->
                                    <!--</td>--}}-->
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
      
