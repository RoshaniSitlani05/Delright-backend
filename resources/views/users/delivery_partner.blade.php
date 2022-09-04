@extends('layouts.main') 
@section('title', 'Delivery Partners')
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
                            <h5>{{ __('Delivery Partners List')}}</h5>
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
                                <a href="#">Delivery Partners</a>
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
                                    <th>{{ __('Id')}}</th>
                                    <th>{{ __('Name')}}</th>
                                    <th>{{ __('Email')}}</th>
                                    <th>{{ __('Phone Number')}}</th>
                                    <th class="nosort">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                    <td>{{ $user['user_id']}}</td>
                                    <td>{{ $user['user_name']}}</td>
                                    <td>{{ $user['user_email']}}</td>
                                    <td>{{ $user['user_phone']}}</td>
                                    <td>
                                        <div class="table-actions">
                                            {{--@if ($user['user_block_status'] == 1)
                                                <a style="color: white;" href="{{ URL::to('partnerStatus/'.$user['user_id'].'/'.$user['user_block_status']) }}" class="btn btn-success">Block</a>
                                            @else
                                                <a style="color: white;" href="{{ URL::to('partnerStatus/'.$user['user_id'].'/'.$user['user_block_status']) }}" class="btn btn-danger">UnBlock</a>
                                            @endif--}}
                                            
                                            	@php
                						            $data = \App\Models\VehicleDetails::where(['user_id' => $user['user_id'], 'status' => 1])->get();
                						        @endphp
                                                @if(count($data) > 0)
                                            <a style="color: white;" href="{{ URL::to('deliverypartnerkyc/'.$user['user_id']) }}" class="btn btn-primary" type="submit"> KYC</a>
                                            @endif
                                            {{--<a style="color: white;" href="{{ URL::to('partnerreviews/'.$user['user_id']) }}" class="btn btn-primary" type="submit">Reviews</a>--}}
                                            {{--<a href="#"><i class="ik ik-edit-2"></i></a>
                                            <a href="#"><i class="ik ik-trash-2"></i></a>--}}
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
      
