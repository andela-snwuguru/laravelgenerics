<?php

namespace Sundayguru\Laravelgenerics\Traits;

/**
 * Generic listing view
 */
trait CreateView
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!isset($this->form)){
            abort(400, 'Controller require form attribute to implement generic create view');
        }

        if(!isset($this->routeBase)){
            abort(400, 'Controller require routeBase attribute');
        }
        $formData = [];
        foreach($this->form as $key=>$item){
            if(isset($item['data'])){
                $item['data'] = eval('return '.$item['data'].';');
            }
            $formData[$key] = $item;
        }

        return view(
            isset($this->createTemplate) ? $this->createTemplate : 'laravelgenerics::create', 
            ['formData'=>$formData, 'ctrl'=>$this]
        ); 
    }
    

}
