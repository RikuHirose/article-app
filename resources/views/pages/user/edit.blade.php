@extends('layouts.app')

@section('content')
  <div class="p-user-edit">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <input type="file" name="cover" accept="image/jpeg,image/png">
      </div>

      <div class="form-group">
        <label>display name</label>
        <input type="text" name="display_name" class="form-control" value="{{ $user->profile->display_name }}">
      </div>

      <div class="form-group">
        <label>gender</label>
        <select class="form-control" name="gender" required>
            <option value="">--</option>
            <option value="1" @if(old('gender') == 1 || $user->profile->gender == 1) selected @endif>男性</option>
            <option value="2" @if(old('gender') == 2 || $user->profile->gender == 2) selected @endif>女性</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@endsection