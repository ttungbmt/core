<?php

Route::get('users/export-to/{type?}', 'UserController@exportTo');

Route::resources([
    'users' => 'UserController',
    'roles' => 'RoleController',
]);

