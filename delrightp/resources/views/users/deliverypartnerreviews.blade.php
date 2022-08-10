@extends('layouts.main') 
@section('title', 'Delivery Partner Reviews')
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
                            <h5>{{ __('Delivery Partner Reviews List')}}</h5>
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
                                <a href="#">Delivery Partner Reviews</a>
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
                                    <th>{{ __('Rating')}}</th>
                                    <th>{{ __('Review')}}</th>
                                    <th>{{ __('Que 1')}}</th>
                                    <th>{{ __('Que 2')}}</th>
                                    <th>{{ __('Que 3')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $iii = 1
                                @endphp
                                @foreach ($reviews as $review)
                                <tr>
                                    <td>{{$iii}}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>{{ $review->review }}</td>
                                    <td>{{ $review->ans_1 }}</td>
                                    <td>{{ $review->ans_2 }}</td>
                                    <td>{{ $review->ans_3 }}</td>
                                </tr>
                                @php 
                                    $iii++;
                                @endphp
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
      
