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

            <button class="profile-edit-btn">
              <a href="{{ route('users.edit', $user->id) }}">Edit Profile</a>
            </button>

          </div>

          <div class="profile-stats">

            <ul>
              <li><span class="profile-stat-count">{{ count($user->articles) }}</span> posts</li>
              <li>
                <a href="">
                  <span class="profile-stat-count">1</span> followers
                </a>
              </li>
              <li>
                <a href="">
                  <span class="profile-stat-count">1</span> following
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