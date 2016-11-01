<?php
namespace CMS\App\Libs;

use Illuminate\Validation\Validator;

class MyValidator extends Validator
{
    public function validateFoo($attr, $val, $params){
        return $val == 'foo' ? true : false;
    }

//    public function validateEmptyWith($attribute, $value, $parameters)
//    {
//        return ($value != '' && $this->getValue($parameters[0]) != '') ? false : true;
//    }
}