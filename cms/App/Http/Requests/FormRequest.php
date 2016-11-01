<?php
namespace CMS\App\Http\Requests;


class FormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            if($this->input('_redirect', false)){
                return redirect($this->input('_redirect'))
                    ->withInput($this->except($this->dontFlash))
                    ->withErrors($errors, $this->errorBag);
            }
        }

        return parent::response($errors);
    }
}