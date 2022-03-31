@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header ">
    <div class="container-fluid ">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h5>Resolved tickets count</h5>

                        <p>Resolved tickets count</p>
                    </div>
                    <div class="">
                        <!-- <i class="ion ion-person-add"></i> -->
                        <h4 class="text-center">{{$resolve}}</h4>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h5>Closed tickets count</h5>

                        <p>Closed tickets count</p>
                    </div>
                    <div class="">
                        <h4 class="text-center">{{$closed}}</h4>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h5> Active tickets count </h5>

                        <p>Active tickets count</p>
                    </div>
                    <div class="">
                        <h4 class="text-center">{{$active}}</h4>
                    </div>

                </div>
            </div>
            <br>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h5> Active Agents count</h5>

                        <p>Active Agents count</p>
                    </div>
                    <div class="">
                        <h4 class="text-center">{{$agents}}</h4>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
</section>
<!-- /.content -->
<!-- /.content-wrapper -->



@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@endsection