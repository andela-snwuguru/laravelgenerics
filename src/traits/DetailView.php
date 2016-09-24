<?php

namespace Sundayguru\Laravelgenerics\Traits;

/**
 * Generic detail view
 */
trait DetailView
{
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id){
        if(!isset($this->model)){
            abort(400, 'Controller require model attribute');
        }
        if(!isset($this->routeBase)){
            abort(400, 'Controller require routeBase attribute');
        }
        $model = $this->model;
        $record = $model::find($id);
        return view('laravelgenerics::show', [
                'record'=>$record,
                'ctrl'=>$this,
                'columns'=>isset($this->detailColumns) ? $this->detailColumns : [],
            ]);
    }

}
