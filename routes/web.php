<?php


Auth::routes();




Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/','Admin\AdminController@index')->name('admin.index');


    Route::resource('/book','Admin\BookController');
    Route::resource('/publishing','Admin\PublishingController');
    Route::resource('/author','Admin\AuthorController');
    Route::resource('/category','Admin\CategoryController');
    Route::resource('/book-code','Admin\BookCodeController');
    Route::resource('/lib','Admin\UserController');
    Route::resource('/reader','Admin\ReaderController');
    Route::resource('/r-book','Admin\ReaderBookController');



});


Route::middleware(['auth'])->group(function () {

});
