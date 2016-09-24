@extends(isset($ctrl->baseTemplate) ? $ctrl->baseTemplate : 'laravelgenerics::layout')
@section('title', isset($ctrl->indexPageTitle)  ? $ctrl->indexPageTitle : 'Manage Records')
@section(isset($ctrl->contentSectionName) ? $ctrl->contentSectionName : 'content')
<div class="row">
  <fieldset>
  <legend class="row">
  <div class="{{ isset($ctrl->indexPageTitleDivClass)  ? $ctrl->indexPageTitleDivClass : 'col-md-10' }}">
    <h3>{{ isset($ctrl->indexPageTitle)  ? $ctrl->indexPageTitle : 'Manage Records' }}</h3>
  </div>
  <div class="{{ isset($ctrl->createButtonDivClass)  ? $ctrl->createButtonDivClass : 'col-md-2' }}">
  <a 
    href="{{ isset($ctrl->routeBase) ? $ctrl->routeBase.'/create': '#'}}" 
    class="{{ isset($ctrl->createButtonClass) ? $ctrl->createButtonClass : 'btn btn-primary pull-right btn-block'}}"
  >{{ isset($ctrl->createButtonLabel)  ? $ctrl->createButtonLabel : 'Create'}}</a>
  </div>
  </legend>
   @include('laravelgenerics::table')
  </fieldset>
</div>
@endsection