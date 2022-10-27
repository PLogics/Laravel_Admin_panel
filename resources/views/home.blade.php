@if(session()->has('user_session'))
<!DOCTYPE html>
<html>

<head>
    <title>Welcome to Home Page </title>
    <link rel="stylesheet" type="text/css" href="homePage.css">
</head>

<body>
    <div class="maincontainer">
        <img src="baimage.png" />
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
            <p class="logo">Friday, 21st October 2022</p>
        </div>
    </div>

    <div class="maincontainer2">
        <div class="left">
            <ul class="ul1">
                <li>Page Summary</li>
                <li>Add Page</li>
                <li>Event Summary</li>
                <li>Add Event</li>
                <li>Change Password</li>
                <li>Module Summary</li>
                <li>Login Information<br>Username:admin<br>Email: admin@domain.com<br></li>
            </ul>
        </div>
        <div class="right">
            <p class="pm">Page Manager</p>
            <p class="pm1">This section displays the list of Pages</p>
            <p class="pm2"><u><a>Click here</a></u> to create<u><a> New Page</a></u></p>
            <table class="table1">
                <tr>
                    <td class="search" colspan="2">Search</td>
                </tr>
                <tr>
                    <td>Search By Page Name:</td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Search By Parent Page:</td>
                    <td><select>
                            <option>Select Option</option>
                        </select>
                        <input type="submit" value="Search" name="search" class="search2">
                    </td>
                </tr>
            </table>
            <p class="p1">Page 1 of 2,showing 10 records out of 13 total,starting on record 1,ending on 10</p>
            <table class="table2">
                <tr class="t21">
                    <td>Id</td>
                    <td>Page Name</td>
                    <td>No. of Sub Pages</td>
                    <td>Status</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                <!-- <tr class="t23"> -->
                <tr>
                    <td colspan="6">
                        < < previous|1|2 next> >
                            <input type="submit" value="Delete" class="delete" />
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>
@else
<script>
    window.location = "{{url('/adminPage')}}";
</script>

@endif