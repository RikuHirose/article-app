@extends('layouts.app')

@section('content')
  <div class="p-article-create">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label>file</label>
        <input type="file" class="form-control" name="image" accept="image/jpeg,image/gif,image/png" required>
      </div>

      <div class="form-group">
        <label>title</label>
        <input type="text" class="form-control"placeholder="Enter title" name="title">
      </div>

      <div class="form-group">
        <label>description</label>
        <textarea class="form-control" rows="3" name="description"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@endsection