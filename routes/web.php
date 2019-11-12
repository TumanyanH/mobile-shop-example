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

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function (){
    //url /admin
    Route::get('/', 'Controller@adminLogin');
    //admin login view
    Route::get('/login', 'Admin\AdminController@index')->name('login');
    //admin sign-in action
    Route::post('/sign-in', 'Admin\AdminController@signIn')->name('signin');
    
    // already authenticated admin-users
    Route::middleware('isAdmin')->group(function (){
        
        /** 
         * admin simple views
         */
        // admin logout
        Route::get('logout', 'Admin\AdminController@logout')->name('logout');
        
        //admin home view
        Route::get('/home', 'Admin\AdminController@home')->name('home');

        //admin categories view
        Route::get('/categories', 'Admin\AdminController@categories')->name('categories');

        //admin brands view
        Route::resource('brands', 'Admin\BrandController');

        //admin products view 
        Route::get('/products', 'Admin\AdminController@products')->name('products');

    
    });
});
