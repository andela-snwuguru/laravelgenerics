<?php

namespace Sundayguru\Laravelgenerics\Traits;

/**
 * Generic listing view
 */
trait IndexView
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        
        return view(isset($this->indexTemplate) ? $this->indexTemplate : 'laravelgenerics::index', [
                'records'=>$records,
                'ctrl'=>$this,
                'columns'=>isset($this->indexColumns) ? $this->indexColumns : [],
                'attributes'=>isset($this->tableAttributes) ? $this->tableAttributes : []
            ]);
    }

}
