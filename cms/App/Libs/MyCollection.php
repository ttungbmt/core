<?php
namespace CMS\App\Libs;


use Illuminate\Database\Eloquent\Collection;

class MyCollection extends Collection
{
    public function toTable(array $options = [])
    {

    }

    public function flatToTree($idField = 'id',
                               $parentIdField = 'parent_id',
                               $childNodesField = 'children')
    {
        $flat = $this->items;
        $indexed = [];
        // first pass - get the array indexed by the primary id
        foreach ($flat as $row) {
            $row = $row->toArray();
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