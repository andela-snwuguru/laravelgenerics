<?php

namespace Sundayguru\Laravelgenerics\Traits;

use Illuminate\Http\Request;

/**
 * Generic destroy view
 */
trait DestroyView
{
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id){
        if(!isset($this->model)){
            abort(400, 'Controller require model attribute');
        }
        if(!isset($this->routeBase)){
            abort(400, 'Controller require routeBase attribute');
        }

        $model = $this->model;
        $record = $model::find($id);
        
        $model::deleting(function($row) {
             if(isset($this->deleteCascade, $this->manyRelation) && $this->deleteCascade){
                foreach($this->manyRelation as $relation){
                    $row->$relation()->delete();
                }
            }
        });
        $record->delete();
        if(isset($this->messages) && isset($this->messages['destroy'])){
            $request->session()->flash('success', $this->messages['destroy']);
        }else{
            $request->session()->flash('success', 'Record deleted!');
        }

        $redirect_route = isset($this->destroySuccessRoute) ? $this->destroySuccessRoute : $this->routeBase.'.index';
        return redirect()->route($redirect_route);
    }

}
