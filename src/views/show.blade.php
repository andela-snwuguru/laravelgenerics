@extends(isset($ctrl->baseTemplate) ? $ctrl->baseTemplate : 'laravelgenerics::layout')

@section('title')
    @if(isset($ctrl->detailPageColumn))
        {{ $record->{$ctrl->detailPageColumn} }}
    @else
        {{ isset($ctrl->detailPageTitle)  ? $ctrl->detailPageTitle : 'Record Details' }}
    @endif
@endsection

@section(isset($ctrl->contentSectionName) ? $ctrl->contentSectionName : 'content')
<div class="{{ isset($ctrl->pageDivClass) ? $ctrl->pageDivClass : 'col-md-7 col-md-offset-3' }}">
  <fieldset>
  <legend class="row">
  <div class="{{ isset($ctrl->detailPageTitleDivClass)  ? $ctrl->detailPageTitleDivClass : 'col-md-10' }}">
    <h3>
        @if(isset($ctrl->detailPageColumn))
            {{ $record->{$ctrl->detailPageColumn} }}
        @else
            {{ isset($ctrl->detailPageTitle)  ? $ctrl->detailPageTitle : 'Record Details' }}
        @endif
    </h3>
  </div>
  <div class="{{ isset($ctrl->detailButtonDivClass)  ? $ctrl->detailButtonDivClass : 'col-md-2' }}">
    @if(method_exists($ctrl, 'can') && $ctrl->can('delete') || !isset($ctrl->hideDeleteButton))
        <a  onClick="removeItem({{$record->id}})"
            href="#" 
            class="{{ isset($ctrl->deleteButtonClass) ? $ctrl->deleteButtonClass : 'btn btn-danger pull-right'}}"
        ><i class="{{ isset($ctrl->deleteButtonIconClass) ? $ctrl->deleteButtonIconClass : 'glyphicon glyphicon-trash'}}"></i> 
            {{ isset($ctrl->deleteButtonLabel) ? $ctrl->deleteButtonLabel : 'Delete'}}
             {!! Form::open(array('route' => [$ctrl->routeBase.'.destroy', $record->id], 'method'=>'DELETE', 'id'=>'f_'.$record->id)) !!}
            {!! Form::close() !!}
        </a>
       
    @endif
    @if(method_exists($ctrl, 'can') && $ctrl->can('edit') || !isset($ctrl->hideEditButton))
        <a 
            href="{{ $record->id.'/edit' }}" 
            class="{{ isset($ctrl->editButtonsClass) ? $ctrl->editButtonsClass : 'btn btn-primary pull-right'}}"
        ><i class="{{ isset($ctrl->editButtonIconClass) ? $ctrl->editButtonIconClass : 'glyphicon glyphicon-edit'}}"></i> 
        {{ isset($ctrl->editButtonLabel) ? $ctrl->editButtonLabel : 'Edit' }}
        </a>    
    @endif
    
  </div>
  </legend>
   @include('laravelgenerics::detail')
  </fieldset>
</div>

    <script>
        function removeItem(id){
            if(confirm('Are you sure you want to delete this item?')){
                var elId = 'f_' + id;
                var el = document.getElementById(elId);
                el.submit();
            }
        }
    </script>
@endsection