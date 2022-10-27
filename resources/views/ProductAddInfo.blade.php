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
            <p class="pm">Product Manager</p>
            <div class="d2">
                <p class="ap">Add Product</p>
                @if (isset($findrecord))
                <form action="{{ url('/addProductInfo/'.$findrecord[0]->id) }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ url('addProductInfo')}}" method="post" enctype="multipart/form-data">
                        @endif
                        {{ csrf_field() }}
                        <table class="table1">
                            <tr>
                                <td class="td1">Select Category</td>
                                <td><select name="categoryname" value="{{isset($findrecord[0]->categoryname) ? $findrecord[0]->categoryname : '' }}">
                                        <option>Select</option>
                                        @foreach ($categorydata as $row)
                                        <option value="{{$row->category}}">{{$row->category}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td1">Product Name</td>
                                <td><input type="text" name="productname" value="{{isset($findrecord[0]->productname) ? $findrecord[0]->productname : '' }}" class="td11"></td>
                            </tr>
                            <tr>
                                <td class="td1">Product Price</td>
                                <td><input type="text" name="productprice" value="{{isset($findrecord[0]->productprice) ? $findrecord[0]->productprice : '' }}" class="td11"></td>
                            </tr>
                            <tr>
                                <td class="td1">Product Image</td>
                                <td><input type="file" name="productimage" class="td11" value="{{isset($findrecord[0]->productimage) ? $findrecord[0]->productimage : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="td1">Product Description</td>
                                <td><input type="text" class="td15" name="productdesc" value="{{isset($findrecord[0]->productdesc) ? $findrecord[0]->productdesc : '' }}" /></td>
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