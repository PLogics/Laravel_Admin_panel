{{-- @if(session()->has('user_session')) --}}
<html>

<head>
    <title>Business_Administration_Admin</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/mysecondproject/public/css/adminPage.css">
</head>

<body>
    <div class="maincontainer">
        <img src="http://localhost/mysecondproject/public/images/baimage.png">
    </div>
    </div>

    <div class="maincontainer1">
        <div class="innercontainer1">
            <p class="logo">{{date('d/m/y')}}</p>
        </div>
    </div>

    <div class="maincontainer2">
        <h1 class="su">Login</h1>
        <form action="{{url('/adminLogin')}}" method="post">
            {{csrf_field()}}
            <table class="logintable">
                <tr>
                    <td> Username </td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                    <td>Password </td>
                    <td><input type="password" name="password" /></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Login" name="login" class="btlogin" /></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="footer"></div>

</body>

</html>
{{-- @else
<script>
    window.location = "{{url('/adminPage')}}";
</script>
@endif --}}