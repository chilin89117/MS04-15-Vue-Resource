@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

      <app-home :title="'{{config('app.name')}}'" :bcrypt="bcrypt"></app-home>

    </div>
  </div>
</div>
@endsection
