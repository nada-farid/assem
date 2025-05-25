 <?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','staff']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
    Route::post('user/change-approved/{id}', 'UsersController@changeApprove')->name('users.change-approved');


    // Settings 
    Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::post('settings/update', 'SettingController@update')->name('settings.update');

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Course
    Route::delete('courses/destroy', 'CourseController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CourseController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CourseController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CourseController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Center
    Route::delete('centers/destroy', 'CenterController@massDestroy')->name('centers.massDestroy');
    Route::post('centers/media', 'CenterController@storeMedia')->name('centers.storeMedia');
    Route::post('centers/ckmedia', 'CenterController@storeCKEditorImages')->name('centers.storeCKEditorImages');
    Route::resource('centers', 'CenterController');

    // Curriculum
    Route::delete('curricula/destroy', 'CurriculumController@massDestroy')->name('curricula.massDestroy');
    Route::post('curricula/media', 'CurriculumController@storeMedia')->name('curricula.storeMedia');
    Route::post('curricula/ckmedia', 'CurriculumController@storeCKEditorImages')->name('curricula.storeCKEditorImages');
    Route::resource('curricula', 'CurriculumController');

    // News
    Route::delete('newss/destroy', 'NewsController@massDestroy')->name('newss.massDestroy');
    Route::post('newss/media', 'NewsController@storeMedia')->name('newss.storeMedia');
    Route::post('newss/ckmedia', 'NewsController@storeCKEditorImages')->name('newss.storeCKEditorImages');
    Route::resource('newss', 'NewsController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Hawkma
    Route::delete('hawkmas/destroy', 'HawkmaController@massDestroy')->name('hawkmas.massDestroy');
    Route::post('hawkmas/media', 'HawkmaController@storeMedia')->name('hawkmas.storeMedia');
    Route::post('hawkmas/ckmedia', 'HawkmaController@storeCKEditorImages')->name('hawkmas.storeCKEditorImages');
    Route::resource('hawkmas', 'HawkmaController');

    // Hawkam Categories
    Route::delete('hawkam-categories/destroy', 'HawkamCategoriesController@massDestroy')->name('hawkam-categories.massDestroy');
    Route::resource('hawkam-categories', 'HawkamCategoriesController');
    
    // Report Categories
    Route::delete('report-categories/destroy', 'ReportCategoriesController@massDestroy')->name('report-categories.massDestroy');
    Route::resource('report-categories', 'ReportCategoriesController');

    // Reports
    Route::delete('reports/destroy', 'ReportsController@massDestroy')->name('reports.massDestroy');
    Route::post('reports/media', 'ReportsController@storeMedia')->name('reports.storeMedia');
    Route::post('reports/ckmedia', 'ReportsController@storeCKEditorImages')->name('reports.storeCKEditorImages');
    Route::resource('reports', 'ReportsController');

    // Director
    Route::delete('directors/destroy', 'DirectorController@massDestroy')->name('directors.massDestroy');
    Route::post('directors/media', 'DirectorController@storeMedia')->name('directors.storeMedia');
    Route::post('directors/ckmedia', 'DirectorController@storeCKEditorImages')->name('directors.storeCKEditorImages');
    Route::resource('directors', 'DirectorController');

    // Goals
    Route::delete('goals/destroy', 'GoalsController@massDestroy')->name('goals.massDestroy');
    Route::resource('goals', 'GoalsController');

    // Partner
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnerController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnerController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnerController');

    // Program
    Route::delete('programs/destroy', 'ProgramController@massDestroy')->name('programs.massDestroy');
    Route::post('programs/media', 'ProgramController@storeMedia')->name('programs.storeMedia');
    Route::post('programs/ckmedia', 'ProgramController@storeCKEditorImages')->name('programs.storeCKEditorImages');
    Route::resource('programs', 'ProgramController');

    // Need
    Route::delete('needs/destroy', 'NeedController@massDestroy')->name('needs.massDestroy');
    Route::resource('needs', 'NeedController');

     // Association
    Route::delete('associations/destroy', 'AssociationController@massDestroy')->name('associations.massDestroy');
    Route::post('associations/media', 'AssociationController@storeMedia')->name('associations.storeMedia');
    Route::post('associations/ckmedia', 'AssociationController@storeCKEditorImages')->name('associations.storeCKEditorImages');
    Route::resource('associations', 'AssociationController');

    // Course Request
    Route::delete('course-requests/destroy', 'CourseRequestController@massDestroy')->name('course-requests.massDestroy');
    Route::post('course-requests/media', 'CourseRequestController@storeMedia')->name('course-requests.storeMedia');
    Route::post('course-requests/ckmedia', 'CourseRequestController@storeCKEditorImages')->name('course-requests.storeCKEditorImages');
    Route::resource('course-requests', 'CourseRequestController');
    Route::post('course-requests/update-beneficiary-status', 'CourseRequestController@updateBeneficiaryStatus')->name('course-requests.update-status');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

        // Beneficiary
    Route::delete('beneficiaries/destroy', 'BeneficiaryController@massDestroy')->name('beneficiaries.massDestroy');
    Route::post('beneficiaries/parse-csv-import', 'BeneficiaryController@parseCsvImport')->name('beneficiaries.parseCsvImport');
    Route::post('beneficiaries/process-csv-import', 'BeneficiaryController@processCsvImport')->name('beneficiaries.processCsvImport');
    Route::resource('beneficiaries', 'BeneficiaryController');

    Route::get('/attendance/{lesson_id}', 'LessonAttendanceController@index')->name('attendance.index');
    
    Route::post('/attendance/store', 'LessonAttendanceController@store')->name('attendance.store');


});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
