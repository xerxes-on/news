@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Tags Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Tags table </li>

            </ol>
              <a href="{{route('tag.index')}}">
              <button type="button" class="btn btn-info ml-4">

                      <i class="fa-solid fa-arrow-left"></i>
                      Back

              </button>
              </a>
          </nav>
        </div>
        <div class="card">
          <div class="card-body">
            <table class="table table-striped">
              <tbody>
                <tr>
                <td>Articles: </td>
                  <td style="color: #1b8dbf"><h4>{{count($tag->articles)}}</h4></td>
                </tr>
                <tr>
                  <td>Title in Uzbek:  </td>
                  <td style="color: #1b8dbf"><h4>#{{$tag->name_uz}}</h4></td>
                </tr>
                <tr>
                  <td>Title in English:  </td>
                  <td style="color: #1b8dbf"><h4>#{{$tag->name_en}}</h4></td>
                </tr>
              </tbody>
            </table>
              <h3 class="p-4">Articles related to the tag</h3>
              <table class="table">
                      <tbody>
                      <tr>
                         @foreach($tag->articles as $article)
                           <td>
                             <img src="/files/images/{{$article->photo}}" alt="dd">
                           </td>
                         <td>
                           <a href="{{route('article.show', $article->id)}}">
                             {{ $article->title_uz}}
                           </a>
                           </td>
                         @endforeach
                      </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection
