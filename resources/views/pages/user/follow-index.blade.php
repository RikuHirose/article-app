@extends('layouts.app')

@section('content')
  <div class="p-user-follow-index">
    @foreach($users as $user)
      <p>{{ $user->profile->display_name }}</p>
    @endforeach
  </div>
@endsection