@extends("layouts.app")

@section("content")
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">User Management</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-dark">
                    <div class="card-header">
                        <h3 class="card-title"><a href="/users/create" class="btn btn-dark">Add user</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="user" class="table table-condensed table-hover">
                            <thead class="thead-dark text-white">
                                <tr>
                                <th>Sno</th>
                                    <th>Username</th>
                                    <th>Mobile</th>
                                    <th>Firstname</th>
                                    <th>lastname</th>
                                    <th>Role</th>
                                    <th>profile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $sn=1;
                            @endphp
                            @foreach ($users as $user)
                                
                                <tr>
                       
                                <td>{{$sn++}}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>
                                                @if (!empty($user->last_name))
                                                    {{ $user->last_name }}
                                                @else
                                                    <span class="text-danger">unavailable</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->role }}</td>
                                    <td>
                                    @if (!empty($user->profile_pic))
                                        <img src="{{ asset('/images' . '/' . $user->profile_pic) }}" alt="IMG" style="height: 5rem; object-fit: cover; object-position: center">
                                        @else
                                                    <span class="text-danger">unavailable</span>
                                                @endif
                                    </td>
                                    <td>{{ $user->status }}</td>
                                    
                                    <td class="text-center">
                                       
                                        <form action="/users/{{$user->id}}" method="post">
                                                    @csrf()
                                                    @method('delete')
                                                    <a href="/users/{{$user->id}}/edit" class="btn btn-dark"><i class="fas fa-pen"></i></a>
                                                    <button type="submit" onclick="return confirm('Do you really want to delete category!')" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                        </form>
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
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
<!-- Delete modal -->

<!-- Edit modal -->

@endsection
@section("script")

<script>
    $(document).ready(function() {
        $("#user").DataTable();

       
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('msg'))
        <script>
            toastr.success("{!! Session::get('msg')!!}")
        </script>
        @elseif (Session::has('error'))
        <script>
            toastr.warning("{!! Session::get('error')!!}")
        </script>
        @endif
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('msg'))
        <script>
            toastr.success("{!! Session::get('msg')!!}")
        </script>
        @elseif (Session::has('error'))
        <script>
            toastr.warning("{!! Session::get('error')!!}")
        </script>
        @endif -->
@endsection