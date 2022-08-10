@extends('layouts.main') 
@section('title', 'Pickup-Drop Orders')
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
                            <h5>{{ __('Pickup-Drop Orders List')}}</h5>
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
                                <a href="#">Pickup-Drop Orders</a>
                            </li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Order Id')}}</th>
                                    <th>{{ __('Sender Name')}}</th>
                                    <th>{{ __('Sender Phone number')}}</th>
                                    <th class="nosort">{{ __('Order Status')}}</th>
                                    <th>{{ __('Vehicle Type')}}</th>
                                    <th>{{ __('Driver Name')}}</th>
                                    <th>{{ __('Driver Phone number')}}</th>
                                    <th>{{ __('Receiver Name')}}</th>
                                    <th>{{ __('Receiver Phone number')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order['order_info']['order_id'] }}</td>
                                        <td>{{ $order['pickup_info']['name'] }}</td>
                                        <td>{{ $order['pickup_info']['phoneNumber'] }}</td>
                                        <td>{{ $order['order_info']['order_status'] }}</td>
                                        <td>{{ $order['order_info']['order_vehicle_type'] }}</td>
                                        <td>{{ $order['delivery_info']['driver_name'] }}</td>
                                        <td>{{ $order['delivery_info']['driver_phoneNumber'] }}</td>
                                        <td>{{ $order['destination_info']['user_name'] }}</td>
                                        <td>{{ $order['destination_info']['user_phoneNumber'] }}</td>
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
      
