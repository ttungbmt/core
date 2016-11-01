<?php
namespace CMS\App\Models\Traits;

use CMS\App\Libs\MyCollection;

trait ModelTrait
{
    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }
}