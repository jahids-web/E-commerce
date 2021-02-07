<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;



Route::get('/', 'FrontendController@index');
Route::get('/contact', 'FrontendController@contact');
Route::get('/about', 'FrontendController@about');
Route::get('/faq', 'FrontendController@faq');
Route::get('/shop','FrontendController@shop');
Route::get('/search','FrontendController@search');

Auth::routes(['verify' => true]);



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add/faq', 'HomeController@addfaq');               

Route::post('/add/faq/post', 'HomeController@addfaqpost');

Route::get('/faq/delete/{faq_id}', 'HomeController@faqdelete');

Route::get('/faq/edit/{faq_id}', 'HomeController@faqedit');

Route::post('/faq/edit/post', 'HomeController@faqeditpost');

Route::get('/faq/restore/{faq_id}', 'HomeController@faqrestore');


Route::get('/faq/hard/delete/{faq_id}', 'HomeController@faqharddelete');

Route::get('/edit/profile', 'HomeController@editprofile')->name('editprofile');

Route::post('/change/password', 'HomeController@changepassword')->name('changepassword');

Route::resource('category','CategoryController');

Route::resource('product','ProductController');

Route::resource('coupon','CouponController');

Route::get('home/customer','CustomerController@homecustomer');

Route::post('add/to/cart', 'CartController@addtocart');

Route::get('delete/from/cart/{cart_id}','CartController@deletefromcart');

Route::post('update/cart','CartController@updatecart');

Route::get('cart','CartController@cart');

Route::get('cart/{coupon_name}','CartController@cart');

Route::post('checkout','CheckoutController@index');

Route::post('checkout/post','CheckoutController@checkoutpost');

// Route::post('add/review','CustomerController@addreview');

Route::get('role/manager', 'RoleController@rolemanager')->name('role.manager');

Route::post('role/manager','RoleController@roleadd')->name('role.add');

Route::post('role/assign','RoleController@roleassign')->name('role.assign');

Route::get('role/permission/edit/{user_id}','RoleController@rolepermissionedit')->name('role.permission.edit');

Route::post('role/permission/edit','RoleController@rolepermissioneditpost')->name('role.permission.edit.post');