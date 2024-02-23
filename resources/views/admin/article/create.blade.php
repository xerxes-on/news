@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Article</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Article a category </li>

            </ol>
              <a href="{{route('article.index')}}">
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
                    <form action="{{ route('article.store')}}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="title">Title in Uzbek</label>
                        <input type="text" name="title_uz" value="{{old('title_uz')}}" class="form-control" id="title" placeholder="..." />
                      </div>
                      <div class="form-group">
                        <label for="title_en">Title in English</label>
                        <input type="text" value="{{old('title_en')}}" name="title_en" class="form-control" id="title_en" placeholder="..." />
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" class="form-control" required>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name_uz}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="photo">Image</label>
                        <input type="file" name="photo" class="form-control" id="photo" required>
                      </div>
                      <div class="form-group">
                        <label for="body_uz">Body in Uzbek</label>
                        <textarea class="form-control" id="body_uz" name="body_uz">{{old('body_uz')}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="body_en">Body in English</label>
                        <textarea class="form-control" id="body_en" name="body_en">{{old('body_en')}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="category">Tags</label>
                        <select id="category" name="tags[]" class="form-control" multiple>
                          @foreach($tags as $tag)
                            <option value="{{$tag->id}}">#{{$tag->name_uz}}</option>
                          @endforeach
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Create </button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
