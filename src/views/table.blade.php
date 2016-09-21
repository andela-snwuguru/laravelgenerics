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
                {{ str_ireplace('_',' ', !is_array($value) ? ucwords($value) : ucwords($value[0]))  }}
            </th>
        @endforeach
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
                            {!! $row->{ is_numeric($key) ? $value : $key } !!}
                        </td>
                    @endforeach

                </tr>

            @endforeach
        @endif
	</tbody>
</table>

@if(is_object($records) && class_basename(get_class($records)) == 'LengthAwarePaginator')
    {!! $records->render() !!}
@endif
