<?php

namespace Sundayguru\Laravelgenerics\Traits;

/**
 * 
 */
trait Util
{
    /**
    * Returns formated label for table header
    * @param string $key 
    * @param string $value 
    * @return string
    */
    public function getTableHeaderLabel($key, $value){
        if(is_array($value)){
            return str_ireplace('_',' ', isset($value[1]) ? ucwords($value[1]) : ucwords($value[0]));
        }
        return str_ireplace('_',' ', ucwords($value));
    }

}
