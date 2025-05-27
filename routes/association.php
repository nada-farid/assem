<?php

Route::group(['prefix' => 'association','as' => 'association.'],function () {
      Route::post('/register', 'ProfileController@register')->name('register');
});
      
Route::group(['prefix' => 'association','as' => 'association.', 'middleware' => ['auth', 'association']],function () {
      Route::get('/home', 'HomeController@index')->name('home');
      Route::get('/profile', 'ProfileController@editProfile')->name('profile.edit');
      Route::put('/profile/update', 'ProfileController@updateProfile')->name('profile.update');
      Route::get('/courses/add', 'CourseController@addCourse')->name('courses.add');
      Route::post('/courses/enroll', 'CourseController@enroll')->name('courses.enroll');
      Route::get('/request/delete/{id}', 'CourseController@deleteRequest')->name('request.delete');
      Route::get('/courses/requests', 'CourseController@requests')->name('courses.requests');
      Route::get('/reports', 'AssociationReportController@index')->name('reports');
      Route::get('/reports/show/{course_id}', 'AssociationReportController@report')->name('reports.show');
});

                                                            
