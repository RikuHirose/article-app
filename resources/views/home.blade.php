@extends('layouts.app')

@section('content')
    
    @foreach($articles as $article)
        <div class="c-post-block">
            <div class="post">
              <div class="name">
                <a href="">
                    <img src="https://randomuser.me/api/portraits/women/84.jpg" class="profile-img"/>
                    <p>
                        user name
                    </p>
                </a>
              </div>
            </div>

            <div class="post-image">
              <a href="{{ route('articles.show', $article->id) }}">
                <img src="https://www.wallpaperup.com/uploads/wallpapers/2013/07/01/112481/62c30d7e73033ad264c790b63b233bba-700.jpg" width="100%"/>
              </a>
            </div>

            <div class="likes">
                <div class="left-icons">

                  <img src="https://image.flaticon.com/icons/svg/60/60993.svg"/>3
                  <!-- <img src="https://image.flaticon.com/icons/svg/25/25424.svg"/> -->
                </div>
            </div>

            <div class="comments">
                <!-- auth user comment -->
                <p>
                    <span class="user-name">
                        {{ $article->title }}
                    </span>
                    {{ $article->description }}
                </p>

                <p>
                    <span class="user-name">user name</span>
                    comment
                </p>
            </div>
        </div>
    @endforeach
@endsection