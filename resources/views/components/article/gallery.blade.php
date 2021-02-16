<div class="c-article-gallery">
  <div class="gallery">

    @foreach($articles as $article)
      <div class="gallery-item" tabindex="0">
        <a href="{{ route('articles.show', $article->id) }}">
          <img src="{{ $article->img_url }}" class="gallery-image" alt="">

          <div class="gallery-item-info">

            <ul>
              <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 1</li>
              <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> {{ count($article->comments) }}</li>
            </ul>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</div>
  <!-- End of gallery -->