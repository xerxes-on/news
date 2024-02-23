@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Ad</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Add an Ad </li>
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
                    <form action="{{ route('ad.store')}}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="img1">Vertical img</label>
                        <input type="file" required name="img1" class="form-control" id="img1" />
                      </div>
                      <div class="form-group">
                        <label for="img2">Vertical img</label>
                        <input type="file" name="img2" required class="form-control" id="img2" />
                      </div>
                      <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" class="form-control" id="link" placeholder="ads.example.com..." />
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        <input type="number" name="status" class="form-control" id="status" placeholder="Default 0" />
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Create </button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
