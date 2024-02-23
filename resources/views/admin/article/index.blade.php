@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Articles Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Articles table </li>
            </ol>
              <a href="{{route('article.create')}}">
              <button type="button" class="btn btn-info ml-4">
                      <i class="fa-solid fa-plus"></i>
                      Create
              </button>
              </a>
          </nav>
        </div>

        <div class="card">
          <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Img</th>
                    <th>Title in Uzbek</th>
                    <th>Title in English</th>
                    <th>Views</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                 <tr>
                   <td><img src="/files/images/{{$article->photo}}" alt="nknrgjkd"></td>
                    <td>{{implode(' ', array_slice(explode(' ', $article->title_en), 0, 3))}}</td>
                    <td>{{implode(' ', array_slice(explode(' ', $article->title_uz), 0, 3))}}</td>
                    <td>{{$article->viewsint}}</td>
                    <td>
                        <a href="{{ route('article.show', $article->id)}}"><i class="fa-regular fa-eye fa-2xl" style="color: #198ae3;"></i></a>
                        <a href="{{ route('article.edit', $article->id)}}"><i class="fa-solid fa-pen fa-2xl" style="color: #218a19;"></i></a>
                        <form action="{{route('article.destroy', $article->id)}}" method="post" style="display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0" style="background-color: white" ><i class="fa-solid fa-trash fa-2xl" style="color: #ff0000;"></i></button>
                        </form>
                    </td>
                  </tr>
                @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>

@endsection
