@extends('layouts.app')

@section('content')
  <div class="p-user-like-index">
    @foreach($user->likedArticles as $article)
        @include('components.article.card', ['article' => $article])
    @endforeach
  </div>
@endsection