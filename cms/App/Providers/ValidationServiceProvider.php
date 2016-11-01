<?php
namespace CMS\App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use CMS\App\Libs\MyValidator;


class ValidationServiceProvider extends ServiceProvider {

    public function register(){

    }

    public function boot()
    {
        //$this->app->validator->
        Validator::resolver(function($translator, $data, $rules, $messages){
            return new MyValidator($translator, $data, $rules, $messages);
        });
    }
}