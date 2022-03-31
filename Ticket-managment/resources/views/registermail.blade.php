<!DOCTYPE html>
<html>

<head>
    @include('admin.includes.head')
</head>

<body>
    <div class="container text-center" bgcolor="#f5f2da">
        <h2><b>Ticket</b></h2>
        <!-- <h3>Thankyou for Registration.</h3> -->
        <h4>Your account is created</h4>
        <h3>Email {{$email}}</h3>

        <h3>Password {{$password}}</h3>
        <p>Thankyou once again!</p>
    </div>
    @include('admin.includes.foot')
</body>

</html>