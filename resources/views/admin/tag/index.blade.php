@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Tags Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Tags table </li>

            </ol>
              <a href="{{route('tag.create')}}">
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
                    <th>ID</th>
                    <th>Name in Uzbek</th>
                    <th>Name in English</th>
                    <th>Created at</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                 <tr>
                    <td>{{$tag->id}}</td>
                    <td>#{{$tag->name_uz}}</td>
                    <td>#{{$tag->name_en}}</td>
                    <td>{{$tag->created_at}}</td>
                    <td>
                        <a href="{{ route('tag.show', $tag->id)}}"><i class="fa-regular fa-eye fa-2xl" style="color: #198ae3;"></i></a>
                        <a href="{{ route('tag.edit', $tag->id)}}"><i class="fa-solid fa-pen fa-2xl" style="color: #218a19;"></i></a>
                        <form action="{{route('tag.destroy', $tag->id)}}" method="post" style="display: inline">
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
