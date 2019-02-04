<?php
Route::get('/', 'LoginController@index')->name('login.form');
Route::Post('/login', 'LoginController@login')->name('login');
Route::middleware('auth')->group(function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::resource('company','CompanyController');
    Route::resource('category','CategoryController');
    Route::resource('item','ItemController');

    Route::get('stockOut/index/{export?}','StockOutController@index')->name('stockOut.index');
    Route::get('stockOut/create','StockOutController@create')->name('stockOut.create');
    Route::post('stockOut/store','StockOutController@store')->name('stockOut.store');


    Route::get('ajaxCategoryLoadByCompanyId/{id}','SettingController@ajaxCategoryLoadByCompanyId');
    Route::get('ajaxItemLoadByCategoryId/{category_id}/{company_id}','SettingController@ajaxItemLoadByCategoryId');
    Route::get('ajaxQuantityLoadByItemId/{id}','SettingController@ajaxQuantityLoadByItemId');
    Route::get('ajaxUnitPriceLoadByItemId/{id}','SettingController@ajaxUnitPriceLoadByItemId');

    Route::get('admin_settings','UserController@admin_settings')->name('admin_settings');
    Route::put('admin_settings', 'userController@update_admin_settings')->name('admin_settings.update');
    Route::get('admin_settings/profile', 'userController@show_admin_settings')->name('admin_settings.show');


    Route::get('application_settings','SettingController@application_settings')->name('application_settings');
    Route::post('application_settings', 'SettingController@update_application_settings')->name('application_settings.update');
    Route::post('logout',function (){
        auth()->logout();
        return redirect()->to('/');

    })->name('logout');
});

