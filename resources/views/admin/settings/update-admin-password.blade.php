@extends('admin\Layout\layout')
@section('content')
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update admin password</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label>Admin Name</label>
                      <!-- recieving the admin name from the controller and injecting it to the input label ------>
                      <input type="text" class="form-control" id="admin_name" placeholder="Name" readonly value="{{ $adminDetails['name'] }}">
                    </div>
                    <div class="form-group">
                        <label>Admin Type</label>
                        <!-- recieving the admin type from the controller and injecting it to the input label ------>
                        <input type="text" class="form-control" id="admin_type" placeholder="Name" readonly value="{{ $adminDetails['type'] }}">
                      </div>
                    <div class="form-group">
                      <label>Email Address</label>
                       <!-- recieving the admin email address from the controller and injecting it to the input label ------>
                      <input type="email" class="form-control" id="admin_email_address" placeholder="Email" readonly value="{{ $adminDetails['email'] }}">
                    </div>
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="text" name="Current_Password" class="form-control" id="Current_Password" placeholder="Enter Current Password" required>
                        <span id="check_password"></span>
                      </div>
                    <div class="form-group">
                      <label for="new_pasword">New Password</label>
                      <input type="password" name="New_Password" class="form-control" id="New_Password" placeholder="Enter New Password" required>
                    </div>
                    <div class="form-group">
                      <label for="confirm_new_password">Confirm New Password</label>
                      <input type="password" name="Confirm_New_Password" class="form-control" id="Confirm_New_Password" placeholder="Confirm New Password" required>
                    </div>
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