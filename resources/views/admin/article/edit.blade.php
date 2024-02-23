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
                    <form action="{{ route('article.update', $article->id)}}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                      @method('put')
                      <div class="form-group">
                        <label for="title">Title in Uzbek</label>
                        <input value="{{$article->title_uz}}" required type="text"  name="title_uz" class="form-control" id="title" placeholder="..." />
                      </div>
                      <div class="form-group">
                        <label for="title_en">Title in English</label>
                        <input value="{{$article->title_en}}" required type="text" name="title_en" class="form-control" id="title_en" placeholder="..." />
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" class="form-control" required>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            @if($category->id == $article->category_id)
                              selected
                              @endif
                            >{{$category->name_uz}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        <img class="img-fluid" src="/files/images/{{$article->photo}}">
                      </div>
                      <div class="form-control">
                        <label for="photo">Image</label>
                        <input type="file" name="photo" class="form-control" id="photo">
                      </div>
                      <div class="form-group">
                        <label for="body_uz">Body in Uzbek</label>
                        <textarea  class="form-control" id="body_uz" name="body_uz">
                          {{$article->body_uz}}
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label for="body_en">Body in English</label>
                        <textarea  class="form-control" id="body_en" name="body_en">
                            {{$article->body_en}}
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label for="category">Tags</label>
{{--                        @dd($article->tags()->tag_id)--}}
                        <select id="category" name="tags[]" class="form-control" multiple>
                          @foreach($tags as $tag)
                            <option value="{{$tag->id}}"
                            @if($article->tags->contains($tag->id))
                              selected class="alert-primary"
                            @endif
                            >#{{$tag->name_uz}}</option>
                          @endforeach
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Create </button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
