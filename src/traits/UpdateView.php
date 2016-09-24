<?php

namespace Sundayguru\Laravelgenerics\Traits;

use Illuminate\Http\Request;

/**
 * Generic update view
 */
trait UpdateView
{
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        if(!isset($this->model)){
            abort(400, 'Controller require model attribute');
        }
        if(!isset($this->routeBase)){
            abort(400, 'Controller require routeBase attribute');
        }
        $model = $this->model;
        $record = $model::find($id);

        if(isset($this->validationRules)){
            if(method_exists($this, 'modifyValidationRule')){
               $this->modifyValidationRule($record, $request);
            }
            $this->validate($request, $this->validationRules);
        }
        
        $params = $request->request;
        foreach($params as $key=>$value){
            if($key == '_token' || $key == '_method' || is_array($value)){
                continue;
            }
            $record->$key = $request->$key;
        }
        $record->save();
        if(isset($this->manyRelation)){
            foreach($this->manyRelation as $relation){
                $record->$relation()->sync($request->$relation, false);
            }
        }

        if(isset($this->messages) && isset($this->messages['update'])){
            $request->session()->flash('success', $this->messages['update']);
        }else{
            $request->session()->flash('success', 'Record updated!');
        }
        $redirect_route = isset($this->updateSuccessRoute) ? $this->updateSuccessRoute : $this->routeBase.'.show';
        return redirect()->route($redirect_route, $record->id);
        
    }

}
