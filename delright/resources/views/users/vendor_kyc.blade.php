@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
<script src="js/app.js"></script>
 <div class="container-fluid">
        <div class="page-header">
             <div class="row">
                <div class="col-md-12">
                    <div class="card">
                         <h4>KYC Verification</h4>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Detail</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="false">Shop Detail</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="emergency-tab" data-toggle="tab" href="#emergency" role="tab" aria-controls="emergency" aria-selected="false">Emergency Contact</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="true">Bank Detail</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="uploaddoc-tab" data-toggle="tab" href="#uploaddoc" role="tab" aria-controls="uploaddoc" aria-selected="false">Upload Documents</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent" style="padding:10px 20px;">
                                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                    @if (count($user) > 0)
                                        <label class="section-label form-label mb-1">Personal Detail</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="price-details">
                                                    <!-- <h6 class="price-title">Price Details</h6> -->
                                                    <ul class="list-unstyled">
                                                        <li class="price-detail">
                                                            <div class="detail-title">First Name :</div>
                                                            <div class="detail-amt">{{$user[0]->first_name}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Last Name :</div>
                                                            <div class="detail-amt">{{$user[0]->last_name}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">DOB :</div>
                                                            <div class="detail-amt">{{$user[0]->dob}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Mobile Number :</div>
                                                            <a class="detail-amt">{{$user[0]->mobile_number}}</a>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Email Id :</div>
                                                            <div class="detail-amt">{{$user[0]->email}}</div>
                                                        </li>
                                                    </ul>
                                                    <hr />
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <h4>No Data Added</h4>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="emergency" role="tabpanel" aria-labelledby="emergency-tab">
                                    @if (count($contactdetails) > 0)
                                        <label class="section-label form-label mb-1"> Emergency Contact</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="price-details">
                                                    <!-- <h6 class="price-title">Price Details</h6> -->
                                                    <ul class="list-unstyled">
                                                        <li class="price-detail">
                                                            <div class="detail-title">Contact Person Name :</div>
                                                            <div class="detail-amt">{{$contactdetails[0]->name}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Your Ralationship with above :</div>
                                                            <div class="detail-amt">{{$contactdetails[0]->relation}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Contact Phone Number :</div>
                                                            <div class="detail-amt">{{$contactdetails[0]->phone_number}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Contact Address :</div>
                                                            <a class="detail-amt">{{$contactdetails[0]->address}}</a>
                                                        </li>
                                                    </ul>
                                                    <hr />
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <h4>No Data Added</h4>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                                    @if (count($shopdetails) > 0)
                                        <label class="section-label form-label mb-1">Shop Detail</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="price-details">

                                                    <ul class="list-unstyled price-details">
                                                        <li class="price-detail">
                                                            <div class="details-title">Shop Name : </div>
                                                            <div class="detail-amt">
                                                                {{$shopdetails[0]->shop_name}}
                                                            </div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="details-title">Start Date : </div>
                                                            <div class="detail-amt discount-amt ">{{$shopdetails[0]->start_date}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="details-title">Shop Mobile Number : </div>
                                                            <div class="detail-amt discount-amt ">{{$shopdetails[0]->shop_mobile_number}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="details-title">Shop E-mail Id : </div>
                                                            <div class="detail-amt discount-amt ">{{$shopdetails[0]->shop_email}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="details-title">Shop GSTIN Number : </div>
                                                            <div class="detail-amt discount-amt ">{{$shopdetails[0]->shop_gstn_number}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="details-title">Shop Address : </div>
                                                            <div class="detail-amt discount-amt ">{{$shopdetails[0]->shop_address}}</div>
                                                        </li>
                                                    </ul>

                                                    <hr />
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <h4>No Data Added</h4>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                                    @if (count($bank) > 0)
                                        <label class="section-label form-label mb-1">Bank Detail</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="price-details">
                                                    <!-- <h6 class="price-title">Price Details</h6> -->
                                                    <ul class="list-unstyled">
                                                        <li class="price-detail">
                                                            <div class="detail-title">Bank Name :</div>
                                                            <div class="detail-amt">{{$bank[0]->bank_name}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Account Number :</div>
                                                            <div class="detail-amt">{{$bank[0]->account_no}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Holder Name :</div>
                                                            <div class="detail-amt">{{$bank[0]->account_holder_name}}</div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">IFSC Code :</div>
                                                            <a class="detail-amt">{{$bank[0]->ifsc_code}}</a>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Your E-mail Id :</div>
                                                            <div class="detail-amt">{{$bank[0]->email_id}}</div>
                                                        </li>
                                                    </ul>
                                                    <hr />
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <h4>No Data Added</h4>
                                    @endif
                                </div>
                                
                                <div class="tab-pane fade" id="uploaddoc" role="tabpanel" aria-labelledby="uploaddoc-tab">
                                    @if (count($documents) > 0)
                                        <label class="section-label form-label mb-1"> Upload Documents</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="price-details">
                                                    <!-- <h6 class="price-title">Price Details</h6> -->
                                                    <ul class="list-unstyled">
                                                        <li class="price-detail">
                                                            <div class="detail-title">Identity Proof :</div>

                                                            <div class="detail-amt"><img
                                                                    src="{{ asset('uploads/Documents/'.$documents[0]->aadharcard_img) }}"
                                                                    style="width: 40%;"></div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="detail-title">Passport Image : </div>
                                                            <div class="detail-amt"><img
                                                                    src="{{ asset('uploads/Documents/'.$documents[0]->passport_img) }}"
                                                                    style="width: 40%;"></div>
                                                        </li>
                                                    </ul>
                                                    <hr />
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <h4>No Data Added</h4>
                                    @endif
                                </div>
                                
                                @if ($userData[0]->verified == 0)
                                <form class="needs-validation" method="post" action="{{ URL::to('verifyKYCSellerDetails/'.$userData[0]->id) }}" novalidate>
                                    @csrf
                                    <button style="margin-top: 20px;" type="submit"
                                    class="btn btn-primary w-30 btn-next">Verify</button>
                                </form>
                                @else
                                    <h3 style="color: red;">User is Verified</h3>
                                    
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
   
             </div>
        </div>
 </div>
 @endsection