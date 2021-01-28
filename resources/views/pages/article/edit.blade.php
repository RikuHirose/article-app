@extends('layouts.app')

@section('content')
  <div class="p-article-edit">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label>title</label>
        <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{ $article->title }}">
      </div>

      <div class="form-group">
        <label>description</label>
        <textarea class="form-control" rows="3" name="description">{{ $article->description }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@endsection