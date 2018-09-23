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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::match(['get'], '/login/{role}', 'Auth\LoginController@showLoginForm');
Route::match(['post'], '/login/{role}', 'Auth\LoginController@login');

Horizon::auth(function () {
    return true;
});

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/dashboard/employee', 'HomeController@employeeIndex')->name('employee.home');
Route::get('/dashboard/vendor', 'HomeController@vendorIndex')->name('vendor.home');
Route::get('/dashboard/whitegloves', 'HomeController@whiteglovesIndex')->name('whitegloves.home');

Route::group(['prefix' => '/dashboard', 'middleware' => ['auth']], function () {
    Route::group([
        'prefix' => 'comments',
    ], function () {
        Route::get('/', 'CommentController@index')->name('comments.comment.index');
        Route::get('/create', 'CommentController@create')->name('comments.comment.create');
        Route::get('/show/{comment}', 'CommentController@show')->name('comments.comment.show')->where('id', '[0-9]+');
        Route::get('/{comment}/edit', 'CommentController@edit')->name('comments.comment.edit')->where('id', '[0-9]+');
        Route::post('/', 'CommentController@store')->name('comments.comment.store');
        Route::put('comment/{comment}', 'CommentController@update')->name('comments.comment.update')->where('id', '[0-9]+');
        Route::delete('/comment/{comment}', 'CommentController@destroy')->name('comments.comment.destroy')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'departments',
    ], function () {
        Route::get('/', 'DepartmentController@index')->name('departments.department.index');
        Route::get('/create', 'DepartmentController@create')->name('departments.department.create');
        Route::get('/show/{department}', 'DepartmentController@show')->name('departments.department.show')->where('id', '[0-9]+');
        Route::get('/{department}/edit', 'DepartmentController@edit')->name('departments.department.edit')->where('id', '[0-9]+');
        Route::post('/', 'DepartmentController@store')->name('departments.department.store');
        Route::put('department/{department}', 'DepartmentController@update')->name('departments.department.update')->where('id', '[0-9]+');
        Route::delete('/department/{department}', 'DepartmentController@destroy')->name('departments.department.destroy')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'notes',
    ], function () {
        Route::get('/', 'NoteController@index')->name('notes.note.index');
        Route::get('/create', 'NoteController@create')->name('notes.note.reate');
        Route::get('/show/{note}', 'NoteController@show')->name('notes.note.show')->where('id', '[0-9]+');
        Route::get('/{note}/edit', 'NoteController@edit')->name('notes.note.edit')->where('id', '[0-9]+');
        Route::post('/', 'NoteController@store')->name('notes.note.store');
        Route::put('note/{note}', 'NoteController@update')->name('notes.note.update')->where('id', '[0-9]+');
        Route::delete('/note/{note}', 'NoteController@destroy')->name('notes.note.destroy')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'notifications',
    ], function () {
        Route::get('/', 'NotificationController@index')->name('notifications.notification.index');
        Route::get('/create', 'NotificationController@create')->name('notifications.notification.create');
        Route::get('/show/{notification}', 'NotificationController@show')->name('notifications.notification.show')->where('id', '[0-9]+');
        Route::get('/{notification}/edit', 'NotificationController@edit')->name('notifications.notification.edit')->where('id', '[0-9]+');
        Route::post('/', 'NotificationController@store')->name('notifications.notification.store');
        Route::put('notification/{notification}', 'NotificationController@update')->name('notifications.notification.update')->where('id', '[0-9]+');
        Route::delete('/notification/{notification}', 'NotificationController@destroy')->name('notifications.notification.destroy')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'permissions',
    ], function () {
        Route::get('/', 'PermissionController@index')->name('permissions.permission.index');
        Route::get('/create', 'PermissionController@create')->name('permissions.permission.create');
        Route::get('/show/{permission}', 'PermissionController@show')->name('permissions.permission.show')->where('id', '[0-9]+');
        Route::get('/{permission}/edit', 'PermissionController@edit')->name('permissions.permission.edit')->where('id', '[0-9]+');
        Route::post('/', 'PermissionController@store')->name('permissions.permission.store');
        Route::put('permission/{permission}', 'PermissionController@update')->name('permissions.permission.update')->where('id', '[0-9]+');
        Route::delete('/permission/{permission}', 'PermissionController@destroy')->name('permissions.permission.destroy')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'roles',
    ], function () {
        Route::get('/', 'RoleController@index')->name('roles.role.index');
        Route::get('/create', 'RoleController@create')->name('roles.role.create');
        Route::get('/show/{role}', 'RoleController@show')->name('roles.role.show')->where('id', '[0-9]+');
        Route::get('/{role}/edit', 'RoleController@edit')->name('roles.role.edit')->where('id', '[0-9]+');
        Route::post('/', 'RoleController@store')->name('roles.role.store');
        Route::put('role/{role}', 'RoleController@update')->name('roles.role.update')->where('id', '[0-9]+');
        Route::delete('/role/{role}', 'RoleController@destroy')->name('roles.role.destroy')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'statuses',
    ], function () {
        Route::get('/', 'StatusController@index')->name('statuses.status.index');
        Route::get('/create', 'StatusController@create')->name('statuses.status.create');
        Route::get('/show/{status}', 'StatusController@show')->name('statuses.status.show')->where('id', '[0-9]+');
        Route::get('/{status}/edit', 'StatusController@edit')->name('statuses.status.edit')->where('id', '[0-9]+');
        Route::post('/', 'StatusController@store')->name('statuses.status.store');
        Route::put('status/{status}', 'StatusController@update')->name('statuses.status.update')->where('id', '[0-9]+');
        Route::delete('/status/{status}', 'StatusController@destroy')->name('statuses.status.destroy')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'subscriptions',
    ], function () {
        Route::get('/', 'SubscriptionController@index')->name('subscriptions.subscription.index');
        Route::get('/create', 'SubscriptionController@create')->name('subscriptions.subscription.create');
        Route::get('/show/{subscription}', 'SubscriptionController@show')->name('subscriptions.subscription.show')->where('id', '[0-9]+');
        Route::get('/{subscription}/edit', 'SubscriptionController@edit')->name('subscriptions.subscription.edit')->where('id', '[0-9]+');
        Route::post('/', 'SubscriptionController@store')->name('subscriptions.subscription.store');
        Route::put('subscription/{subscription}', 'SubscriptionController@update')->name('subscriptions.subscription.update')->where('id', '[0-9]+');
        Route::delete('/subscription/{subscription}', 'SubscriptionController@destroy')->name('subscriptions.subscription.destroy')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'tickets',
    ], function () {
        Route::get('/', 'TicketController@index')->name('tickets.ticket.index');
        Route::get('/create', 'TicketController@create')->name('tickets.ticket.create');
        Route::get('/show/{ticket}', 'TicketController@show')->name('tickets.ticket.show')->where('id', '[0-9]+');
        Route::get('/{ticket}/edit', 'TicketController@edit')->name('tickets.ticket.edit')->where('id', '[0-9]+');
        Route::post('/', 'TicketController@store')->name('tickets.ticket.store');
        Route::put('ticket/{ticket}', 'TicketController@update')->name('tickets.ticket.update')->where('id', '[0-9]+');
        Route::delete('/ticket/{ticket}', 'TicketController@destroy')->name('tickets.ticket.destroy')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'users',
    ], function () {
        Route::get('/', 'UserController@index')->name('users.user.index');
        Route::get('/create', 'UserController@create')->name('users.user.create');
        Route::get('/show/{user}', 'UserController@show')->name('users.user.show')->where('id', '[0-9]+');
        Route::get('/{user}/edit', 'UserController@edit')->name('users.user.edit')->where('id', '[0-9]+');
        Route::post('/', 'UserController@store')->name('users.user.store');
        Route::put('user/{user}', 'UserController@update')->name('users.user.update')->where('id', '[0-9]+');
        Route::delete('/user/{user}', 'UserController@destroy')->name('users.user.destroy')->where('id', '[0-9]+');
    });
});

Route::get('/about-us', 'StaticPageController@aboutus')->name('aboutus');
Route::get('/pricing', 'StaticPageController@pricing')->name('pricing');

/**
 * @note testing routes.  remove.
 */
if (app()->environment() === 'local' || app()->environment() === 'development') {
    Route::view('/inbox', 'inbox');
    Route::view('/cart', 'shopping-cart');
    Route::view('/support', 'support-ticket');
}
