@extends('layouts.app')

@section('content')
    {!! form($form) !!}

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{ __('Brand') }}</th>
      <th scope="col">{{ __('Year') }}</th>
      <th scope="col">{{ __('Owner') }}</th>
      <th scope="col">{{ __('Owners count') }}</th>
      <th scope="col">{{ __('Comments') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($trucks as $truck)
    <tr>
      <td>{{ $truck->id }}</td>
      <td>{{ $truck->brand }}</td>
      <td>{{ $truck->year }}</td>
      <td>{{ $truck->owner }}</td>
      <td>{{ $truck->owners_count }}</td>
      <td>{{ $truck->comments }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
