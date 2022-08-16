@extends('admin\Layout\layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Admin Details</h4>
                        @if(Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error</strong> {{Session::get('error_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if(Session::has('Success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> {{ Session::get('Success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
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
                        <form class="forms-sample" action="{{ url('admin/update-admin-details') }}" method="POST"  enctype="multipart/form-data"
                         name="updateAdminDetailsForm" id="updateAdminDetailsForm" >@csrf
                            <div class="form-group">
                                <label>Admin Type</label>
                                <!-- recieving the admin type from the controller and injecting it to the input label ------>
                                <input type="text" class="form-control" id="admin_type" placeholder="Name" readonly value="{{ Auth::guard('admin')->user()->type }}">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <!-- recieving the admin email address from the controller and injecting it to the input label ------>
                                <input type="email" class="form-control" id="admin_email_address" placeholder="Email" readonly value="{{ Auth::guard('admin')->user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="admin_name">Admin Name</label>
                                <input type="text" name="admin_name" class="form-control" id="admin_name" placeholder="Admin's name" required value="{{ Auth::guard('admin')->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="admin_phone_number">Phone Number</label>
                                <input type="text" name="admin_phone_number" class="form-control" id="admin_phone_number" placeholder="Enter new number" required value="{{ Auth::guard('admin')->user()->mobile_number }}">
                            </div>
                            <div class="form-group">
                                <label for="admin_image">Upload your photo</label>
                                <input type="file" name="admin_image" class="form-control" id="admin_image" accept="image/*" >
                            </div>
                            @if(!empty(Auth::guard('admin')->user()->image))
                             <a target="_blank" href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image) }}">View Image</a>
                            <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                            @endif
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
<!-- Custom js for this page-->
<script src="{{ url('admin/js/file-upload.js') }}"></script>
<script src="{{ url('admin/js/typeahead.js') }}"></script>
<script src="{{ url('admin/js/select2.js') }}"></script>
<!-- End custom js for this page-->
@endsection