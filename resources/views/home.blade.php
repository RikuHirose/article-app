@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        @include('components.article.card', ['article' => $article])
    @endforeach
@endsection