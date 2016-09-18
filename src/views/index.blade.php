@extends('main')
@section('title', '| Index')
@section('content')
<h1>index view</h1>
<div class="row">
  
  {{ $ctrl->model }}

</div>
@endsection