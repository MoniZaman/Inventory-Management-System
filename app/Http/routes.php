<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => ['web']], function () {
    //
});
//=================================================================================================
Route::group(['middleware' => 'web'], function () {
    //For Category
    Route::get('/home/manage_category', function () {
    	if (Auth::check()) {
     return view('custom_view.manage_category');
		}
   		return redirect('/');
	});

    Route::get('/home/add_category',['middleware' => 'auth',  function () {
    return view('custom_view.add_category');
	}]);
    //For Categorylist store ,edit, update and delete
    Route::post('/home/categorylist/store', ['middleware' => 'auth','uses'=>'CategoryController@store']);
    Route::get('/home/categorylist_edit/{id}',['middleware' => 'auth', 'uses'=>'CategoryController@edit']);
    Route::post('/home/categorylist/update',['middleware' => 'auth', 'uses'=>'CategoryController@update']);
    Route::get('/home/categorylist_delete/{id}',['middleware' => 'auth', 'uses'=>'CategoryController@delete']);
    
	//For Brand===================================
	Route::get('/home/manage_brand',['middleware' => 'auth', function () {
    return view('custom_view.manage_brand');
	}]);

    Route::get('/home/add_brand',['middleware' => 'auth', function () {
    return view('custom_view.add_brand');
	}]);

    //For Brand store ,edit, update and delete
    Route::post('/home/brandlist/store',['middleware' => 'auth', 'uses'=>'BrandController@store']);   
    Route::get('/home/brand_edit/{id}',['middleware' => 'auth', 'uses'=>'BrandController@edit']);
    Route::post('//home/brandlist/update',['middleware' => 'auth', 'uses'=>'BrandController@update']);
    Route::get('/home/brand_delete/{id}',['middleware' => 'auth', 'uses'=>'BrandController@delete']);


    //For Product
    Route::get('/home/manage_product',['middleware' => 'auth', function () {
    return view('custom_view.manage_product');
	}]);

    Route::get('/home/add_product',['middleware' => 'auth', function () {
    return view('custom_view.add_product');
	}]);
    //For ProductList store ,edit, update and delete
    Route::post('/home/productlist/store',['middleware' => 'auth', 'uses'=>'ProductController@store']);
    Route::get('/home/productlist_edit/{id}',['middleware' => 'auth', 'uses'=>'ProductController@edit']);
    Route::post('/home/productlist/update',['middleware' => 'auth', 'uses'=>'ProductController@update']);
    Route::get('/home/productlist_delete/{id}',['middleware' => 'auth', 'uses'=>'ProductController@delete']);
    //For Order
    Route::get('/home/manage_order',['middleware' => 'auth', function () {
    return view('custom_view.manage_order');
	}]);

    Route::get('/home/new_order',['middleware' => 'auth', function () {
    return view('custom_view.new_order');
	}]);
    //For Order 
    Route::post('/home/orderlist/store',['middleware'=>'auth', 'uses'=>'OrderController@store']);
    Route::get('/home/order_list_edit/{id}',['middleware' => 'auth', 'uses'=>'OrderController@edit']);
    Route::post('/home/order_list/update',['middleware' => 'auth', 'uses'=>'OrderController@update']);
    Route::get('/home/order_list_delete/{id}',['middleware' => 'auth', 'uses'=>'OrderController@delete']);
    Route::get('/home/order_list_print/{id}',['middleware' => 'auth', 'uses'=>'OrderController@print_invoice']);
    

    Route::post('/home/productlist/store', ['middleware'=>'auth', 'uses'=>'ProductController@store']);
    //Route::get('/home/manage_category_print', ['middleware'=>'auth', 'uses'=>'ProductController@invoice']);


    Route::get('/home', 'HomeController@index');
});
