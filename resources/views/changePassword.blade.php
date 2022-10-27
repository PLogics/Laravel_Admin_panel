@if(session()->has('user_session'))
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
        <h1 class="su">Change Password</h1>
        <form action="{{url('/updatePassword')}}" method="post">
            {{csrf_field()}}
            <table class="paswdtable">
                <tr>
                    <td> Old Password </td>
                    <td><input type="password" name="oldpassword" /></td>
                </tr>
                <tr>
                    <td> New Password </td>
                    <td><input type="password" name="newpassword" /></td>
                </tr>
                <tr>
                    <td> Confirm New Password </td>
                    <td><input type="password" name="confirmnewpassword" /></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update Password" name="Submit" class="btpaswd" /></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="footer"></div>

</body>

</html>
@else
<script>
    window.location = "{{url('/adminPage')}}";
</script>
@endif