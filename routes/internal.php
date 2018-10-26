<?php

Horizon::auth(function () {
    return true;
});

\Aschmelyun\Larametrics\Larametrics::routes();

Route::get('/', 'HomeController@employeeIndex')->name('home.employee');

Route::patch('/about-us/{employee}', 'StaticPageController@updateAboutUs')->name('aboutus.update');

Route::get('/about-us/{employee}/edit', 'StaticPageController@showAboutUsForm')->name('aboutus.edit');
