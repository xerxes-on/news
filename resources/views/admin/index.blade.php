@extends('admin.layouts.static')
@section('content')
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, {{auth()->user()->name}} welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Your web analytics dashboard.</span>
              </h3>
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
                <button type="button" class="btn btn-sm ml-3 btn-success"> Add User </button>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-4 col-md-6 stretch-card grid-margin stretch-card">
                <!--browser stats-->
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Browser stats</h4>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between pb-3 border-bottom">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/opera-logo.png" alt="" />
                            <span class="p">opera mini</span>
                          </div>
                          <p class="mb-0">{{$opera}}%</p>
                        </div>
                      </div>
                    </div>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between pb-3 border-bottom">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/safari-logo.png" alt="" />
                            <span class="p">Safari</span>
                          </div>
                          <p class="mb-0">{{$safari}}%</p>
                        </div>
                      </div>
                    </div>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between pb-3 border-bottom">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/chrome-logo.png" alt="" />
                            <span class="p">Chrome</span>
                          </div>
                          <p class="mb-0">{{$chrome}}%</p>
                        </div>
                      </div>
                    </div>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between pb-3 border-bottom">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/firefox-logo.png" alt="" />
                            <span class="p">Firefox</span>
                          </div>
                          <p class="mb-0">{{$firefox}}%</p>
                        </div>
                      </div>
                    </div>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/explorer-logo.png" alt="" />
                            <span class="p">Microsoft Edge</span>
                          </div>
                          <p class="mb-0">{{$edge}}%</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--browser stats ends-->
              </div>

            </div>
          </div>

@endsection
