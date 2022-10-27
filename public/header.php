<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/mysecondproject/public/css/homePage.css">
    <title>Document</title>
</head>

<body>
    <div class="maincontainer">
        <img src="http://localhost/mysecondproject/public/images/baimage.png" />
        <div class="innercontainer">
            <table>
                <tr>
                    <td><a href="{{url('/logoutUser')}}"><input type="submit" value="Logout" class="btlogout" /></a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="maincontainer1">
        <div class="innercontainer1">
            <p class="logo">Friday, 8th July 2022</p>
        </div>
    </div>
</body>

</html>