@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
    

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-12">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('User details and Orders')}}</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4" style="padding-top: 10px;">
                    <h4 class="mt-10">Name : {{ $users->name}}</h4>
                    <!--<h4 class="card-title mt-10">Email : {{ $users->email}}</h4>-->
                    <!--<h4 class="card-title mt-10">Phone Number : {{ $users->phone_number}}</h4>-->
                </div>
                <div class="col-lg-4">
                    <!--<h4 class="card-title mt-10">Name : {{ $users->name}}</h4>-->
                    <h4 class="mt-10">Email : {{ $users->email}}</h4>
                    <!--<h4 class="card-title mt-10">Phone Number : {{ $users->phone_number}}</h4>-->
                </div>
                <div class="col-lg-4">
                    <!--<h4 class="card-title mt-10">Name : {{ $users->name}}</h4>-->
                    <!--<h4 class="card-title mt-10">Email : {{ $users->email}}</h4>-->
                    <h4 class="mt-10">Phone Number : {{ $users->phone_number}}</h4>
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Vendors to User Deilvery Orders </h4>
                    </div>
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#placed-orders" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ __('Placed orders')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#ongoing-orders" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('Ongoing orders')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#cancelled-orders" role="tab" aria-controls="pills-setting" aria-selected="false">{{ __('Cancelled orders')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#delivered-orders" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ __('Delivered orders')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="delivered-orders" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                                
                        <table id="data_table5" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Product_Name')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th class="nosort">{{ __('price')}}</th>
                                    <!--<th class="nosort">{{ __('Order Type')}}</th>-->

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersD as $order)
                                    
                                    @php
                                        $order_id  = $order['order_info']['order_id'];
                                        $order_type  = $order['order_info']['order_type'];
                                        $count = count($order['order_info']['order_list']);
                                    @endphp
                                    
                                    @foreach ($order['order_info']['order_list'] as $key => $order)
                                    <tr>
                                        @if($key == 0)
                                        <td rowspan="{{$count}}">{{ $order_id }}</td>
                                        @endif
                                        <td>{{ $order['name']}}</td>
                                        <td>{{ $order['quantity']}}</td>
                                        <td>{{ $order['discount_price']}}</td>
                                        <!--@if($key == 0)-->
                                        <!--<td>{{ $order_type}}</td>-->
                                        <!--@endif-->
                                    </tr>
                                    @endforeach
                            
                                @endforeach
                                
                 
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade show active" id="placed-orders" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                                
                        <table id="data_table1" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Product_Name')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th class="nosort">{{ __('price')}}</th>
                                    <!--<th class="nosort">{{ __('Order Type')}}</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersP as $order)
                                 @php
                                        $order_id  = $order['order_info']['order_id'];
                                        $count = count($order['order_info']['order_list']);
                                    @endphp
                                    
                                    @foreach ($order['order_info']['order_list'] as $key => $order)
                                    <tr>
                                        @if($key == 0)
                                        <td rowspan="{{$count}}">{{ $order_id }}</td>
                                        @endif
                                        <td>{{ $order['name']}}</td>
                                        <td>{{ $order['quantity']}}</td>
                                        <td>{{ $order['discount_price']}}</td>
                                    </tr>
                                    @endforeach
                            
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="ongoing-orders" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                               <table id="data_table3" class="table">
                            <thead>
                                                               <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Product_Name')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th class="nosort">{{ __('price')}}</th>
                                    <!--<th class="nosort">{{ __('Order Type')}}</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersA as $order)
                             @php
                                        $order_id  = $order['order_info']['order_id'];
                                        $count = count($order['order_info']['order_list']);
                                    @endphp
                                    
                                    @foreach ($order['order_info']['order_list'] as $key => $order)
                                    <tr>
                                        @if($key == 0)
                                        <td rowspan="{{$count}}">{{ $order_id }}</td>
                                        @endif
                                        <td>{{ $order['name']}}</td>
                                        <td>{{ $order['quantity']}}</td>
                                        <td>{{ $order['discount_price']}}</td>
                                    </tr>
                                    @endforeach
                            
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cancelled-orders" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <table id="data_table4" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Id')}}</th>
                                        <th>{{ __('Product_Name')}}</th>
                                        <th>{{ __('quanitity')}}</th>
                                        <th class="nosort">{{ __('price')}}</th>
                                        <!--<th class="nosort">{{ __('Order Type')}}</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($ordersC as $order)
                             @php
                                        $order_id  = $order['order_info']['order_id'];
                                        $count = count($order['order_info']['order_list']);
                                    @endphp
                                    
                                    @foreach ($order['order_info']['order_list'] as $key => $order)
                                    <tr>
                                        @if($key == 0)
                                        <td rowspan="{{$count}}">{{ $order_id }}</td>
                                        @endif
                                        <td>{{ $order['name']}}</td>
                                        <td>{{ $order['quantity']}}</td>
                                        <td>{{ $order['discount_price']}}</td>
                                    </tr>
                                    @endforeach
                            
                         
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
     @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
<script type="text/javascript">
    $('#data_table1').dataTable( {
  "searching": true
} );

</script>