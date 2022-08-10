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
                            <h5>{{$header}}{{ __(' Orders')}}</h5>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Vendors to User Deilvery Orders </h4>
                    </div>
                    <div class="card-body">    
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Vendor Name')}}</th>
                                    <th>{{ __('Delivery Partner Phone Number')}}</th>
                                    <th>{{ __('Product_Name')}}</th>
                                    <th>{{ __('Delivery Service Charges')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th>{{ __('price')}}</th>
                                    <th>{{ __('Order Date')}}</th>
                                    <!--<th class="nosort">{{ __('Order Type')}}</th>-->

                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($Orders as $order)
                                
                                @php
                                $timestampObject = $order['timestamp_info']['placed_timestamp'];
                                $date = $timestampObject->get()->format('d-m-Y h:i:sa');
                                
                                @endphp 
                                
                                    @php
                                        $order_id  = $order['order_info']['order_id'];
                                        $order_type  = $order['order_info']['order_type'];
                                        $driver_name  = $order['pickup_info']['name'];
                                        $driver_phonenumber  = $order['delivery_info']['driver_phoneNumber'];
                                        if(isset($order['order_info']['order_delivery_charge'])){
                                            $delivery_servicecharge = $order['order_info']['order_delivery_charge'];
                                        }else{
                                            $delivery_servicecharge = '';
                                        }
                                        
                                        $count = count($order['order_info']['order_list']);
                                    @endphp
                                    
                                    @foreach ($order['order_info']['order_list'] as $key => $order)
                                    
                                    <tr>
                                        
                                        {{--@if($key == 0)
                                        <td rowspan="{{$count}}">{{ $order_id }}</td>
                                        @endif--}}
                                        <td>{{ $order_id }}</td>
                                        <td>{{ $driver_name }}</td>
                                        <td>{{ $driver_phonenumber }}</td>
                                        <td>{{ $order['name']}}</td>
                                        <td>{{ $delivery_servicecharge }}</td>
                                        <td>{{ $order['quantity']}}</td>
                                        <td>{{ $order['discount_price']}}</td>
                                        <td>{{ $date }}</td>
                                    
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
     @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
    