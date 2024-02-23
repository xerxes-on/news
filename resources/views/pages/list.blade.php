@extends('layouts.static')
@section('content')
    <section class="news">
      <div class="container">
        <div class="news__wrapper basic-flex">
          <div class="column-news">
            <h2 class="news__title">@lang('main.latest')</h2>
            <ul class="news__list basic-flex">
              @foreach($articles as $latest)
              <li class="news__item">
                <a href="{{route('show', $latest->id)}}" class="basic-flex news__link">
                  <div class="news-image-wrapper"><img src="/files/images/{{$latest->photo}}" alt="Bottom Img"></div>
                  <div class="news-box basic-flex">
                    <h4 class="news__title color-black">{{$latest['title_' . session('lang')]}}</h4>
                    <p class="news__description ">{!!implode(' ', array_slice(explode('.', $latest['body_' . session('lang')]), 0, 1))!!} </strong></p>
                    <span class="news__date basic-flex">{{date("h:i / d.m.Y", strtotime($latest->updated_at))}}</span>
                    </div>
                </a>
              </li>

              @endforeach
            </ul>
            <a href=""><button type="button" class="btn load-more-btn">@lang('main.more')</button></a>
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

@endsection
