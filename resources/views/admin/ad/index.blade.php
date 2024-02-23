@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Ads Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Ads table </li>

            </ol>
              <a href="{{route('ad.create')}}">
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
                    <th>Vertical image</th>
                    <th>Horizontal image</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)
                 <tr>
                   <td><img src="/files/images/{{$ad->img1}}" alt="{{$ad->img1}}"></td>
                   <td><img src="/files/images/{{$ad->img2}}" alt="{{$ad->img2}}"></td>
                    <td>{{$ad->link}}</td>
                    <td>{{$ad->status}}</td>
                    <td>
                        <a href="{{ route('ad.show', $ad->id)}}"><i class="fa-regular fa-eye fa-2xl" style="color: #198ae3;"></i></a>
                        <a href="{{ route('ad.edit', $ad->id)}}"><i class="fa-solid fa-pen fa-2xl" style="color: #218a19;"></i></a>
                        <form action="{{route('ad.destroy', $ad->id)}}" method="post" style="display: inline">
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
