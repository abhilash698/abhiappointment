<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/admin/login');
});

Route::get('/admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('/admin/dashboard','Admin\AdminController@getDashboard');
Route::get('/admin/calendar','Admin\AdminController@getCalendar');
Route::get('/admin/customers','Admin\AdminController@getCustomersPage');

Route::post('/api/customer', 'Admin\AdminController@getCustomer');
Route::post('/api/editCustomer', 'Admin\AdminController@editCustomer');
Route::post('/api/deleteCustomer', 'Admin\AdminController@deleteCustomer');

Route::get('/api/appointments', 'Admin\AdminController@getAppointments');
Route::get('/api/customers', 'Admin\AdminController@getCustomers');
Route::post('/api/addAppointment', 'Admin\AdminController@addAppointment');
Route::post('/api/addCustomer', 'Admin\AdminController@addCustomer');
Route::post('/api/appointment', 'Admin\AdminController@getAppointmentDetails');

Route::post('/api/editAppointment', 'Admin\AdminController@editAppointment');
Route::get('/api/calendar/data', 'Admin\AdminController@getCalendarData');
Route::post('/api/deleteAppointment', 'Admin\AdminController@deleteAppointment');