<?php

namespace Sundayguru\Laravelgenerics\Traits;

use Sundayguru\Laravelgenerics\Utils\Render;
use App\Post;
/**
 * 
 */
trait IndexView
{
    public function index(){
        if(!isset($this->model)){
            abort(400, 'Controller require model attribute');
        }
        if(!isset($this->routeBase)){
            abort(400, 'Controller require routeBase attribute');
        }
        $model = $this->model;
        if(isset($this->orderBy)){
            $records = $model::orderBy(
                $this->orderBy, 
                isset($this->orderDir) ? $this->orderDir : 'desc'
                )->paginate(isset($this->pageSize) ? $this->pageSize : 10);
        }else{
            $records = $model::paginate(isset($this->pageSize) ? $this->pageSize : 10);
        }
        
        return view('laravelgenerics::index', [
                'records'=>$records,
                'ctrl'=>$this,
                'columns'=>isset($this->columns) ? $this->columns : [],
                'attributes'=>isset($this->tableAttributes) ? $this->tableAttributes : []
            ]);
    }

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
