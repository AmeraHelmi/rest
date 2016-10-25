<?php

Route::get     ('/adminpanel', 'HomeController@index');

//resturant
Route::get     ('/',            'RestController@index');
Route::POST     ('/search',            'RestController@search');
Route::GET     ('/user_edit/{id}',            'RestController@user_edit');
Route::GET     ('/user_add/{id}',            'RestController@user_add');
Route::POST     ('/new_user',            'RestController@new_user');
Route::POST     ('/user_update',            'RestController@user_update');
Route::POST     ('/get_items',            'RestController@get_items');
Route::POST     ('/calculate',            'RestController@calculate');
Route::POST     ('/loadmore',            'RestController@loadmore');
Route::POST     ('/items_loadmore',            'RestController@items_loadmore');
Route::POST     ('/finish',            'RestController@finish');
Route::POST     ('/display',            'RestController@display');
Route::POST     ('/item_remove',            'RestController@item_remove');
Route::POST     ('/save_session',            'RestController@save_session');
Route::GET     ('/report',            'RestController@report');
Route::GET     ('/menu/{id?}',            'RestController@menu');
Route::GET     ('/all_items/{id}',            'RestController@all_items');


//Category
Route::POST    ('/category/store'          ,array('as' => 'addcategory','uses' => 'CategoryController@store'));
Route::POST    ('/category/update'         ,'CategoryController@update');
Route::resource('/category'                , 'CategoryController');

//Item
Route::POST    ('/item/store'          ,array('as' => 'additem','uses' => 'ItemController@store'));
Route::POST    ('/item/update'         ,'ItemController@update');
Route::resource('/item'                , 'ItemController');

//customers
Route::POST    ('/customer/store'          ,array('as' => 'addcustomer','uses' => 'CustomerController@store'));
Route::POST    ('/customer/update'         ,'CustomerController@update');
Route::resource('/customer'                , 'CustomerController');

//admin users
Route::resource('/users/update_admin' ,'AdminController@update_admin');
Route::resource('/users' ,'AdminController');


//Invoice
Route::resource('/invoice'                , 'InvoiceController');


Route::controllers([
	'auth'      => 'Auth\AuthController',
	'password'  => 'Auth\PasswordController'
]);
