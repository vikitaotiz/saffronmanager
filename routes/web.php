<?php

Route::group(['middle' => 'auth'], function () {

  Route::get('markAsRead', function(){
     auth()->user()->unreadNotifications->markAsRead();

     return redirect()->back()->with('success', 'All notifications marked as read.');
 })->name('markAsRead');

    Route::resource('comments', 'CommentsController');

    Route::get('appointments/{id}', ['as' => 'appointments.closeAppointment', 'uses' => 'AppointmentsController@closeAppointment']);

    Route::get('appointments/{id}', ['as' => 'appointments.openAppointment', 'uses' => 'AppointmentsController@openAppointment']);

});


Route::get('/', function () { return redirect('/admin/home'); });


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

//Socialite authentication
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/googles/callback', 'Auth\LoginController@handleProviderCallback');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');

$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/home', 'HomeController@index');

    Route::resource('roles', 'Admin\RolesController');

    Route::resource('rooms', 'RoomsController');

    Route::resource('records', 'RecordsController');

    Route::resource('housekeepings', 'HousekeepingsController');

    Route::resource('departments', 'DepartmentsController');

    Route::resource('tasks', 'TasksController');

    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);

    Route::resource('users', 'Admin\UsersController');

    // Route::get('/users/{id}', 'Admin\UsersController@deptMember');

    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
        Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
        Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);

        Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);

        Route::get('department_messages/{id}', ['as' => 'threads.show', 'uses' => 'DepartmentMessagesController@show']);

        Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    });

    Route::resource('clients', 'ClientsController');

    Route::resource('appointments', 'AppointmentsController');

    Route::get('/calendar', 'AppointmentsController@fullCalendar')->name('appointments.calendar');

    Route::resource('/reports', 'ReportsController');

    Route::get('/settings', 'SettingsController@index')->name('settings.index');

    Route::get('/show_dpt/{id}', 'DepartmentsController@show_dpt');

    Route::get('/show_form/{id}', 'DepartmentsController@show_form');
    
    Route::get('/chats', 'ContactsController@chats');

    Route::get('/contacts', 'ContactsController@get');
    
    Route::get('/conversation/{id}', 'ContactsController@getChatsFor');
    
    Route::post('/conversation/send', 'ContactsController@send');
   
});


