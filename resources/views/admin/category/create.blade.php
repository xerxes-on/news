@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Category</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Create a category </li>

            </ol>
              <a href="{{route('category.index')}}">
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
                    <form action="{{ route('category.store')}}" class="forms-sample" method="post" >
                        @csrf
                      <div class="form-group">
                        <label for="category_uz">Category name in Uzbek</label>
                        <input type="text" name="name_uz" class="form-control" id="category_uz" placeholder="Siyosat..." />
                      </div>
                      <div class="form-group">
                        <label for="category">Category name in English</label>
                        <input type="text" name="name_en" class="form-control" id="category" placeholder="Politics..." />
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Create </button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
