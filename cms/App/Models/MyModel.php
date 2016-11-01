<?php
namespace CMS\App\Models;

use CMS\App\Models\Traits\ModelTrait;
use CMS\App\Models\Traits\ValidatingTrait;
use DB;
use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    use ModelTrait, ValidatingTrait;

    public function field(){

    }
    
    public function getDbName(){
        return $this->getConnection()->getDatabaseName();
    }

    public function getDbComments(){
        $driver = $this->getConnection()->getDriverName();
        $colName = 'field'; $colComment = 'comment';
        switch ($driver) {
            case 'mysql':
                // SHOW FULL COLUMNS FROM {$this->getTable()}
                $query = DB::select("SELECT COLUMN_NAME {$colName}, COLUMN_COMMENT {$colComment} FROM INFORMATION_SCHEMA. COLUMNS WHERE TABLE_SCHEMA = '{$this->getDbName()}' AND TABLE_NAME = '{$this->getTable()}'");
                break;
            case 'pgsql':
                $query = DB::select("SELECT cols.column_name {$colName}, ( SELECT pg_catalog.col_description ( oid, cols.ordinal_position::INT ) FROM pg_catalog.pg_class c WHERE c.relname = cols.table_name ) AS {$colComment} FROM information_schema.columns cols WHERE cols.table_schema = 'public' AND cols.table_name = '{$this->getTable()}'");
                break;
            default:

        }

        return collect($query)
            ->pluck($colComment, $colName)
            ->map(function ($item, $k){
                return !empty($item) ? $item : title_case(str_replace('-', ' ', str_slug($k)));
            })
            ->all();
    }
}