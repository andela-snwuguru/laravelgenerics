<?php

namespace Sundayguru\Laravelgenerics\Actions;

use Sundayguru\Laravelgenerics\Utils\Render;
use App\Post;
/**
 * 
 */
trait IndexView
{
    public function index(){
        if(!isset($this->model)){
            dd('Controller require model attribute');
        }
        $model = $this->model;
        $records = $model::orderBy('id', 'desc')->paginate(8);
        return view('laravelgenerics::index', ['records'=>$records, 'ctrl'=>$this,  'render'=>Render::class]);
    }
}
