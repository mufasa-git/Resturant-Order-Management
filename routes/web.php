<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/login/magiclink', 'Auth\MagicLoginController@show');

Route::post('/login/magiclink', 'Auth\MagicLoginController@sendToken');

Route::get('/login/magiclink/{token}', 'Auth\MagicLoginController@authenticate');

Route::group(['middleware' => 'admin'], function () {

    Route::get('/home', 'HomeController@index');
    
    Route::get('/', 'Order_InfoController@index');

    Route::get('/admin', 'Order_InfoController@index');
  

    Route::resource('order', 'OrderController');

    Route::resource('product', 'ProductController');

    Route::resource('business', 'BusinessController');

    Route::resource('user', 'UserController');

    Route::resource('admin/kitchen', 'KitchenController');

    Route::resource('admin/bartender', 'BartenderController');

    Route::get('password', 'OrderController@password');
    Route::post('password', 'OrderController@updatePassword');

});

    Route::resource('table', 'TableController');
    Route::post('table', 'TableController@table_status')->name('table.table_status');
    Route::post('order_info', 'TableController@order_info')->name('table.order_info');
    Route::post('order_list', 'TableController@order_list')->name('table.order_list');
    Route::get('edit_order', 'TableController@edit_order')->name('table.edit_order');
    Route::post('order_1', 'TableController@order_1')->name('table.order_1');
    Route::post('edit_flag', 'TableController@edit_flag')->name('table.edit_flag');
    
    Route::get('drink', 'TableController@show_drink')->name('table.show_drink');
    Route::get('food', 'TableController@show_food')->name('table.show_food');
    Route::get('finish', 'TableController@show_finish')->name('table.show_finish');
    Route::post('final_confirm', 'TableController@final_confirm')->name('table.final_confirm');

    Route::get('food_starter', 'TableController@food_starter')->name('table.food_starter');
    Route::get('food_main', 'TableController@food_main')->name('table.food_main');
    Route::get('food_dessert', 'TableController@food_dessert')->name('table.food_dessert');

    Route::get('drink_alcoh', 'TableController@drink_alcoh')->name('table.drink_alcoh');
    Route::get('drink_non', 'TableController@drink_non')->name('table.drink_non');

    Route::get('another_food', 'TableController@another_food')->name('table.another_food');
    Route::get('another_drink', 'TableController@another_drink')->name('table.another_drink');
    Route::get('quantity_confirm/{id}', 'TableController@quantity_confirm')->name('table.quantity_confirm');
    Route::resource('order', 'OrderController');

    Route::post('bartender_thumbs', 'Order_InfoController@bartender_thumbs')->name('order_info.bartender_thumbs');
    Route::post('bartender_check', 'Order_InfoController@bartender_check')->name('order_info.bartender_check');
    Route::post('kitchen_thumbs', 'Order_InfoController@kitchen_thumbs')->name('order_info.kitchen_thumbs');
    Route::post('kitchen_check', 'Order_InfoController@kitchen_check')->name('order_info.kitchen_check');



Route::group(['middleware' => 'waiter'], function () {
    Route::get('/waiter', 'Order_InfoController@index');


});
    Route::resource('waiter', 'Order_InfoController');
Route::group(['middleware' => 'bartender'], function () {
    Route::get('/bartender', 'BartenderController@index');
    Route::resource('bartender', 'BartenderController');

});

Route::group(['middleware' => 'kitchen'], function () {
    Route::get('/kitchen', 'KitchenController@index');
    Route::resource('kitchen', 'KitchenController');

});

Route::get('logout', function (){
    Auth::logout();
    return redirect('/');
});