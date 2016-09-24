@if(count($columns))
    <dl class="{{ isset($ctrl->detailDlClass) ? $ctrl->detailDlClass : 'dl-horizontal' }}">
        @foreach($columns as $key=>$value)
            <dt>{{ $ctrl->getTableHeaderLabel($key, $value) }}:</dt>
            <dd>{!! is_array($value) ? $ctrl->$value[0]($record) : $record->{ is_numeric($key) ? $value : $key } !!}</dd>
        @endforeach
    </dl>
@endif