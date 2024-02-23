@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Comments Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Comments table </li>
            </ol>
          </nav>
        </div>

        <div class="card">
          <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Comment</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Permission</th>
                    <th>Sent at</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                 <tr>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->rating}}</td>
                    <td>{{$comment->status}}</td>
                    <td>{{$comment->permitted}}</td>
                    <td>{{$comment->created_at}}</td>

                    <td>
                        <a href="{{ route('comment.show', $comment->id)}}"><i class="fa-regular fa-eye fa-2xl" style="color: #198ae3;"></i></a>
                        <form action="{{ route('comment.destroy', $comment->id)}}" method="post" style="display: inline">
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
