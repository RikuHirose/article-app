<div class="c-article-card">
    <div class="article">
      <div class="name">
        <a href="">
            <img src="https://randomuser.me/api/portraits/women/84.jpg" class="profile-img"/>
            <p>
                {{ $article->user->name }}
            </p>
        </a>
      </div>
    </div>

    <div class="article-image">
      <a href="{{ route('articles.show', $article->id) }}">
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

        @foreach($article->comments as $comment)
            <p>
                <span class="user-name">{{ $comment->user->name }}</span>
                {{ $comment->text }}
            </p>
        @endforeach
    </div>
</div>