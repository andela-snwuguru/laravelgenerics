<?php

namespace Sundayguru\Laravelgenerics\Traits;

/**
 * Generic editing view
 */
trait EditView
{
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        if(!isset($this->form)){
            abort(400, 'Controller require form attribute to implement generic create view');
        }

        if(!isset($this->routeBase)){
            abort(400, 'Controller require routeBase attribute');
        }
        $model = $this->model;
        $record = $model::find($id);
        $formData = [];
        foreach($this->form as $key=>$item){
            if(isset($item['data'])){
                $item['data'] = eval('return '.$item['data'].';');
            }
            $formData[$key] = $item;
        }

        return view(
            isset($this->updateTemplate) ? $this->updateTemplate : 'laravelgenerics::update', 
            ['formData'=>$formData, 'ctrl'=>$this, 'record'=>$record]
        ); 
    }
    

}
