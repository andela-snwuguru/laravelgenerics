<?php

namespace Sundayguru\Laravelgenerics\Traits;

use Illuminate\Http\Request;

/**
 * Generic store view
 */
trait StoreView
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!isset($this->model)){
            abort(400, 'Controller require model attribute');
        }
        if(!isset($this->routeBase)){
            abort(400, 'Controller require routeBase attribute');
        }

        if(isset($this->validationRules)){
            $this->validate($request, $this->validationRules);
        }
        $model = $this->model;
        $record = new $model();
        $params = $request->request;
        foreach($params as $key=>$value){
            if($key == '_token' || is_array($value)){
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

        if(isset($this->messages) && isset($this->messages['store'])){
            $request->session()->flash('success', $this->messages['store']);
        }else{
            $request->session()->flash('success', 'Record created!');
        }
        $redirect_route = isset($this->storeSuccessRoute) ? $this->storeSuccessRoute : $this->routeBase.'.show';
        return redirect()->route($redirect_route, $record->id);
        
    }

}
