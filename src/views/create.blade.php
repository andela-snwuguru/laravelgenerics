@extends(isset($ctrl->baseTemplate) ? $ctrl->baseTemplate : 'laravelgenerics::layout')
@section('title', isset($ctrl->createPageTitle)  ? $ctrl->createPageTitle : 'Create New Record')

@section(isset($ctrl->contentSectionName) ? $ctrl->contentSectionName : 'content')
<div class="{{ isset($ctrl->pageDivClass) ? $ctrl->pageDivClass : 'col-md-7 col-md-offset-3' }}">
  <fieldset>
  <legend class="row">
    <h3>{{ isset($ctrl->createPageTitle)  ? $ctrl->createPageTitle : 'Create New Record' }}</h3>
  </legend>
  <div class="row">
    {!! Form::open(array('url' => $ctrl->routeBase, 'data-parsley-validate')) !!}
        <div class="row">
            @include(isset($ctrl->formTemplate)  ? $ctrl->formTemplate : 'laravelgenerics::form')
        </div>
        <div class="row">
        <br/>
        <div class="{{ isset($ctrl->createSubmitButtonDivClass)  ? $ctrl->createSubmitButtonDivClass : 'col-md-12 well' }}">
            {{ Form::submit(
                isset($ctrl->createSubmitButtonLabel)  ? $ctrl->createSubmitButtonLabel : 'Create', 
                array('class'=>isset($ctrl->createSubmitButtonClass)  ? $ctrl->createSubmitButtonClass : 'btn btn-primary pull-right')) }}
        </div>
        </div>
    {!! Form::close() !!}
   </div>
  </fieldset>
</div>
@endsection


@section(isset($ctrl->styleSectionName) ? $ctrl->styleSectionName : 'styles')
   @if(isset($ctrl->createStyleTemplate))
    @include($ctrl->createStyleTemplate)
   @endif
@endsection

@section(isset($ctrl->scriptSectionName) ? $ctrl->scriptSectionName : 'scripts')
   @if(isset($ctrl->createScriptTemplate))
    @include($ctrl->createScriptTemplate)
   @endif
@endsection
