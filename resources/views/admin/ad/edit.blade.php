@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Ad</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Update an Ad </li>
            </ol>
              <a href="{{route('ad.index')}}">
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
                    <form action="{{ route('ad.update', $ad->id)}}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                      @method('put')
                      <div class="row">
                        <div class="col-md-4">
                            <img class="img-fluid" src="/files/images/{{$ad->img1}}" alt="{{$ad->img1}}">
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <img class="img-fluid" src="/files/images/{{$ad->img2}}" alt="{{$ad->img2}}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <label for="img1">Vertical img</label>
                          <input type="file"  name="img1" class="form-control" id="img1" />
                        </div>
                        <div class="col-md-4 offset-md-4">
                          <label for="img2">Horizontal img</label>
                          <input type="file" name="img2"  class="form-control" id="img2" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="link">Link</label>
                        <input value="{{$ad->link}}" type="text" name="link" class="form-control" id="link" placeholder="ads.example.com..." />
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        <input value="{{$ad->status}}" type="number" name="status" class="form-control" id="status" placeholder="Default 0" />
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Create </button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
