<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homePage', 'App\Http\Controllers\IController@home_page');

//admin_page
Route::get('/adminPage', 'App\Http\Controllers\IController@admin_page');
Route::post('/adminLogin', 'App\Http\Controllers\IController@admin_login');

//PageSummary
Route::get('homePageSummary', 'App\Http\Controllers\IController@home_page_summary');
Route::get('addInfo', 'App\Http\Controllers\IController@add_info');
Route::post('addPageInfo', 'App\Http\Controllers\IController@add_page_info');
Route::get('deletePageInfo/{id}', 'App\Http\Controllers\IController@delete_page_info');
Route::get('editDisplay/{id}', 'App\Http\Controllers\IController@edit_page_info');
Route::post('/addPageInfo/{id}', 'App\Http\Controllers\IController@update_page_info');
Route::post('homePageSummary', 'App\Http\Controllers\IController@search_page');

//Category
Route::get('categorySummary', 'App\Http\Controllers\IController@category_summary');
Route::get('categoryAdd', 'App\Http\Controllers\IController@category_add');
Route::post('categoryAddInfo', 'App\Http\Controllers\IController@catergory_add_info');
Route::get('deleteCategoryInfo/{id}', 'App\Http\Controllers\IController@delete_category_info');
Route::get('editCategory/{id}', 'App\Http\Controllers\IController@edit_category_info');
Route::post('/addCategoryInfo/{id}', 'App\Http\Controllers\IController@update_category_info');
Route::post('categorySummary', 'App\Http\Controllers\IController@search_category');

//Product
Route::get('ProductSummary', 'App\Http\Controllers\IController@product_summary');
Route::get('ProductAddInfo', 'App\Http\Controllers\IController@product_add_info');
Route::post('addProductInfo', 'App\Http\Controllers\IController@add_product_info');
Route::get('deleteProductInfo/{id}', 'App\Http\Controllers\IController@delete_product_info');
Route::get('editProduct/{id}', 'App\Http\Controllers\IController@edit_product_info');
Route::post('/addProductInfo/{id}', 'App\Http\Controllers\IController@update_product_info');
Route::post('ProductSummary', 'App\Http\Controllers\IController@search_product');

//changePassword
Route::get('changePassword', 'App\Http\Controllers\IController@change_password');
Route::post('updatePassword', 'App\Http\Controllers\IController@update_password');

//logout
Route::get('/logoutUser', 'App\Http\Controllers\IController@logout');


// Route::get('/sessionForm', 'App\Http\Controllers\IController@session_form');
// Route::post('/sessionFormSubmit', 'App\Http\Controllers\IController@sfm');
// Route::get('/home1', 'App\Http\Controllers\IController@home1');
