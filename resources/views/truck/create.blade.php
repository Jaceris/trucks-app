@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
        @include('msg.flash')
        {!! form($form) !!}
    </div>
  </div>
</div>
@endsection