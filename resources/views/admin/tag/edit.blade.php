
@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Category</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Update the tag</li>

            </ol>
              <a href="{{route('tag.index')}}">
              <button type="button" class="btn btn-info ml-4">

                      <i class="fa-solid fa-arrow-left"></i>
                      Back
              </button>
              </a>
          </nav>
        </div>
      <div class="grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form action="{{ route('tag.update', $tag->id)}}" class="forms-sample" method="post" >
                        @csrf
                        @method('PUT')
                      <div class="form-group">
                        <label for="category_uz">Tag name in Uzbek</label>
                        <input type="text" required value="{{$tag->name_uz}}" name="name_uz" class="form-control" id="category_uz" placeholder="Mirziyoyev..." />
                      </div>
                      <div class="form-group">
                        <label for="category">Tag name in English</label>
                        <input type="text" value="{{$tag->name_en}}" name="name_en" class="form-control" id="category" placeholder="Biden..." />
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Update </button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
