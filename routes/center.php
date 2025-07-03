<?php
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('center.home')->with('status', session('status'));
    }

    return redirect()->route('center.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'center', 'as' => 'center.', 'namespace' => 'Center', 'middleware' => ['auth', 'center']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('courses', 'CourseController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    Route::get('user-alert/read/{alert}', 'UserAlertsController@readAlert')->name('user-alert.read');

    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    });



});


