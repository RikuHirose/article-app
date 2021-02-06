@extends('layouts.app')

@section('content')

    <div class="p-article-show">
        @include('components.article.card', ['article' => $article])

        <div class="text-center">
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">edit</a>

            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-primary mt-1" type="submit">delete</button>
            </form>
        </div>
    </div>
@endsection