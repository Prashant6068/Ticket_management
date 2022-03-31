@extends("layouts.app")

@section("content")
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Report</li>
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
                       
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="ticket" class="table table-condensed table-hover">
                            <thead class="thead-dark text-white">
                                <tr>
                                    <th>Sno</th>
                                    <th>User</th>
                                    <th>Mobile</th>
                                    <th>Assets</th>
                                    <th>Priority</th>
                                    <th>Serial no</th>
                                    <th>Model no</th>
                                    <th>Assign Agent</th>
                                    <th>Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $sn=1;
                            @endphp
                                @foreach ($tickets as $ticket)
                                    
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$ticket->user->email}}</td>
                                    <td>{{$ticket->mobile}}</td>
                                    <td>{{$ticket->assets}}</td>
                                    <td>{{$ticket->priority}}</td>
                                    <td>{{$ticket->serial_number}}</td>
                                    <td>{{$ticket->model_number}}</td>
                                    <td>{{$ticket->agent->email}}</td>
                                    <td>{{$ticket->status}}</td>
                                    
                                    {{-- <td class="text-center">
                                        <button class="btn btn-warning edit my-1" ><i class="fas fa-pen"></i></button>
                                        <button class="btn btn-danger delete my-1" ><i class="fas fa-trash-alt"></i></button>
                                    </td> --}}
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

@endsection
@section("script")
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
<script>
    $(document).ready(function() {
        $("#ticket").DataTable({
            
        });
    });
</script>
@endsection