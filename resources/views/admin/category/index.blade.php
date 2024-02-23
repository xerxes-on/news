@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Categories Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Categories table </li>

            </ol>
              <a href="{{route('category.create')}}">
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
                @foreach($categories as $category)
                 <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name_uz}}</td>
                    <td>{{$category->name_en}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <a href="{{ route('category.show', $category->id)}}"><i class="fa-regular fa-eye fa-2xl" style="color: #198ae3;"></i></a>
                        <a href="{{ route('category.edit', $category->id)}}"><i class="fa-solid fa-pen fa-2xl" style="color: #218a19;"></i></a>
                        <form action="{{route('category.destroy', $category->id)}}" method="post" style="display: inline">
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
