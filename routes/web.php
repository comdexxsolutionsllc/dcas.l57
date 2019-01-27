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

use App\General\DCASHelper;

Route::view('/', 'welcome');

Auth::routes(['verify' => true, 'reset' => false]);

Route::match(['get'], '/login/{role}', 'Auth\LoginController@showLoginForm');
Route::match(['post'], '/login/{role}', 'Auth\LoginController@login');

Route::get('/about-us', 'StaticPageController@aboutus')->name('aboutus');
Route::get('/pricing', 'StaticPageController@pricing')->name('pricing');

Route::group(['prefix' => '/dashboard', 'middleware' => ['auth']], function () {
    Route::resource('/assets', 'AssetController')->names(DCASHelper::makeNamedRoutes('asset'));
    Route::resource('/billing/info', 'BillingInfoController')->names(DCASHelper::makeNamedRoutes('billing_info'));
    Route::resource('/comments', 'CommentController')->names(DCASHelper::makeNamedRoutes('comment')); // ?
    Route::resource('/companies', 'CompanyController')->names(DCASHelper::makeNamedRoutes('company'));
    Route::resource('/customers', 'CustomerController')->names(DCASHelper::makeNamedRoutes('customer'));
    Route::resource('/datacenters', 'DatacenterController')->names(DCASHelper::makeNamedRoutes('datacenter'));
    Route::resource('/departments', 'DepartmentController')->names(DCASHelper::makeNamedRoutes('department'));
    Route::resource('/domains', 'DomainController')->names(DCASHelper::makeNamedRoutes('domain'));
    Route::resource('/employees', 'EmployeeController')->names(DCASHelper::makeNamedRoutes('employee'));
    Route::resource('/invoices', 'InvoiceController')->names(DCASHelper::makeNamedRoutes('invoice'));
    Route::resource('/invoices/items', 'InvoiceItemController')->names(DCASHelper::makeNamedRoutes('invoice_item'));

    Route::group(['prefix' => 'nameservers'], function () {
        Route::resource('/comments', 'NameserverCommentController')->names(DCASHelper::makeNamedRoutes('nameserver_comment'));
        Route::resource('/cryptokeys', 'NameserverCryptokeyController')->names(DCASHelper::makeNamedRoutes('nameserver_cryptokey'));
        Route::resource('/supermasters', 'NameserverSupermasterController')->names(DCASHelper::makeNamedRoutes('nameserver_supermaster'));
        Route::resource('/tsigkeys', 'NameserverTsigkeyController')->names(DCASHelper::makeNamedRoutes('nameserver_tsigkey'));
        Route::resource('/domain_metadata', 'NameserverDomainmetadataController')->names(DCASHelper::makeNamedRoutes('nameserver_domainmetadata'));
        Route::resource('/domains', 'NameserverDomainController')->names(DCASHelper::makeNamedRoutes('nameserver_domain'));
        Route::resource('/records', 'NameserverRecordController')->names(DCASHelper::makeNamedRoutes('nameserver_record'));
    });

    Route::group(['prefix' => 'network'], function () {
        Route::resource('/configurations', 'NetworkConfigurationController')->names(DCASHelper::makeNamedRoutes('nameserver_configuration'));
        Route::resource('/devices-types', 'NetworkDeviceTypeController')->names(DCASHelper::makeNamedRoutes('network_device_type'));
        Route::resource('/devices', 'NetworkDeviceController')->names(DCASHelper::makeNamedRoutes('network_device'));
    });

    Route::resource('/notes', 'NoteController')->names(DCASHelper::makeNamedRoutes('note')); // ??
    Route::resource('/notifications', 'NotificationController')->names(DCASHelper::makeNamedRoutes('notification'));
    Route::resource('/operating-systems', 'OperatingSystemController')->names(DCASHelper::makeNamedRoutes('operating_system'));
    Route::resource('/permissions', 'PermissionController')->names(DCASHelper::makeNamedRoutes('permission'));
    Route::resource('/products', 'ProductController')->names(DCASHelper::makeNamedRoutes('product'));
    Route::resource('/queues', 'QueueController')->names(DCASHelper::makeNamedRoutes('queue'));
    Route::resource('/records', 'RecordController')->names(DCASHelper::makeNamedRoutes('record'));
    Route::resource('/registrars', 'RegistrarController')->names(DCASHelper::makeNamedRoutes('registrar'));
    Route::resource('/resellers', 'ResellerController')->names(DCASHelper::makeNamedRoutes('reseller'));
    Route::resource('/roles', 'RoleController')->names(DCASHelper::makeNamedRoutes('role'));
    Route::resource('/salesreps', 'SalesRepController')->names(DCASHelper::makeNamedRoutes('sales_rep'));
    Route::resource('/services', 'ServiceController')->names(DCASHelper::makeNamedRoutes('service'));
    Route::resource('/statuses', 'StatusController')->names(DCASHelper::makeNamedRoutes('status'));
    Route::resource('/submenus', 'SubMenuController')->names(DCASHelper::makeNamedRoutes('sub_menu'));
    Route::resource('/subscriptions', 'SubscriptionController')->names(DCASHelper::makeNamedRoutes('subscription'));
    Route::resource('/switchport/information', 'SwitchportInformationController')->names(DCASHelper::makeNamedRoutes('switchport_information'));
    Route::resource('/technicians', 'TechnicianController')->names(DCASHelper::makeNamedRoutes('switchport_information'));
    Route::resource('/tickets', 'TicketController')->names(DCASHelper::makeNamedRoutes('ticket'));
    Route::resource('/tld-extensions', 'TldExtensionController')->names(DCASHelper::makeNamedRoutes('tld_extension'));
    Route::resource('/users', 'UserController')->names(DCASHelper::makeNamedRoutes('user'));;
    Route::resource('/vendors', 'VendorController')->names(DCASHelper::makeNamedRoutes('vendor'));
    Route::resource('/whitegloves', 'WhiteGloveController')->names(DCASHelper::makeNamedRoutes('whiteglove'));
});
