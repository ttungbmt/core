<?php
use CMS\App\Libs\MyCollection;
use Illuminate\Support\Debug\Dumper;
use Illuminate\Support\HtmlString;

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


