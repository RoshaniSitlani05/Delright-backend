@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
    

    <div class="container-fluid">
        <div class="page-header">
            {{-- <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Profile')}}</h5>
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
                                <a href="#">{{ __('Pages')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center"> 
                            
                            <img src="{{URL::asset('storage/app/'.$users->image)}}" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10">{{ $users->name}}</h4>
                            <p class="card-subtitle">{{ $users->phone_number}}</p>
                            <div class="row text-center justify-content-md-center">
                                {{-- <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">254</font></a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div> --}}
                            </div>
                        </div>
                    </div>
                    <hr class="mb-0"> 
                    <div class="card-body"> 
                        <small class="text-muted d-block">{{ __('Email address')}} </small>
                        <h6>{{ $users->email }}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Phone')}}</small>
                        <h6>{{ $users->phone_number }}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Address')}}</small>
                        <h6>{{ $users->house_address.','.$users->street.','.$users->city.','.$users->state.','.$users->pincode }}</h6>
                        <div class="map-box">
                            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.886539092!2d77.49085452149588!3d12.953959988118836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1542005497600" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                        </div> 
                        <small class="text-muted d-block pt-30">{{ __('Social Profile')}}</small>
                        <br/>
                        {{-- <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ __('Delivered orders')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('Shipped orders')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">{{ __('Returned orders')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                                
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Product_Name')}}</th>
                                    <th class="nosort">{{ __('status')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th class="nosort">{{ __('price')}}</th>
                                    <th class="nosort">{{ __('&nbsp;')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                            
                                    <tr>
                                    <td>{{ $order->id}}</td>
                                    <td>{{ $order->name}}</td>
                                    <td>{{ $order->status}}</td>
                                    {{-- <td><img src="../img/users/1.jpg" class="table-user-thumb" alt=""></td> --}}
                                    <td>{{ $order->qua}}</td>
                                    <td>{{ $order->amount}}</td>
                                    <td>
                                        <div class="table-actions">
                                            {{-- <a href="../order/{{ $order->id }}"><i class="ik ik-eye"></i></a> --}}
                                        
                                        </div>
                                    </td>
                                </tr>
                            
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                               <table id="data_table" class="table">
                            <thead>
                                                               <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Product_Name')}}</th>
                                    <th class="nosort">{{ __('status')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th class="nosort">{{ __('price')}}</th>
                                    <th class="nosort">{{ __('&nbsp;')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersS as $order)
                                
                                   <tr>
                                    <td>{{ $order->id}}</td>
                                    <td>{{ $order->name}}</td>
                                    <td>{{ $order->status}}</td>
                                    {{-- <td><img src="../img/users/1.jpg" class="table-user-thumb" alt=""></td> --}}
                                    <td>{{ $order->qua}}</td>
                                    <td>{{ $order->amount}}</td>
                                    <td>
                                        <div class="table-actions">
                                            {{-- <a href="../order/{{ $order->id }}"><i class="ik ik-eye"></i></a> --}}
                                           
                                        </div>
                                    </td>
                                </tr>
                            
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <table id="data_table" class="table">
                            <thead>
                                                              <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Product_Name')}}</th>
                                    <th class="nosort">{{ __('status')}}</th>
                                    <th>{{ __('quanitity')}}</th>
                                    <th class="nosort">{{ __('price')}}</th>
                                    <th class="nosort">{{ __('&nbsp;')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderR as $order)
                            
                                    <tr>
                                    <td>{{ $order->id}}</td>
                                    <td>{{ $order->name}}</td>
                                    <td>{{ $order->status}}</td>
                                    {{-- <td><img src="../img/users/1.jpg" class="table-user-thumb" alt=""></td> --}}
                                    <td>{{ $order->qua}}</td>
                                    <td>{{ $order->amount}}</td>
                                    <td>
                                        <div class="table-actions">
                                            {{-- <a href="../order/{{ $order->id }}"><i class="ik ik-eye"></i></a>
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
            </div>
        </div>
    </div>
     @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
