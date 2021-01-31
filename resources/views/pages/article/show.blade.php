@extends('layouts.app')

@section('content')
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
          <a href="">
            <img src="{{ $article->img_url }}" width="100%"/>
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