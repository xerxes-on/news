@extends('admin.layouts.static')
@section('content')
        <div class="page-header">
          <h3 class="page-title">Ads Table</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Ads table </li>
            </ol>
              <a href="{{route('ad.index')}}">
              <button type="button" class="btn btn-info ml-4">
                <i class="fa-solid fa-arrow-left"></i>Back
              </button>
              </a>
          </nav>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                  <img class="img-fluid" src="/files/images/{{$ad->img1}}" alt="{{$ad->img1}}">
              </div>
              <div class="col-md-4 offset-md-4">
                  <img class="img-fluid" src="/files/images/{{$ad->img2}}" alt="{{$ad->img2}}">
              </div>
            </div>
            <table class="table table-striped">
              <tbody>
                <tr>
                <td>Link: </td>
                  <td style="color: #1b8dbf"><h4>{{$ad->link}}</h4></td>
                </tr>
                <tr>
                  <td>Status: </td>
                  <td style="color: #1b8dbf"><h4>{{$ad->status}}</h4></td>
                </tr>
                <tr>
                  <td>Created at: </td>
                  <td style="color: #1b8dbf"><h4>{{$ad->created_at}}</h4></td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
        </div>
@endsection
