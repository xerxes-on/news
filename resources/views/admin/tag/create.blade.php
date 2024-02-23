@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Tag</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Create a tag </li>

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
                    <form action="{{ route('tag.store')}}" class="forms-sample" method="post" >
                        @csrf
                      <div class="form-group">
                        <label for="category_uz">Tag name in Uzbek</label>
                        <input type="text" required name="name_uz" class="form-control" id="category_uz" placeholder="Mirziyoyev..." />
                      </div>
                      <div class="form-group">
                        <label for="category">Tag name in English</label>
                        <input type="text"  required name="name_en" class="form-control" id="category" placeholder="Mirziyoyev..." />
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Create </button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
