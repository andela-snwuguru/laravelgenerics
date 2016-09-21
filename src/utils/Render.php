<?php

namespace Sundayguru\Laravelgenerics\Utils;

/**
 * A Utility class to render Html elements
 */
class Render
{
    public $columns = [];
    public $records = [];

    public function __contruct($records, $columns=[]){
        $this->records = $records;
        $this->columns = empty($columns) ? $this->getColumnsFromModel($records) : $columns;
    }

    public static function table($records, $columns=[], $attributes=[]){
        $columns = empty($columns) ? self::getColumnsFromModel($records) : $columns;
        return view('laravelgenerics::table', ['records'=>$records, 'columns'=>$columns, 'attributes'=>$attributes]);
    }

    public static function tableHeader(){
        $thead = '<thead>';
        $thead .= self::tableHeaderRow();
        $thead .= '</thead>';
        return $thead;
    }

    public static function tableHeaderRow(){
        $tr = '<tr>';
        $tr .= '<th>Test</th>';
        $tr .= '</tr>';
        return $tr;
    }

    public static function getColumnsFromModel($records){
        if (!$records->first()) {
            return [];
        }
        return array_keys($records->first()->toArray());
    }
    
    public static function getTHTitle($value){
        return str_ireplace('_',' ', $value);
    }

    
}
