@extends('layouts.static')
@section('content')
    <section class="article">
      <div class="container">
        <div class="news__wrapper basic-flex">
          <div class="article__wrapper color-black">
            <h2 class="article__title color-black">{{$article['title_'.session('lang')]}}
            </h2>
            <span class="article__date basic-flex">11:31 / 15.05.2020</span>
            <img src="/files/images/{{$article->photo}}" alt="{{$article['title_'.session('lang')]}}
            "><p class="color-black">
            {!! $article['body_'.session('lang')] !!}
                </p>
            <div class="hashtags basic-flex">
              @foreach($article->tags as $tag)
              <a href="{{route('hashtag', $tag->id)}}">#{{$tag['name_'.session('lang')]}}</a>

              @endforeach
            </div>
            <div class="comment-section">
                @if( count($comments)>0)
                      <div class="comment " id="comment">
                        <span>{{$comments[0]->name}}</span>
                        <p style="padding-left: 1em">{{$comments[0]->comment}}</p>
                        <div class="rating1">
                                @php $c = $comments[0]->rating @endphp
                                @for($i = 1; $i<=5; $i++)
                                     <span class="fa fa-star @if($c >0) checked @endif"></span>
                                        @php $c--@endphp
                                @endfor
                        </div>
                      </div>
                @endif

              <h2>@lang('main.comments')</h2>
                <div class="postcomment">
              <form action="{{ route('comment', $article->id)}}" method="post" class="cform" >
                @csrf
                  <textarea class="txtarea" name="comment" rows="3" cols="50" placeholder="Leave a comment"></textarea>
                <div class="rating">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                <button type="submit" class="sbtn">Post</button>
              </form>
              </div>

            </div>
          </div>
          <div class="popular-news">
            <div class="popular-news-wrapper dark-mode-bg">
              <h4 class="popular-news__title color-black">@lang('main.popular')</h4>
              <ul class="popular-news__list">
                @foreach($most_viewed_articles as $popular)
                  <li class="popular-news__item">
                    <a href="{{route('show', $popular->id)}}">
                      <p class="popular-news__description color-black">{{$popular['title_'.session('lang')]}}</p>
                      <span class="popular-news__date">{{date("h:i / d.m.Y", strtotime($popular->updated_at))}}</span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="ads-placeholder">
                <div class="tenor-gif-embed" data-postid="12963709" data-share-method="host" data-aspect-ratio="0.665625" data-width="100%"></div>
              <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
            </div>
          </div>
          <div class="related-news">
            <h3 class="related-news__title color-black">@lang('main.related')
            </h3>
            <div class="related-posts basic-flex">
              @foreach($related_articles as $related)
                @if($related->id == $article->id)
                  @continue
                @endif
                <div class="posts__item">
                <a href="{{route('show', $related->id)}}">
                  <img src="/files/images/{{$related->photo}}" alt="Image" class="posts__img">
                  <h2 class="posts__title color-black">{{$related->title_en}}</h2>
                  <span class="posts__date">{{date("h:i / d.m.Y", strtotime($related->updated_at))}}</span>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
