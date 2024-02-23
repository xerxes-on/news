@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Articles Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Articles table </li>

            </ol>
              <a href="{{route('article.index')}}">
              <button type="button" class="btn btn-info ml-4">

                      <i class="fa-solid fa-arrow-left"></i>
                      Back

              </button>
              </a>
          </nav>
        </div>
        <div class="card">
          <div class="card-body">
              <div class="col-md-4">
                <img class="img-fluid" src="/files/images/{{$article->photo}}" alt="img">
              </div>
              <table class="table">
                      <tbody>
                      <tr>
                        <td>Category: </td>
                        <td style="color: #1b8dbf"><h4><a href="{{route('category.show', $article->category->id)}}">{{$article->category->name_en}}</a></h4></td>
                      </tr>
                      <tr>
                        <td>Title in Uzbek:  </td>
                        <td style="color: #1b8dbf"><h4>{{$article->title_uz}}</h4></td>
                      </tr>
                      <tr>
                        <td>Title in English:  </td>
                        <td style="color: #1b8dbf"><h4>{{$article->title_en}}</h4></td>
                      </tr>
                      <tr>
                        <td>Tags:  </td>
                        <td style="color: #1b8dbf"><h4>
                            @foreach($article->tags as $tag)
                              <a href="{{route('tag.show', $tag->id)}}">
                                #{{$tag->name_uz}}
                              </a>
                            @endforeach
                          </h4></td>
                      </tr>
                </tbody>
              </table>



          <div class="card-body">
            <h2>Body in Uzbek</h2>
            <p>
               {!!$article->body_uz  !!}
            </p>
          </div>
          <div class="card-body">
            <h2>Body in English</h2>
            <p>
               {!!$article->body_en  !!}
            </p>
          </div>
            </div>
          </div>
        </div>
@endsection
