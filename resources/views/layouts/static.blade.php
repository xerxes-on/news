<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gossipy</title>
  <link rel="icon" type="image/png" href="/img/logo3.png">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/cutom.css">
    <script src="https://kit.fontawesome.com/9c18f8edbf.js" crossorigin="anonymous"></script>
  <style>
  @property --num {
  syntax: "<integer>";
  initial-value: 0;
  inherits: false;
}

.effect {
  transition: --num 5s;
  counter-set: num;
  font: 800 40px system-ui;
}
.effect::after {
  content: counter(num);
}
.effect:hover {
  --num: 100;
}

    .rating1{
      float: right;
      margin:20px;
    }
    .checked {
    color: orange;
    }
    .postcomment{
      border-radius: 20px;
      background-color: rgb(46,84,173);
      width: 50%;
      padding: 1em;
      margin-top: 170px;
    }
    .sbtn{
      width: 50px;
    }
    .cform{
      display: flex;
      flex-direction: column;
    }
    .comment{
      border: solid #0b0e11 ;
      border-radius: 20px 20px 0 20px;
      padding: 0.5em 0.5em 0.5em;
      width: 50%;
      float: right;
      margin: 10px;
    }
    .txtarea{
       border-radius: 0 20px 20px 20px;
      display: block;
      padding:10px;
    }

    .rating {
      display: flex;
      flex-direction: row-reverse;
    }

.rating>input {
    display: none
}

.rating>label {
        position: relative;
    width: 19px;
    font-size: 25px;
    color: orange;
    cursor: pointer;
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}
.alert-success {
  color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
}
.alert {
  padding: 20px;
  background-color: #57e01f; /* Red */
  color: white;
  font-size: 16px;
  border-radius: 5px;
  width: 50vw;
  display: flex;
  justify-content: center;
  margin-left: 25vw;
}
  </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <main>
    <header class="main-header dark-mode-bg">
      <div class="container">
        <div class="basic-flex header__top">
          <a href="/" class="logo">
            <img src="/img/logo2.png" height="70px" alt="o">
          </a>
          <div class="currencies basic-flex">
            <div class="currency"><span>$</span><span>{{$data[0]['Rate']}} </span></div>
            <div class="currency"><span>P</span><span>{{$data[2]['Rate']}}</span></div>
            <div class="currency"><span>E</span><span>{{$data[1]['Rate']}}</span></div>
{{--               <div class="currency"><span>E{{session('lang')}}</span><span></span></div>--}}
          </div>
          <div class="header__actions basic-flex">
            <form method="GET" action="{{ route('main-search')}}" class="search-form basic-flex">
              <input type="search" name="search" class="search-input gray-bg">
              <button type="submit" class="btn search-btn gray-bg"><i class="fa fa-search color-black"></i></button>
            </form>
            <div class="languages">
                @php
                    $sessionLang = session('lang') ? session('lang') : 'en';
                @endphp
                <a href="{{ route('lang', $sessionLang) }}">
                    <button type="button" class="btn search-btn language__option gray-bg color-black" data-status="disabled">{{ $sessionLang }}</button>
                </a>
                <div class="languages__list">
                    @if($sessionLang != 'en')
                        <a href="{{ route('lang', 'en') }}"><button type="button" class="btn gray-bg color-black language__option">@php echo 'en'; @endphp</button></a>
                    @endif
                    @if($sessionLang != 'uz')
                        <a href="{{ route('lang', 'uz') }}"><button type="button" class="btn gray-bg color-black language__option">@php echo 'uz'; @endphp</button></a>
                    @endif
                </div>
            </div>

            <div class="telegram-join">
              <a href="/theme">Theme</a>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-menu"><span class="hamburger"></span></button>
        <nav class="navbar dark-mode-bg">
          <ul class="navbar__menu basic-flex">
            @foreach($categories as $category)
              <li class="menu__item"><a href="{{route('list', $category->id)}}">{{$category['name_'.session("lang")]}}</a></li>
            @endforeach
          </ul>
        </nav>
        <div class="advertisement-box">
          <h4>PLACEHOLDER FOR ADVERTISEMENT</h4>
        </div>
      </div>
    </header>
    <div class="container">
      <div class="covid-block basic-flex ">
      	<div class="covid-block__title basic-flex" style="width: 16%" >
            <div class="stats__img basic-flex"></div>
      	    <div class="">
      	      <h4 style="margin: 0; color:cornflowerblue">Chrome</h4>
      	      <b style="margin: 0; font-size: x-large">{{$browser[0]}} %</b>
      	    </div>
      	</div>
      	<div class="covid-block__stats basic-flex">
      	  <div class="stats__item basic-flex">
      	    <div class="stats-text-box">
      	      <h4><b>Safari</b></h4>
      	      <p>{{$browser[1]}} %</p>
      	    </div>
      	  </div>
      	  <div class="stats__item basic-flex">
      	    <div class=""></div>
      	    <div class="stats-text-box">
      	      <h4><b>FireFox</b></h4>
      	      <p>{{$browser[2]}} %</p>
      	    </div>
      	  </div>
      	  <div class="stats__item basic-flex">
      	    <div class=""></div>
      	    <div class="stats-text-box">
      	      <h4><b>Microsoft Edge</b></h4>
      	      <p>{{$browser[3]}} %</p>
      	    </div>
      	  </div>
      	</div>
      </div>
    </div>
    @if( session('message'))
      <div class="alert alert-success rounded-3xl" id="message">
          <span>{{ session('message')}}</span>
      </div>
    @endif

    @yield('content')

  </main>

  <footer class="footer">
    <div class="container">
      <div class="footer__top basic-flex">
        <a href="https://t.me" target="_blank" class="footer_logo"><img src="/img/logo4.png" height="70px" alt="logo"></a>
        <div class="join-telegram-wrapper basic-flex">
          <p>@lang('main.join')</p>
          <a href="https://t.me" target="_blank" class="join-telegram">@lang('main.follow')</a>
        </div>
      </div>
      <div class="footer__bottom">
        <div class="about-site">
          <h4>@lang('main.about-web')</h4>
          <p >@lang('main.copyright') </p>
        </div>
        <ul class="footer-menu">
          <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('main.about-web')</a></li>
          <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('main.contact-us')</a></li>
          <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('main.ads')</a></li>
          <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('main.send-news')</a></li>
        </ul>
      </div>
    </div>
  </footer>

  <script src="/js/main.js"></script>

  <script>
      let message= document.getElementById('message')
      setTimeout(function(){
            message.style.display = "none";
        }, 4000);
    function dark_mode(){

        document.body.style.backgroundColor = "#000000eb";

        let elements = document.getElementsByClassName('dark-mode-bg');
        for(let i=0; i<elements.length; i++) {
            elements[i].style.background = '#000';
        }

        elements = document.getElementsByClassName('color-black');
        for(let i=0; i<elements.length; i++) {
            elements[i].style.color = '#fff';
        }

        elements = document.querySelectorAll('.menu__item a');
        for(let i=0; i<elements.length; i++) {
            elements[i].style.color = '#ffffff';
        }
        elements = document.querySelectorAll('.color-black a');
        for(let i=0; i<elements.length; i++) {
            elements[i].style.color = '#4176da';
        }
        elements = document.querySelectorAll('.news-box p');
        for(let i=0; i<elements.length; i++) {
            elements[i].style.color = '#6e43c1';
        }
        elements = document.querySelectorAll('.color-black p');
        for(let i=0; i<elements.length; i++) {
            elements[i].style.color = '#ffffff';
        }
        elements = document.getElementsByClassName('gray-bg');
        for(let i=0; i<elements.length; i++) {
            elements[i].style.background = '#3d3c4a';
        }
        elements = document.getElementsByClassName('color-link');
        for(let i=0; i<elements.length; i++) {
            elements[i].style.background = '#3d3c4a';
        }
        let commentDiv = document.getElementById("comment");
        commentDiv.style.border = "1px solid #007fff";
        document.querySelector('footer').style.backgroundColor = '#000';
}
    if ({{ session()->has('dark') ? 'true' : 'false' }}) {
        dark_mode();
    }
  </script>
</body>
</html>
