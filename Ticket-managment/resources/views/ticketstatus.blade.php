@extends("layouts.app")

@section("content")
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
                    <li class="breadcrumb-item active">Ticket status</li>
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
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="user" class="table table-condensed table-hover">
                            <thead class="thead-dark text-white">
                                <tr>
                                    <th>Sno</th>
                                    <th>User</th>
                                    <th>Mobile</th>
                                    <th>assets</th>
                                    <th>priority</th>
                                    <th>serialNo</th>
                                    <th>ModelNo</th>
                                    <th>ticketStatus</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @php
                            $sn=1;
                            @endphp
                                @foreach($data as $i)
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$i->user_id}}</td>
                                    <td>{{$i->mobile}}</td>
                                    <td>{{$i->assets}}</td>
                                    <td>{{$i->priority}}</td>
                                    <td>{{$i->serial_number}}</td>
                                    <td>{{$i->model_number}}</td>
                                    <td>{{$i->status}}</td>
                                    
                                    <td class="text-center">
                                        <button class="btn btn-dark " ><a href="/tickets/{{$i->id}}/edit"><i class="fas fa-pen text-white"></i></a></button>
                                        
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
        $("#user").DataTable();

       
    });
</script>
@endsection