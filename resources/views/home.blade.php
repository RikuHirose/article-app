@extends('layouts.app')

@section('content')
    <div class="text-left">
      <form action="{{ route('index') }}" method="GET">
          <div class="form-group">
            <label>検索</label>
            <input type="text" name="text" class="form-group" value="{{ Request::get('text') }}">
          </div>

          <div class="form-group">
            <label>並べ替え</label>
            <select class="form-control" name="order_by">
                <option value="">---</option>

                <option value="created_at_desc" @if(Request::get('order_by') === 'created_at_desc') selected @endif>最新順</option>

                <option value="like_count_desc" @if(Request::get('order_by') === 'like_count_desc') selected @endif>人気順</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">search</button>
      </form>
    </div>

    @foreach($articles as $article)
        @include('components.article.card', ['article' => $article])
    @endforeach
@endsection