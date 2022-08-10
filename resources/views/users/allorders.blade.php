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
                            <h5>{{ __('Vendor Orders')}}</h5>
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
                                                
                        <table id="data_table4" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Vendor Name')}}</th>
                                    <th>{{ __('Product_Name')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th>{{ __('price')}}</th>
                                    <th>{{ __('Order Date')}}</th>
                                    <!--<th class="nosort">{{ __('Order Type')}}</th>-->

                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($ordersD as $order)
                                
                                @php
                                $timestampObject = $order['timestamp_info']['placed_timestamp'];
                                $date = $timestampObject->get()->format('d-m-Y h:i:sa');
                                
                                @endphp 
                                    @php
                                        $order_id  = $order['order_info']['order_id'];
                                        $order_type  = $order['order_info']['order_type'];
                                        $driver_name  = $order['pickup_info']['name'];
                                        $count = count($order['order_info']['order_list']);
                                    @endphp
                                    
                                    @foreach ($order['order_info']['order_list'] as $key => $order)
                                    <tr>
                                        
                                        {{--@if($key == 0)
                                        <td rowspan="{{$count}}">{{ $order_id }}</td>
                                        @endif--}}
                                        <td>{{ $order_id }}</td>
                                        <td>{{ $driver_name }}</td>
                                        <td>{{ $order['name']}}</td>
                                        <td>{{ $order['quantity']}}</td>
                                        <td>{{ $order['discount_price']}}</td>
                                        <td>{{ $date }}</td>
                                        
                                    </tr>
                                    @endforeach
                            
                                @endforeach
                                
                 
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade show active" id="placed-orders" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                                
                        <table id="data_table3" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Vendor Name')}}</th>
                                    <th>{{ __('Product_Name')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th>{{ __('price')}}</th>
                                    <th>{{ __('Order Date')}}</th>
                                    <!--<th class="nosort">{{ __('Order Type')}}</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersP as $order)
                                 @php
                                        $order_id  = $order['order_info']['order_id'];
                                        $driver_name  = $order['pickup_info']['name'];
                                        $count = count($order['order_info']['order_list']);
                                        $timestampObject = $order['timestamp_info']['placed_timestamp'];
                                        $date = $timestampObject->get()->format('d-m-Y h:i:sa');
                                    @endphp
                                    
                                    @foreach ($order['order_info']['order_list'] as $key => $order)
                                    <tr>
                                        {{--@if($key == 0)
                                        <td rowspan="{{$count}}">{{ $order_id }}</td>
                                        @endif--}}
                                        <td>{{ $order_id }}</td>
                                        <td>{{ $driver_name }}</td>
                                        <td>{{ $order['name']}}</td>
                                        <td>{{ $order['quantity']}}</td>
                                        <td>{{ $order['discount_price']}}</td>
                                        <td>{{ $date}}</td>
                                    </tr>
                                    @endforeach
                            
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="ongoing-orders" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                               <table id="data_table1" class="table">
                            <thead>
                                                               <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Vendor Name')}}</th>

                                    <th>{{ __('Product_Name')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th>{{ __('price')}}</th>
                                    <th>{{ __('Order Date')}}</th>
                                    <!--<th class="nosort">{{ __('Order Type')}}</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersA as $order)
                             @php
                                        $order_id  = $order['order_info']['order_id'];
                                        $driver_name  = $order['pickup_info']['name'];
                                        $count = count($order['order_info']['order_list']);
                                        $timestampObject = $order['timestamp_info']['placed_timestamp'];
                                        $date = $timestampObject->get()->format('d-m-Y h:i:sa');
                                    @endphp
                                    
                                    @foreach ($order['order_info']['order_list'] as $key => $order)
                                    <tr>
                                        {{--@if($key == 0)
                                        <td rowspan="{{$count}}">{{ $order_id }}</td>
                                        @endif--}}
                                        <td>{{ $order_id }}</td>
                                        <td>{{ $driver_name }}</td>
                                        <td>{{ $order['name']}}</td>
                                        <td>{{ $order['quantity']}}</td>
                                        <td>{{ $order['discount_price']}}</td>
                                        <td>{{ $date}}</td>
                                    </tr>
                                    @endforeach
                            
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cancelled-orders" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <table id="data_table" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Id')}}</th>
                                        <th>{{ __('Vendor Name')}}</th>
                                        <th>{{ __('Product_Name')}}</th>
                                        <th>{{ __('quanitity')}}</th>
                                        <th>{{ __('price')}}</th>
                                        <th>{{ __('Order Date')}}</th>
                                        <!--<th class="nosort">{{ __('Order Type')}}</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($ordersC as $order)
                             @php
                                        $order_id  = $order['order_info']['order_id'];
                                        $driver_name  = $order['pickup_info']['name'];
                                        $count = count($order['order_info']['order_list']);
                                        $timestampObject = $order['timestamp_info']['placed_timestamp'];
                                        $date = $timestampObject->get()->format('d-m-Y h:i:sa');
                                    @endphp
                                    
                                    @foreach ($order['order_info']['order_list'] as $key => $order)
                                    <tr>
                                        {{--@if($key == 0)
                                        <td rowspan="{{$count}}">{{ $order_id }}</td>
                                        @endif--}}
                                        <td>{{ $order_id }}</td>
                                        <td>{{ $driver_name }}</td>
                                        <td>{{ $order['name']}}</td>
                                        <td>{{ $order['quantity']}}</td>
                                        <td>{{ $order['discount_price']}}</td>
                                        <td>{{ $date}}</td>
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
           var table = $('#data_table3').DataTable({
        responsive: true,
        select: true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }],
        dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn-sm btn-info', 
                        header: false,
                        footer: true,
                        exportOptions: {
                            // columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-sm btn-success',
                        header: false,
                        footer: true,
                        exportOptions: {
                            // columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-sm btn-warning',
                        header: false,
                        footer: true,
                        exportOptions: {
                            // columns: ':visible',
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-sm btn-primary',
                        header: false,
                        footer: true,
                        exportOptions: {
                            // columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-sm btn-default',
                        header: true,
                        footer: false,
                        orientation: 'landscape',
                        exportOptions: {
                            // columns: ':visible',
                            stripHtml: false
                        }
                    }
                ]
    
    });
    $('#data_table3 tbody').on( 'click', 'tr', function() {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
    });   
</script>  

    
    