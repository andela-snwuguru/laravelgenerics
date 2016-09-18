<?php

namespace Sundayguru\Laravelgenerics\Utils;

/**
 * A Utility class to render Html elements
 */
class Render
{
    public static function table(){
        $table = '<table class="table">';
        $table .= self::tableHeader();
        $table .= '</table>';
        return $table;
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

    
}
