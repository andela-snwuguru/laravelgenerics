@extends(isset($ctrl->baseTemplate) ? $ctrl->baseTemplate : 'laravelgenerics::layout')
@section('title', isset($ctrl->updatePageTitle)  ? $ctrl->updatePageTitle : 'Update New Record')

@section(isset($ctrl->contentSectionName) ? $ctrl->contentSectionName : 'content')
<div class="{{ isset($ctrl->pageDivClass) ? $ctrl->pageDivClass : 'col-md-7 col-md-offset-3' }}">
  <fieldset>
  <legend class="row">
    <h3>{{ isset($ctrl->updatePageTitle)  ? $ctrl->updatePageTitle : 'Update New Record' }}</h3>
  </legend>
  <div class="row">
    {!! Form::model($record, array_merge(array('route' =>[ $ctrl->routeBase.'.update', $record->id], 'method'=>'PUT'), isset($ctrl->formAttributes) ? $ctrl->formAttributes : [] )) !!}
        <div class="row">
            @include(isset($ctrl->formTemplate)  ? $ctrl->formTemplate : 'laravelgenerics::form')
        </div>
        <div class="row">
        <br/>
        <div class="{{ isset($ctrl->updateSubmitButtonDivClass)  ? $ctrl->updateSubmitButtonDivClass : 'col-md-12 well' }}">
            {{ Form::submit(
                isset($ctrl->updateSubmitButtonLabel)  ? $ctrl->updateSubmitButtonLabel : 'Update', 
                array('class'=>isset($ctrl->updateSubmitButtonClass)  ? $ctrl->updateSubmitButtonClass : 'btn btn-primary pull-right')) }}
        </div>
        </div>
    {!! Form::close() !!}
   </div>
  </fieldset>
</div>
@endsection


@section(isset($ctrl->styleSectionName) ? $ctrl->styleSectionName : 'styles')
   @if(isset($ctrl->updateStyleTemplate))
    @include($ctrl->updateStyleTemplate)
   @endif
@endsection

@section(isset($ctrl->scriptSectionName) ? $ctrl->scriptSectionName : 'scripts')
   @if(isset($ctrl->updateScriptTemplate))
    @include($ctrl->updateScriptTemplate)
   @endif
@endsection
