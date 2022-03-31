@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ticket</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/user-management') }}">Ticket</a></li>
                    <li class="breadcrumb-item active">Ticket</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card card-outline card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit Ticket</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ url('user-management/add') }}">
                        @csrf
                        <div class="card-body row">
                        <div class="form-group col-md-6">
                                <label>User</label>
                                <select name="role" class="form-control ">
                                    <option value="" selected disabled>-- Select user --</option>

                                    <option value=""> admin@gmail.com</option>

                                </select>
                               
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fname">Mobile</label>
                                <input type="text" class="form-control  " name="mobile" id="mobile" placeholder="Enter mobile number" autofocus value="{{ old('mobile') }}">
                               
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fname">Assets</label>
                                <input type="text" class="form-control " name="assets" id="assets" placeholder="Enter assets " autofocus value="{{ old('fname') }}">
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prority</label>
                                <select name="role" class="form-control ">
                                    <option value="" selected disabled>-- Select priority --</option>

                                    <option value=""> High</option>
                                    <option value=""> low</option>

                                </select>
                             
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="lname">Serial no</label>
                                <input type="text" class="form-control  " name="sno" id="sno" placeholder="Enter serial no" value="{{ old('lname') }}">
                              
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">Model no</label>
                                <input type="text" class="form-control  " name="model" id="model" placeholder="Enter model no" value="{{ old('lname') }}">
                              
                            </div>

                           
                            
                            <div class="form-group col-md-6 my-3">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" value="active" name="active">
                                    <label class="custom-control-label" for="customSwitch3">Active</label>
                                </div>
                            </div>
                               
                            
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
@endsection
@section('script')

<!-- toastr Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (session('status') === "success")

<!-- toastr success -->
<script>
    toastr.success("User Added Successfully");
</script>

@elseif (session('status') === "failed")

<!-- toastr danger  -->
<script>
    toastr.error("Failed to add user.");
</script>

@endif
@endsection