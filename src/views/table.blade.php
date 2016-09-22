<table class="{{ isset($attributes['table']['class']) ?  $attributes['table']['class'] : 'table'}}">
 @if(count($columns))
	<thead class="{{ isset($attributes['table']['thead']['class']) ? $attributes['table']['thead']['class'] : '' }}">
		<tr>
         @if(isset($ctrl->rowCount))
             <th class="{!! isset($attributes['table']['thead']['th']['class']) ? $attributes['table']['thead']['th']['class'] : '' !!}">
                {{ isset($ctrl->rowCountLabel) ? $ctrl->rowCountLabel : '#' }}
            </th>
        @endif
        @foreach($columns as $key=>$value)
            <th class="{!! isset($attributes['table']['thead']['th']['class']) ? $attributes['table']['thead']['th']['class'] : '' !!}">
                {{ $ctrl->getTableHeaderLabel($key, $value)  }}
            </th>
        @endforeach
         @if(isset($ctrl->actionButtons))
            <th class="{!! isset($attributes['table']['thead']['th']['class']) ? $attributes['table']['thead']['th']['class'] : '' !!}">
                
            </th>
         @endif
		</tr>
	</thead>
    @endif

    <tbody class="{{ isset($attributes['table']['tbody']['class']) ?  $attributes['table']['tbody']['class'] : ''}}">
        @if(count($records))
            @foreach($records as $row)

                <tr>
                    @if(isset($ctrl->rowCount))
                        <td class="{!! isset($attributes['table']['tbody']['td']['class']) ? $attributes['table']['tbody']['td']['class'] : '' !!}">
                            {!! isset($counter) ? $counter += 1 : $counter = 1 !!}
                        </td>
                    @endif
                    @foreach($columns as $key=>$value)
                        <td class="{!! isset($attributes['table']['tbody']['td']['class']) ? $attributes['table']['tbody']['td']['class'] : '' !!}">
                            {!! is_array($value) ? $ctrl->formatDisplay($row, $value[0]) : $row->{ is_numeric($key) ? $value : $key } !!}
                        </td>
                    @endforeach
                    @if(isset($ctrl->actionButtons))
                        <td class="{!! isset($attributes['table']['tbody']['td']['class']) ? $attributes['table']['tbody']['td']['class'] : '' !!}">
                            @if(method_exists($ctrl, 'can') && $ctrl->can('view') || !isset($ctrl->hideViewButton))
                                <a 
                                    href="{{ $ctrl->routeBase.'/'.$row->id }}" 
                                    class="{{ isset($ctrl->actionButtonsClass) ? $ctrl->actionButtonsClass : ''}}"
                                ><i class="{{ isset($ctrl->viewButtonIconClass) ? $ctrl->viewButtonIconClass : 'glyphicon glyphicon-eye-open'}}"></i></a>
                            @endif
                            @if(method_exists($ctrl, 'can') && $ctrl->can('edit') || !isset($ctrl->hideEditButton))
                                <a 
                                    href="{{ $ctrl->routeBase.'/'.$row->id.'/edit' }}" 
                                    class="{{ isset($ctrl->actionButtonsClass) ? $ctrl->actionButtonsClass : ''}}"
                                ><i class="{{ isset($ctrl->editButtonIconClass) ? $ctrl->editButtonIconClass : 'glyphicon glyphicon-edit'}}"></i></a>
                            @endif
                            @if(method_exists($ctrl, 'can') && $ctrl->can('delete') || !isset($ctrl->hideDeleteButton))
                                <a  onClick="removeItem({{$row->id}})"
                                    href="#" 
                                    class="{{ isset($ctrl->actionButtonsClass) ? $ctrl->actionButtonsClass : ''}}"
                                ><i class="{{ isset($ctrl->deleteButtonIconClass) ? $ctrl->deleteButtonIconClass : 'glyphicon glyphicon-trash'}}"></i></a>
                                {!! Form::open(array('route' => [$ctrl->routeBase.'.destroy', $row->id], 'method'=>'DELETE', 'id'=>'f_'.$row->id)) !!}
                                {!! Form::close() !!}
                            @endif
                        </td>
                    @endif

                </tr>

            @endforeach
        @endif
	</tbody>
</table>

@if(is_object($records) && class_basename(get_class($records)) == 'LengthAwarePaginator')
    {!! $records->render() !!}
@endif

<script>
    function removeItem(id){
        if(confirm('Are you sure you want to delete this item?')){
            var elId = 'f_' + id;
            var el = document.getElementById(elId);
            el.submit();
        }
    }
</script>