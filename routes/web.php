<?php


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/','ProductController@index')->name('products');

Route::get('products','ProductController@index')->name('products');


Route::get('cart','CartController@index')->name('cart');
Route::post('cart','CartController@store')->name('cart.store');

Route::delete('cart/remove/{product}' ,'CartController@remove')->name('cart.remove');

Route::get('empty',function(){
    Cart::instance('default')->destroy();
});

//Men & women products
Route::get('category/men','ProductController@menProducts')->name('men.product');
Route::get('category/women','ProductController@womenProducts')->name('women.products');



Route::get('search','ProductController@search')->name('search.store');

//Admin panel

Route::group(['middleware'=>'Admin'],function(){

    Route::get('admin/products','Admin\AdminProductsController@index')->name('admin.products');
    Route::get('admin/products/edit/{id}','Admin\AdminProductsController@edit')->name('admin.products.edit');
    Route::put('admin/products/update/{id}','Admin\AdminProductsController@update')->name('admin.products.update');


    Route::delete('admin/delete/{id}','Admin\AdminProductsController@destroy')->name('admin.delete');

    Route::get('admin/store/products','Admin\AdminProductsController@create');
    Route::post('admin/store/products','Admin\AdminProductsController@store')->name('admin.store');


});


