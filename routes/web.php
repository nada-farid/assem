<?php
Route::group(['as' => 'frontend.'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/structure', 'HomeController@structure')->name('structure');
    Route::get('/needs', 'HomeController@needs')->name('needs');
    Route::get('/beneficars', 'HomeController@beneficars')->name('beneficars');
    Route::get('/programs', 'HomeController@programs')->name('programs');
    Route::get('hawkma/{category}', 'HomeController@hawkma')->name('hawkma');
    Route::get('reports/{type}', 'HomeController@reports')->name('reports');
    Route::get('news', 'NewsController@news')->name('news');
    Route::get('/courses', 'CourseController@index')->name('courses');
    Route::get('/course/{id}', 'CourseController@show')->name('course');
    Route::get('centers', 'CenterController@index')->name('centers');
    Route::get('centers/{id}', 'CenterController@show')->name('center');
    Route::get('contact-us', 'ContactUsController@contact')->name('contact');
    Route::post('contact-us/store', 'ContactUsController@store')->name('contact.store');
    Route::get('/clear-cache', 'HomeController@cache');
    Route::get('/courses/filter', 'CourseController@filter')->name('courses.filter');
    Route::get('/login-user', 'AuthController@login')->name('login');
    Route::get('/register', 'AuthController@register')->name('register');
    Route::post('/user/store', 'AuthController@store')->name('user.store');
    Route::get('course/attend/{id}', 'CourseController@course_attend')->name('course.attend');
    Route::get('course/certificate/{id}', 'CourseController@course_certificate')->name('course.certificate');
    Route::post('course/attend_store', 'CourseController@attend_store')->name('course.attend_store');
    Route::post('course/certificate_store', 'CourseController@certificate_store')->name('course.certificate_store');

});



