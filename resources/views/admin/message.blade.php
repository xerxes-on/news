
@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Messages Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Messages table </li>
            </ol>
          </nav>
        </div>

        <div class="card">
          <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                 <tr>
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->subject}}</td>
                    <td>{{$message->message}}</td>
                    <td>
                        <a href="{{ route('message.show', $message->id)}}"><i class="fa-regular fa-eye fa-2xl" style="color: #198ae3;"></i></a>
                        <form action="{{route('message.destroy', $message->id)}}" method="post" style="display: inline">
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
