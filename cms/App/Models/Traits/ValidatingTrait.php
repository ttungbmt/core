<?php
namespace CMS\App\Models\Traits;
use DB;
use Validator;

trait ValidatingTrait
{
    /**
     * Error message bag
     *
     */
    protected $errors;

    /**
     * Custom messages
     *
     * @var Array
     */
    protected $messages = [];

    public function rules(){
        return [];
    }

    /**
     * Get the validation error messages from the model.
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function getErrors()
    {
        return collect($this->errors)->all();
    }

    /**
     * Set error message bag
     *
     * @param $errors
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Inverse of wasSaved
     */
    public function hasErrors()
    {
        return ! empty($this->errors);
    }

    /**
     * Inverse of wasSaved
     *
     * @param $name
     *
     * @return
     */
    public function hasError($name)
    {
        return $this->errors->has($name);
    }

    /**
     * Validates current attributes against rules
     */
    public function validate()
    {
        $v = Validator::make($this->attributes, $this->rules(), $this->messages, $this->attrLabels());
        if ($v->passes()) {
            return true;
        }

        $this->setErrors($v->messages());
        return false;
    }

    public function attrLabels(){
        return $this->getDbComments();
    }

    public function getAttrLabel($name){
        return array_get($this->attrLabels(), $name);
    }
}