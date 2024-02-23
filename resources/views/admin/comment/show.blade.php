@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Comment Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Articles table </li>

            </ol>
              <a href="{{route('comment.index')}}">
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
                <img class="img-fluid" src="/files/images/{{$comment->article->photo}}" alt="img">
              </div>
              <table class="table">
                      <tbody>
                      <tr>
                        <td>Category: </td>
                        <td style="color: #1b8dbf"><h4><a href="{{route('category.show', $comment->article->id)}}">{{$comment->article->name_en}}</a></h4></td>
                      </tr>
                      <tr>
                        <td>Title in Uzbek:  </td>
                        <td style="color: #1b8dbf"><h4>{{$comment->article->title_uz}}</h4></td>
                      </tr>
                      <tr>
                        <td>Title in English:  </td>
                        <td style="color: #1b8dbf"><h4>{{$comment->article->title_en}}</h4></td>
                      </tr>
                      <tr>
                        <td>Tags:  </td>
                        <td style="color: #1b8dbf"><h4>
                            @foreach($comment->article->tags as $tag)
                              <a href="{{route('tag.show', $tag->id)}}">
                                #{{$tag->name_uz}}
                              </a>
                            @endforeach
                          </h4></td>
                      </tr>
                </tbody>
              </table>



          <div class="card-body">

              <table class="table">
                <thead>
                <tr>
                  <th>Body in Uzbek</th>
                  <th>Body in English</th>
                </tr>

                </thead>
                      <tbody>
                      <tr>
                             <td>
                     {!! $comment->article->body_uz !!}
                   </td>
                   <td>
                     {!!$comment->article->body_en!!}
                   </td>
                      </tr>

                </tbody>
              </table>
            <div class="p-4 mt-4 col-md-6 alert alert-dark float-lg-right">
              <h4>Comment</h4>
                <p>{{$comment->comment}}</p>
              <h6 class="text-sm-right">{{$comment->created_at}}</h6>
              <h5 class="text-sm-right">{{$comment->name}}</h5>
          </div>
            </div>
          </div>
        </div>
@endsection
