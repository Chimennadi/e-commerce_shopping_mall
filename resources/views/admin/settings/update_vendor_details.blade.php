@extends("admin.layout.layout")

@section("content")
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Update  Vendor Details</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Update Admin Password</h6> -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($slug == "personal")
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Personal Information</h4>
                            <!-- client side validation -->
                            <!-- error Message -->
                            @if(Session::has("error_message"))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error: </strong> {{ Session::get("error_message")}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <!-- Success Message -->
                            @if(Session::has("success_message"))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success: </strong> {{ Session::get("success_message")}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <!-- end client side validation -->
                            <!-- server side validation -->
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <!-- end server side validation -->
                            <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}" method="post" enctype="multipart/form-data">@csrf
                                <div class="form-group">
                                    <label>Vendor Username/Email</label>
                                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}"  readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_name">Name</label>
                                    <input type="text" class="form-control" id="vendor_name" placeholder="Enter Vendor Name" name="vendor_name" value="{{ Auth::guard('admin')->user()->name }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_address">Address</label>
                                    <input type="text" class="form-control" id="vendor_address" placeholder="Enter Vendor Address" name="vendor_address" value="{{ $vendorDetails["address"] }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_city">City</label>
                                    <input type="text" class="form-control" id="vendor_city" placeholder="Enter City" name="vendor_city" value="{{ $vendorDetails["city"] }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_state">State</label>
                                    <input type="text" class="form-control" id="vendor_state" placeholder="Enter State" name="vendor_state" value="{{ $vendorDetails["state"] }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_country">Country</label>
                                    {{-- <input type="text" class="form-control" id="vendor_country" placeholder="Enter Country" name="vendor_country" value="{{ $vendorDetails["country"] }}" required=""> --}}
                                    <select name="vendor_country" id="vendor_country" class="form-control" style="color: #495057;" required="">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country['country_name'] }}" @if($country['country_name'] == $vendorDetails['country']) selected @endif>{{ $country['country_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vendor_pincode">Pincode</label>
                                    <input type="text" class="form-control" id="vendor_pincode" name="vendor_pincode" value="{{ $vendorDetails["pincode"] }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_mobile">Mobile</label>
                                    <input type="text" class="form-control" id="vendor_mobile" placeholder="Enter 10 Digit Mobile Number" name="vendor_mobile" value="{{ Auth::guard("admin")->user()->mobile }}" maxlength="10" required="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_image">Photo</label>
                                    <input type="file" class="form-control" id="vendor_image" name="vendor_image">
                                    @if(!empty(Auth::guard('admin')->user()->image))
                                        <a target="_blank" href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image) }}">View Photo</a>
                                        <input type="hidden" name="current_vendor_image" value="{{ Auth::guard('admin')->user()->image }}" >
                                    @endif
                                </div>
                                <div class="form-group" style="margin-top: 20px">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($slug == "business")
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Update Business Information</h4>
                                <!-- client side validation -->
                                <!-- error Message -->
                                @if(Session::has("error_message"))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error: </strong> {{ Session::get("error_message")}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <!-- Success Message -->
                                @if(Session::has("success_message"))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success: </strong> {{ Session::get("success_message")}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <!-- end client side validation -->
                                <!-- server side validation -->
                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <!-- end server side validation -->
                                <form class="forms-sample" action="{{ url('admin/update-vendor-details/business') }}" method="post" enctype="multipart/form-data">@csrf
                                    <div class="form-group">
                                        <label>Vendor Username/Email</label>
                                        <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}"  readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_name">Shop Name</label>
                                        <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop Name" name="shop_name" value="{{ $vendorDetails["shop_name"] }}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_address">Shop Address</label>
                                        <input type="text" class="form-control" id="shop_address" placeholder="Enter Shop Address" name="shop_address" value="{{ $vendorDetails["shop_address"] }}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_city">Shop City</label>
                                        <input type="text" class="form-control" id="shop_city" placeholder="Enter Shop City" name="shop_city" value="{{ $vendorDetails["shop_city"] }}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_state">Shop State</label>
                                        <input type="text" class="form-control" id="shop_state" placeholder="Enter Shop State" name="shop_state" value="{{ $vendorDetails["shop_state"] }}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_country">Shop Country</label>
                                        {{-- <input type="text" class="form-control" id="shop_country" placeholder="Enter Shop Country" name="shop_country" value="{{ $vendorDetails["shop_country"] }}" required=""> --}}
                                        <select name="shop_country" id="shop_country" class="form-control" style="color: #495057;">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country['country_name'] }}" @if($country['country_name'] == $vendorDetails['shop_country']) selected @endif>{{ $country['country_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_pincode">Shop Pincode</label>
                                        <input type="text" class="form-control" id="shop_pincode" placeholder="Enter Shop Pincode" name="shop_pincode" value="{{ $vendorDetails["shop_pincode"] }}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_mobile">Shop Mobile</label>
                                        <input type="text" class="form-control" id="shop_mobile" placeholder="Enter 10 Digit Mobile Number" name="shop_mobile" value="{{ $vendorDetails["shop_mobile"] }}" maxlength="15" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="business_license_number">Business License Number</label>
                                        <input type="text" class="form-control" id="business_license_number" placeholder="Enter Business License Number" name="business_license_number" value="{{ $vendorDetails["business_license_number"] }}" maxlength="15" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nin_number">NIN Number</label>
                                        <input type="text" class="form-control" id="nin_number" placeholder="Enter NIN Number" name="nin_number" value="{{ $vendorDetails["nin_number"] }}" maxlength="15" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="pan_number">PAN Number</label>
                                        <input type="text" class="form-control" id="pan_number" placeholder="Enter PAN Number" name="pan_number" value="{{ $vendorDetails["pan_number"] }}" maxlength="15" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_proof">Address Proof</label>
                                        <select name="address_proof" id="address_proof" class="form-control">
                                            <option value="Passport" @if($vendorDetails["address_proof"] == "International Passport") selected @endif>International Passport</option>
                                            <option value="Voting Card" @if($vendorDetails["address_proof"] == "Voting Card") selected @endif>Voting Card</option>
                                            <option value="Driving License" @if($vendorDetails["address_proof"] == "Driving License") selected @endif>Driving License</option>
                                            <option value="National ID" @if($vendorDetails["address_proof"] == "National ID") selected @endif>National ID</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address_proof_image">Address Proof Image</label>
                                        <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
                                        @if(!empty($vendorDetails['address_proof_image']))
                                            <a target="_blank" href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}">View Photo</a>
                                            <input type="hidden" name="current_address_proof" value="{{ $vendorDetails['address_proof_image'] }}" >
                                        @endif
                                    </div>
                                    <div class="form-group" style="margin-top: 20px">
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($slug == "bank")
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Bank Information</h4>
                            <!-- client side validation -->
                            <!-- error Message -->
                            @if(Session::has("error_message"))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error: </strong> {{ Session::get("error_message")}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <!-- Success Message -->
                            @if(Session::has("success_message"))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success: </strong> {{ Session::get("success_message")}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <!-- end client side validation -->
                            <!-- server side validation -->
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <!-- end server side validation -->
                            <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}" method="post" enctype="multipart/form-data">@csrf
                                <div class="form-group">
                                    <label>Vendor Username/Email</label>
                                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}"  readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="account_holder_name">Account  Holder Name</label>
                                    <input type="text" class="form-control" id="account_holder_name" placeholder="Enter Account Holder Name" name="account_holder_name" value="{{ $vendorDetails["account_holder_name"] }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <select name="bank_name" id="bank_name" class="form-control" style="color: #495057;">
                                        <option value="Access Bank" @if($vendorDetails["bank_name"] == "Access Bank") selected @endif>Access Bank</option>
                                        <option value="FCMB" @if($vendorDetails["bank_name"] == "FCMB") selected @endif>FCMB</option>
                                        <option value="FirstMonie Wallet" @if($vendorDetails["bank_name"] == "FirstMonie Wallet") selected @endif>FirstMonie Wallet</option>
                                        <option value="Fidelity Bank" @if($vendorDetails["bank_name"] == "Fidelity Bank") selected @endif>Fidelity Bank</option>
                                        <option value="First Bank of Nigeria" @if($vendorDetails["bank_name"] == "First Bank of Nigeria") selected @endif>First Bank of Nigeria</option>
                                        <option value="Guaranty Trust Bank" @if($vendorDetails["bank_name"] == "Guaranty Trust Bank") selected @endif>Guaranty Trust Bank</option>
                                        <option value="Keystone Bank" @if($vendorDetails["bank_name"] == "Keystone Bank") selected @endif>Keystone Bank</option>
                                        <option value="Kuda MFB" @if($vendorDetails["bank_name"] == "Kuda MFB") selected @endif>Kuda MFB</option>
                                        <option value="Monie Point" @if($vendorDetails["bank_name"] == "Monie Point") selected @endif>Monie Point</option>
                                        <option value="Palmpay" @if($vendorDetails["bank_name"] == "Palmpay") selected @endif>Palmpay</option>
                                        <option value="Polaris Bank PLC" @if($vendorDetails["bank_name"] == "Polaris Bank PLC") selected @endif>Polaris Bank PLC</option>
                                        <option value="Stanbic IBTC Bank PLC" @if($vendorDetails["bank_name"] == "Stanbic IBTC Bank PLC") selected @endif>Stanbic IBTC Bank PLC</option>
                                        <option value="Sterling Bank" @if($vendorDetails["bank_name"] == "Sterling Bank") selected @endif>Sterling Bank</option>
                                        <option value="Union Bank of Nigeria" @if($vendorDetails["bank_name"] == "Union Bank of Nigeria") selected @endif>Union Bank of Nigeria</option>
                                        <option value="United Bank For Africa" @if($vendorDetails["bank_name"] == "United Bank For Africa") selected @endif>United Bank For Africa</option>
                                        <option value="Wema Bank PLC" @if($vendorDetails["bank_name"] == "Wema Bank PLC") selected @endif>Wema Bank PLC</option>
                                        <option value="Zenith Bank" @if($vendorDetails["bank_name"] == "Zenith Bank") selected @endif>Zenith Bank</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" placeholder="Enter Account Number" name="account_number" value="{{ $vendorDetails["account_number"] }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="bank_bin_code">Bank BIN Code</label>
                                    <input type="text" class="form-control" id="bank_bin_code" placeholder="Enter Bank BIN Code" name="bank_bin_code" value="{{ $vendorDetails["bank_bin_code"] }}" required="">
                                </div>
                                <div class="form-group" style="margin-top: 20px">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
        @endif
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include("admin.layout.footer")
    <!-- partial -->
</div>
@stop