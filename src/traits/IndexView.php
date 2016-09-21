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
        $model = $this->model;
        $records = $model::orderBy('id', 'desc')->paginate(isset($this->pageSize) ? $this->pageSize : 10);
        return view('laravelgenerics::index', [
                'records'=>$records, 
                'ctrl'=>$this,  
                'columns'=>isset($this->columns) ? $this->columns : [],
                'attributes'=>isset($this->tableAttributes) ? $this->tableAttributes : []
            ]);
    }
}
