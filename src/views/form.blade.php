@foreach($formData as $key=>$value)
    <div class="{{ isset($ctrl->inputDivClass) ? $ctrl->inputDivClass : 'col-md-12' }}">
        {{ Form::label($key, isset($value['label']) ? $value['label'] : str_ireplace('_', ' ', ucwords($key))) }}
        @if(isset($value['type']))
            @if($value['type'] == 'select')
                {{ Form::select($key, $value['data'], null, $value['attributes']) }}
            @else
                {{ Form::$value['type']($key, null, $value['attributes']) }}
            @endif
        @endif
    </div>
@endforeach