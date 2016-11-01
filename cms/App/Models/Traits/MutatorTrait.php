<?php
namespace CMS\App\Models\Traits;


trait MutatorTrait
{
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = is_string($date) && checkDateStr($date, 'd/m/Y') ? parseDateStr($date) : $date;
    }
}