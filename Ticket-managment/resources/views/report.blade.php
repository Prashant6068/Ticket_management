@extends("layouts.app")

@section("content")
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Report</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content ">
    <div class="container-fluid ">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card card-outline card-dark">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{url('/generateReport')}}">
                            @csrf
                            <div class="control-group">
                                <label class="control-label"><i class="fa fa-calendar" aria-hidden="true">&nbsp;Start date</i>
                                </label>
                                <input id="StartDate" name="StartDate" style="margin-left: 10px;" size="55" type="text" />
                            </div>
                            <br>
                            <div class="control-group">
                                <label class="control-label"><i class="fa fa-calendar" aria-hidden="true">&nbsp;End data</i>
                                </label>
                                <input id="EndDate" name="EndDate" style="margin-left: 10px;" size="55" type="text" />
                            </div>
                            <br>

                            <input type="submit" class="btn btn-dark">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section("script")

<script>
    $(document).ready(function() {
        $("#ticket").DataTable({
            responsive: true,
        });
        $("#StartDate").datepicker({
            numberOfMonths: 2,

            onSelect: function(selected) {
                $("#EndDate").datepicker("option", "minDate", selected)
            }
        });
        $("#EndDate").datepicker({
            numberOfMonths: 2,
            onSelect: function(selected) {
                $("#StartDate").datepicker("option", "maxDate", selected)
            }
        });

    });
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min', today);
</script>
@endsection