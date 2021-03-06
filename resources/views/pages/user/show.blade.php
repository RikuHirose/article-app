@extends('layouts.app')

@section('content')
  <div class="p-user-show">

    <div class="c-user-profile">
      <div class="profile">

          <div class="profile-image">

            <img src="{{ $user->profile->cover_url }}" alt="">

          </div>

          <div class="profile-user-settings">

            <h1 class="profile-user-name">{{ $user->profile->display_name }}</h1>

            @if(Auth::user()->id === $user->id)
              <button class="profile-edit-btn">
                <a href="{{ route('users.edit', $user->id) }}">Edit Profile</a>
              </button>
            @elseif($user->is_follow)
              <form action="{{ route('follows.destroy', $user->follow_id) }}" method="POST" style="display: contents;">
                  @csrf
                  @method('DELETE')
                  <button class="profile-btn profile-btn__follow" type="submit">
                    unfollow
                  </button>
              </form>
            @else
              <form action="{{ route('follows.store') }}" method="POST" style="display: contents;">
                  @csrf
                  <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                  <button class="profile-btn profile-btn__follow" type="submit">
                    follow
                  </button>
              </form>
            @endif
          </div>

          <div class="profile-stats">

            <ul>
              <li><span class="profile-stat-count">{{ count($user->articles) }}</span> posts</li>
              <li>
                <a href="{{ route('users.show.follows.index', ['id' => $user->id, 'type' => 'followers']) }}">
                  <span class="profile-stat-count">{{ count($user->followers) }}</span> followers
                </a>
              </li>
              <li>
                <a href="{{ route('users.show.follows.index', ['id' => $user->id, 'type' => 'following']) }}">
                  <span class="profile-stat-count">{{ count($user->following) }}</span> following
                </a>
              </li>

              <li>
                <a href="{{ route('users.show.likes.index', $user->id) }}">
                  <span class="profile-stat-count">
                    {{ count($user->likedArticles) }}
                  </span> liked
                </a>
              </li>
            </ul>
          </div>
      </div>
    </div>
    <!-- End of profile section -->
    @include('components.article.gallery', ['articles' => $user->articles])


  </div>
@endsection