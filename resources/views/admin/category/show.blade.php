@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Categories Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Categories table </li>

            </ol>
              <a href="{{route('category.index')}}">
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
                  <td style="color: #1b8dbf"><h4>{{count($category->articles)}}</h4></td>
                </tr>
                <tr>
                  <td>Title in Uzbek:  </td>
                  <td style="color: #1b8dbf"><h4>{{$category->name_uz}}</h4></td>
                </tr>
                <tr>
                  <td>Title in English:  </td>
                  <td style="color: #1b8dbf"><h4>{{$category->name_en}}</h4></td>
                </tr>
              </tbody>
            </table>
              <h3 class="p-4">Articles related to the Category</h3>
              <table class="table">
                      <tbody>
                         @foreach($category->articles as $article)
                           <tr>
                           <td>
                             <img src="/files/images/{{$article->photo}}" alt="dd">
                           </td>
                           <td>
                             <a href="{{route('article.show', $article->id)}}">
                               {{ $article->title_uz}}
                             </a>
                           </td>
                           <td>
                               {{ $article->created_at}}
                           </td>
                          </tr>
                         @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection
