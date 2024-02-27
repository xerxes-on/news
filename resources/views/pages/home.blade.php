@extends('layouts.static')
@section('content')
    <section class="posts">
      <div class="container dark-mode-bg">
        <ul class="posts__list basic-flex">
          <li class="posts__item">
            <a href="{{$ad[0]->link}}"><div class="tenor-gif-embed" data-postid="24560968" data-share-method="host" data-aspect-ratio="1.37339" data-width="100%"><a href="https://tenor.com/view/coke-can-dance-gif-24560968">Coke Can GIF</a>from <a href="https://tenor.com/search/coke-gifs">Coke GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
            </a>
          </li>
          @foreach($articles as $article)
          <li class="posts__item">
            <a href="{{route('show', $article->id)}}">
              <img src="/files/images/{{$article->photo}}" alt="Image" class="posts__img">
              <h2 class="posts__title color-black">{{$article['title_' . session('lang')]}}</h2>
              <span class="posts__date">{{date("h:i / d.m.Y", strtotime($article->updated_at))}}</span>
            </a>
          </li>
          @endforeach

        </ul>
      </div>
    </section>

    <div class="container">
      <div class="notification dark-mode-bg basic-flex">
        <div class="notification__text basic-flex">
          <h3 class="color-black">@lang('main.not2')
          </h3>
        </div>
        <button type="button" class="notification__button btn">
          @lang('main.not')!
        </button>
      </div>
    </div>

    <section class="news">
      <div class="container">
        <div class="news__wrapper basic-flex">
          <div class="column-news">
            <h2 class="news__title color-black">@lang('main.latest')</h2>
            <ul class="news__list basic-flex">
              @foreach($latest_articles as $latest)
              <li class="news__item">
                <a href="{{ route('show', $latest->id) }}" class="basic-flex news__link">
                  <div class="news-image-wrapper"><img src="/files/images/{{$latest->photo}}" alt="Bottom Img"></div>
                  <div class="news-box basic-flex">
                    <h4 class="news__title color-black">{{$latest['title_' . session('lang')]}}</h4>
{{--                    <p class="news__description ">{{implode(' ', array_slice(explode('.', $latest->body_en), 0, 1))}}</p>--}}
                    <p class="news__description ">{!!implode(' ', array_slice(explode('.', $latest['body_' . session('lang')]), 0, 1))!!} </strong></p>
                    <span class="news__date basic-flex">{{date("h:i / d.m.Y", strtotime($latest->updated_at))}}</span>
                    </div>
                </a>
              </li>

              @endforeach
            </ul>
            <button type="button" class="btn load-more-btn">@lang('main.more')</button>
          </div>
          <div class="popular-news">
            <div class="popular-news-wrapper dark-mode-bg">
              <h4 class="popular-news__title color-black">@lang('main.popular')</h4>
              <ul class="popular-news__list">
                @foreach($most_viewed_articles as $popular)
                  <li class="popular-news__item">
                    <a href="{{route('show', $popular->id)}}">
                      <p class="popular-news__description color-black">{{$popular['title_' . session('lang')]}}</p>
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
        </div>
      </div>
    </section>

    <div class="apps-block container basic-flex dark-mode-bg">
      <div class="apps-block__image"></div>
      <div class="apps-block__content">
        <h4>@lang('main.tuned')!</h4>
        <p class="color-black">@lang('main.app')!</p>
      </div>
      <div class="apps-block__links basic-flex">
        <div class="links__item">
          <a href="#"><img src="/img/googleplay.png" alt="googleplay"></a>
        </div>
        <div class="links__item">
          <a href="#"><img src="/img/appstore.png" alt="googleplay"></a>
        </div>
      </div>
    </div>
@endsection
