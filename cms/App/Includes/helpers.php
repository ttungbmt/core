<?php

use CMS\App\Libs\MyCollection;
use Illuminate\Support\Debug\Dumper;


if (! function_exists('checkDateStr')) {
    function checkDateStr($date, $format, $strict = false)
    {
        // date_create_from_format("d-m-Y","2013-03-15") // trả về false nếu sai
        $dateAttr = date_parse_from_format($format, $date);
        if($strict){ return $dateAttr['error_count'] > 0 ? false : true; };

        return checkdate($dateAttr['month'], $dateAttr['day'], $dateAttr['year']);

//        $check = \Validator::make([
//            'date_at' => $date
//        ], [
//            'date_at' => 'date_format:'.$format
//        ])->passes();
    }
}

if (! function_exists('parseDateStr')) {
    function parseDateStr($date, $format = 'd/m/Y', $strict = false)
    {
        if(!checkDateStr($date, $format)){ return false; }

        $dateAttr = date_parse_from_format($format, $date);
        // date_create('25-12-2016')
        return \Carbon\Carbon::createFromDate($dateAttr['year'], $dateAttr['month'], $dateAttr['day']);
    }
}

if (! function_exists('d')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function d()
    {
        array_map(function ($x) {
            (new Dumper)->dump($x);
        }, func_get_args());
    }
}


if (! function_exists('col')) {
    /**
     * Create a collection from the given value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Support\Collection
     */
    function col($value = null)
    {
        return new MyCollection($value);
    }

}

if (! function_exists('flatToTree')) {
    function flatToTree(array $flat, $idField = 'id',
                        $parentIdField = 'parent_id',
                        $childNodesField = 'children')
    {
        $indexed = [];
        // first pass - get the array indexed by the primary id
        foreach ($flat as $row) {
            $indexed[$row[$idField]] = $row;
            $indexed[$row[$idField]][$childNodesField] = [];
        }

        //second pass
        $root = null;
        foreach ($indexed as $id => $row) {
            $indexed[$row[$parentIdField]][$childNodesField][$id] =& $indexed[$id];
            if (!$row[$parentIdField]) {
                $root = $id;
            }
        }

        return [$root => $indexed[$root]];
    }
}


