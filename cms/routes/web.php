<?php
use CMS\App\Models\Menu;
use CMS\App\Models\Page;
use Illuminate\Support\Collection;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;
use Lara\Auth\App\Models\User;




Route::get('/', function(){
});
//Route::get('home', 'HomeController@index');
Route::get('service', 'HomeController@index');
Route::get('contact-us', 'HomeController@index');
Route::get('about-us', 'HomeController@index');




Route::get('hello', function () {

//    with(new \CMS\CollectionMacro)->registerMarco();
////    dd(get_class_methods($class));
//
//    dd(collect([
//        ['Jane', 'Bob', 'Mary'],
//        ['jane@example.com', 'bob@example.com', 'mary@example.com'],
//        ['Doctor', 'Plumber', 'Dentist'],
//    ])->transpose());
////    $methodVariable = [$anObject, 'hover'];
////    dd(is_callable($methodVariable));
//
////    $callable = [];
////
////    dd(collect([])->hover(2));
////    $class = new \CMS\CollectionMacro();
////    $class = new ReflectionClass($class);
////    $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
////    dd($methods);
//
//
////    dd($class);
////    $user = DB::table('users')->first();
////    dd($user);
//    return view('home');
});

Route::get('contact', function () {
    return view('contact');
});