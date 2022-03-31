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
                <h1>User Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/user-management') }}">User Management</a></li>
                    <li class="breadcrumb-item active">Update User</li>
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
                        <h3 class="card-title">Update User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body row">
                        <div class="form-group col-md-6">
                                <label for="fname">User name</label>
                                <input type="text" class="form-control" name="uname" id="username" placeholder="Enter Username" autofocus value="{{ $user->email }}">
                                @error('uname')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" autofocus value="{{ $user->mobile }}">
                                @error('mobile')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="fname" placeholder="Enter First Name" autofocus value="{{ $user->first_name }}">
                                @error('firstname')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="lname" placeholder="Enter last name" value="{{ $user->last_name }}">
                                @error('lastname')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Select Role</label>
                                <select name="role" class="form-control ">
                                    @if(Auth::user()->isAdmin())
                                    <option value="">Choose role...</option>
                                    <option value="subadmin" {{$user->role==="subadmin"?"selected":""}}>Sub Admin</option>
                                    <option value="agent" {{$user->role==="agent"?"selected":""}}>Agent</option>
                                    @endif
                                    @if(Auth::user()->isSubAdmin())
                                    <option value="">Choose role...</option>
                                    <option value="user" {{$user->role==="user"?"selected":""}}>User</option>
                                    @endif
                                </select>
                                @error('role')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                
                                <label for="profile_picture">Profile</label>
                                <table>
                                    <tr>
                                        <td>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input " id="profile_picture" name="pic" >
                                        <label class="custom-file-label" for="profile_picture">Choose file</label>
                                        @if(!empty($user->profile_pic))
                                    </div>
                                    <input class="form-control" type="hidden" name="current_image" value="{{ $user->profile_pic }}"> 
                                    @endif
                                </div>
                                        </td>
                                        <td>
                                            @if(!empty($user->profile_pic))
                                            <img style="width:70px; height:70px;" src="{{ asset('/images'.'/'.$user->profile_pic) }}">
                                          @endif
                                        </td>
                                    </tr>
                                </table>
                                @error('pic')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 my-3">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" checked value="active" name="status">
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


@endsection