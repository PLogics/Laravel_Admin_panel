<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Page;
use App\Models\Category;
use App\Models\Product;
use App\Models\UpdatePassword;
use Carbon\Carbon;
use PDO;


class IController extends Controller
{
    //homepage
    public function home_page()
    {
        return view("homePage");
    }

    //adminpage
    public function admin_page()
    {
        return view("adminPage");
    }
    public function admin_login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $data = Login::select('*')->where('username', $username)
            ->where('password', $password)
            ->count();
        // if ($username == "admin@gmail.com" && $password == "admin") {
        if ($data > 0) {
            Session()->put("user_session", $username);
            return redirect("/homePageSummary");
        } else {
            return redirect("/adminPage")->with('message', 'Username & Password didnot match!');
        }
    }

    //Page 
    public function add_info()
    {
        return view("/addInfo");
    }
    public function home_page_summary()
    {
        $data = Page::paginate(5);
        return view('/homePageSummary', compact('data'));
    }
    public function add_page_info(Request $request)
    {
        //create model Page
        $add = new Page;
        if ($request->isMethod('post')) {
            $add->name = $request->get('name');
            $add->content = $request->get('content');
            if (!empty($request->get('status'))) {
                $add->status = 1;
            } else {
                $add->status = 0;
            }
            $add->save();
        }
        return redirect('/homePageSummary');
    }
    public function delete_page_info($id)
    {
        $ob = Page::find($id);
        $ob->delete();
        return redirect('homePageSummary');
    }
    public function edit_page_info($id)
    {
        $findrecord = Page::where('id', $id)->get();
        return view('/addInfo', compact('findrecord'));
    }
    public function update_page_info(Request $request, $id = '')
    {
        $add = Page::find($id);
        if ($request->isMethod('post')) {
            $add->name = $request->get('name');
            $add->content = $request->get('content');
            if (!empty($request->get('status'))) {
                $add->status = 1;
            } else {
                $add->status = 0;
            }
            $add->save();
        }
        return redirect('homePageSummary');
    }
    public function search_page(Request $request)
    {
        if ($request->isMethod('post')) {
            $name = $request->get('name'); //for text box
            $data = Page::where('name', 'LIKE', '%' . $name . '%')->paginate(5);
        }
        return view('homePageSummary', compact('data'));
    }

    //Category
    public function category_add()
    {
        return view('categoryAdd');
    }
    public function catergory_add_info(Request $request)
    {
        //model category
        $add = new Category;
        if ($request->isMethod('post')) {
            $add->category = $request->get('category');
            $add->save();
        }
        return redirect('/categorySummary');
    }
    public function category_summary()
    {
        $categorydata = Category::paginate(4);
        return view('/categorySummary', compact('categorydata'));
    }
    public function delete_category_info($id)
    {
        $ob = Category::find($id);
        $ob->delete();
        return redirect('categorySummary');
    }
    public function edit_category_info($id)
    {
        $findrecord = Category::where('id', $id)->get();
        return view('/categoryAdd', compact('findrecord'));
    }
    public function update_category_info(Request $request, $id = '')
    {
        $add = Category::find($id);
        if ($request->isMethod('post')) {
            $add->category = $request->get('category');
            $add->save();
        }
        return redirect('categorySummary');
    }
    public function search_category(Request $request)
    {
        if ($request->isMethod('post')) {
            $category = $request->get('category'); //for text box
            $categorydata = Category::where('category', 'LIKE', '%' . $category . '%')->paginate(5);
        }
        return view('categorySummary', compact('categorydata'));
    }

    //Product
    public function product_add_info()
    {
        $categorydata = Category::paginate(5);
        return view('/ProductAddInfo', compact('categorydata'));
    }
    public function product_summary()
    {
        $productdata = Product::paginate(5);
        return view('/ProductSummary', compact('productdata'));
    }
    public function add_product_info(Request $request)
    {
        $add = new Product;
        if ($request->isMethod('post')) {
            $add->categoryname = $request->get('categoryname');
            $add->productname = $request->get('productname');
            $add->productprice = $request->get('productprice');
            //image code
            if (!empty($request->file('productimage'))) {
                $file = $request->file('productimage');
                $current = uniqid(Carbon::now()->format('YMdHs'));
                $file->getClientOriginalName();
                $file->getClientOriginalExtension();
                $fullfilename = $current . "." . $file->getClientOriginalExtension();
                $destinationPath = public_path('upload_image');
                $file->move($destinationPath, $fullfilename);
                $add->productimage = $fullfilename;
            }
            $add->productdesc = $request->get('productdesc');
            $add->save();
        }
        return redirect('/ProductSummary');
    }
    public function delete_product_info($id)
    {
        $ob = Product::find($id);
        $destinationPath = "upload_image/" . $ob->productimage;
        unlink($destinationPath);
        $ob->delete();
        return redirect('ProductSummary');
    }
    public function edit_product_info($id)
    {
        $categorydata = Category::paginate(5);
        $findrecord = Product::where('id', $id)->get();
        return view('/ProductAddInfo', compact('categorydata', 'findrecord'));
    }
    public function update_product_info(Request $request, $id = '')
    {
        $add = Product::find($id);
        $ob = Product::find($id);
        if ($request->isMethod('post')) {
            $add->categoryname = $request->get('categoryname');
            $add->productname = $request->get('productname');
            $add->productprice = $request->get('productprice');
            //image code
            if (!empty($request->file('productimage'))) {
                $file = $request->file('productimage');
                $current = uniqid(Carbon::now()->format('YMdHs'));
                $file->getClientOriginalName();
                $file->getClientOriginalExtension();
                $fullfilename = $current . "." . $file->getClientOriginalExtension();
                $destinationPath = public_path('upload_image');
                $file->move($destinationPath, $fullfilename);
                $add->productimage = $fullfilename;
                $destinationPath = "upload_image/" . $ob->productimage;
                unlink($destinationPath);
            }
            $add->productdesc = $request->get('productdesc');
            $add->save();
        }
        return redirect('ProductSummary');
    }
    public function search_product(Request $request)
    {
        if ($request->isMethod('post')) {
            $categoryname = $request->get('categoryname'); //for text box
            $productdata = Product::where('categoryname', 'LIKE', '%' . $categoryname . '%')->paginate(3);
        }
        return view('ProductSummary', compact('productdata'));
    }

    //changepassword
    public function change_password()
    {
        return view("/changePassword");
    }
    public function update_password(Request $request)
    {
        $username = $request->session()->get('user_session');
        $password = $request->get('oldpassword');
        $data = Login::select('*')->where('username', $username)
            ->where('password', $password)
            ->first();
        $newpassword = $request->get('newpassword');
        $confirmnewpassword = $request->get('confirmnewpassword');
        echo $confirmnewpassword;
        if ($newpassword == $confirmnewpassword) {
            if ($request->isMethod('post')) {
                if (isset($data)) {
                    $data->password = $request->get('newpassword');
                    $data->save();
                }
            }
        }
        return redirect("/adminPage");
    }

    //Logout
    public function logout()
    {
        session()->forget(('user_session'));
        return redirect('/adminPage');
    }
    // public function home1()
    // {
    //     return view('home1');
    // }
    // public function session_form()
    // {
    //     return view("/sessionForm");
    // }
}
