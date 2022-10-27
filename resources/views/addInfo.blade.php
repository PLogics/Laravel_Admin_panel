{{-- @if(session()->has('user_session')) --}}
<!DOCTYPE html>
<html>

<head>
    <title>Add Information</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/mysecondproject/public/css/addinfo.css">
</head>

<body>
    <!-- @inlcude('header.php') -->
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
                <li><a href="{{url('/changePassword')}}">Change Password</a></li>
                <li>Login Information<br>Username:admin<br>Email: admin@domain.com<br></li>
            </ul>
        </div>
        <div class="right">
            <p class="pm">Page Manager</p>
            <div class="d2">
                <p class="ap">Add Page</p>
                @if (isset($findrecord))
                <form action="{{ url('/addPageInfo/'.$findrecord[0]->id) }}" method="post">

                    @else
                    <form action="{{ url('addPageInfo')}}" method="post">

                        @endif

                        {{ csrf_field() }}
                        <table class="table1">
                            <tr>
                                <td class="td1">Name*</td>
                                <td><input type="text" name="name" value="{{isset($findrecord[0]->name) ? $findrecord[0]->name : '' }}" class="td11"></td>
                            </tr>
                            <tr>
                                <td class="td1">Content</td>
                                <td><input type="textarea" class="td15" name="content" value="{{isset($findrecord[0]->content) ? $findrecord[0]->content : '' }}" /></td>
                            </tr>
                            <tr>
                                <td class="td1">Status</td>
                                {{-- @if (isset($findrecord)) --}}
                                    @if (isset($findrecord[0]->status)==0)
                                    <td><input type="checkbox" name="status" checked></td>
                                    @else
                                    <td><input type="checkbox" name="status" ></td>
                                    @endif
                                {{-- @else
                                <td><input type="checkbox" name="status"></td> --}}
                                {{-- <td class="td1">Status</td>
                                @if (isset($findrecord[0]->status)==0)
                                <td><input type="checkbox" name="status" ></td>
                                @else
                                <td><input type="checkbox" name="status" checked></td>  
                                @endif --}}

                            </tr>
                        </table>
                        <input type="submit" value="Save" name="save" class="s1" />
                    </form>
            </div>
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