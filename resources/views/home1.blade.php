@if(session()->has('user_session'))
<html>

<head>
    <title></title>
</head>

<body>
    <center>
        <h1>Welcome</h1>
        <a href="{{url('/logoutUser')}}">Logout</a>
    </center>
</body>

</html>
@else
<script>
    window.location = "{{url('sessionForm')}}";
</script>

@endif