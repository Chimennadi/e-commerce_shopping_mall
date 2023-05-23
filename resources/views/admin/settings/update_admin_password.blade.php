@extends("admin.layout.layout")

@section("content")
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Settings</h3>
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
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Admin Password</h4>
                        <!-- @client side validation -->
                        <!-- Error Message -->
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
                        <!-- @end client side validation -->
                        <form class="forms-sample" action="{{ url('admin/update-admin-password') }}" method="post">@csrf
                            <div class="form-group">
                                <label>Admin Username/Email</label>
                                <input class="form-control" value="{{ $adminDetails['email'] }}"  readonly="">
                            </div>
                            <div class="form-group">
                                <label>Admin Type</label>
                                <input class="form-control" value="{{ $adminDetails['type'] }}" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control" id="current_password" placeholder="Enter Current Password" name="current_password" required="">
                                <span id="check_password"></span>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="new_password" placeholder="Enter New Password" name="new_password" required="">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required="" name="confirm_password">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include("admin.layout.footer")
    <!-- partial -->
</div>
@stop