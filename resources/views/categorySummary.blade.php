{{-- @if(session()->has('user_session')) --}}
<!DOCTYPE html>
<html>

<head>
    <title>Welcome to Home Page </title>
    <link rel="stylesheet" type="text/css" href="http://localhost/mysecondproject/public/css/homePage.css">
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
            <p class="logo">{{date('d/m/y')}}</p>
        </div>
    </div>

    <div class="maincontainer2">
        <div class="left">
            <ul class="ul1">
                <li><a href="{{url('/homePageSummary')}}">Page Summary</a></li>
                <li><a href="{{url('/addInfo')}}">Add Page</a></li>
                <li><a href="{{url('/categorySummary')}}">Category Summary</a></li>
                <li><a href="{{url('/categoryAdd')}}">Add Category</a></li>
                <li><a href="{{url('/ProductSummary')}}">Product Summary</a></li>
                <li><a href="{{url('/ProductAddInfo')}}">Add Product</a></li>
                <li><a href="{{'/changePassword'}}">Change Password</a></li>
                <li>Login Information<br>Username:admin<br>Email: admin@domain.com<br></li>
            </ul>
        </div>
        <div class="right">
            <p class="pm">Category Manager</p>
            <p class="pm1">This section displays the list of Categories</p>
            <p class="pm2"><u><a href="{{url('/categoryAdd')}}">Click here</a></u> to create<u><a> New Category</a></u></p>
            <form action="{{ url('/categorySummary')}}" method="post">
                {{ csrf_field() }}
                <table class="table1">
                    <tr>
                        <td class="search" colspan="2">Search</td>
                    </tr>
                    <tr>
                        <td>Search By Category Name:</td>
                        <td><input type="text" name="category">
                            <input type="submit" value="Search" name="search" class="search2">
                        </td>
                    </tr>
                </table>
            </form>
            <table class="table2">
                <tr class="t21">
                    <td>S.No.</td>
                    <td>Category Name</td>
                    <td>Delete</td>
                    <td>Edit</td>
                </tr>
                @foreach($categorydata as $row)
                <tr class="">
                    <td>{{$row->id}}</td>
                    <td>{{$row->category}}</td>
                    <td><a href="{{ 'deleteCategoryInfo/'. $row->id }}"><input type="submit" class="bDE" value="Delete" /></a></td>
                    <td><a href=" {{ 'editCategory/' . $row->id }}"><input type="submit" class="bDE" value="Edit" /></a></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6">{{$categorydata->links('pagi')}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>
{{-- @else
<script>
    window.location = "{{url('/adminPage')}}";
</script>

@endif --}}