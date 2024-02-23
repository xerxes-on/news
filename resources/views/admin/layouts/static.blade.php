<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="shortcut icon" href="/assets/images/favicon.png" />
    <script src="https://kit.fontawesome.com/9c18f8edbf.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas " id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="/index.html"><img src="/assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="/index.html"><img src="/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul  class=" nav mt-4 ">

          <li class="nav-item">
            <a class="nav-link" href="/admin">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('article.index')}}">
              <i class="mdi mdi-newspaper menu-icon"></i>
              <span class="menu-title">Articles</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('category.index')}}">
              <i class="mdi mdi-view-grid menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('tag.index')}}">
              <span class="menu-title"><i class="fa-solid fa-xl fa-hashtag menu-icon" style="color: #423a8e;"></i>Tags</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('comment.index')}}">
              <i class="mdi mdi-comment-text-outline menu-icon"></i>
              <span class="menu-title">Comments</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('message.index')}}">
              <i class="mdi mdi-message-processing menu-icon"></i>
              <span class="menu-title">Messages</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('ad.index')}}">
              <i class="mdi mdi-checkbox-multiple-blank-outline menu-icon"></i>
              <span class="menu-title">Ads</span>
            </a>
          </li>
          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                <div class="border-none">
                  <p class="text-black">Notification</p>
                </div>

                  <form action="{{route('logout')}}" method="post">
                  @csrf
                    <ul class="mt-4 pl-0">
                      <li><button type="submit" class="border-0 bg-transparent hover:w-1/2">Sign Out</button></li>
                    </ul>
                  </form>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="/index.html"><img src="/assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="/#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                  <span class="count count-varient1">7</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="/assets/images/faces/face4.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Dany Miles <span class="text-small text-muted">commented on your photo</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="/assets/images/faces/face3.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> James <span class="text-small text-muted">posted a photo on your wall</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="/assets/images/faces/face2.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Alex <span class="text-small text-muted">just mentioned you in his post</span>
                      </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0">View all activities</p>
                </div>
              </li>
              <li class="nav-item dropdown d-none d-sm-flex">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="/#" data-toggle="dropdown">
                  <i class="mdi mdi-email-outline"></i>
                  <span class="count count-varient2">5</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-success">Request</span>
                      <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-warning">Invoices</span>
                      <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-danger">Projects</span>
                      <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <h6 class="p-3 mb-0">See all activity</h6>
                </div>
              </li>
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">

                <form method="get" action="{{route('search')}}" class="nav-link form-inline mt-2 mt-md-0">
                    <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                          <button type="submit" class="bg-transparent border-0">
                        <i class="mdi mdi-magnify"></i>
                          </button>
                      </span>
                    </div>
                  </div>
                </form>

              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              <li class="nav-item dropdown d-none d-xl-flex border-0">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="/#" data-toggle="dropdown">
                  <i class="mdi mdi-earth"></i> English </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                  <a class="dropdown-item" href="/#"> French </a>
                  <a class="dropdown-item" href="/#"> Spain </a>
                  <a class="dropdown-item" href="/#"> Latin </a>
                  <a class="dropdown-item" href="/#"> Japanese </a>
                </div>
              </li>
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="/#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="" src="/assets/images/faces/face1.jpg" />
                  <span class="profile-name">{{ auth()->user()->name}}</span>

                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="/#">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                  <form action="{{route('logout')}}" method="post">
                    @csrf
                       <button type="submit" class="dropdown-item">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Sign out </button>
                  </form>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>

        <!-- main-panel ends -->
    <div class="main-panel">
              <div class="content-wrapper">
          @if($errors->any())
                <div class="alert alert-danger" id="alert">
                    <span><b>Open ur eyes dude</b> look closer 😡. Here: </span>
                    <br><br>
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{$e}} -- ☹️</li>
                        @endforeach
                    </ul>
                </div>
          @endif
          @if( session('message'))
                <div class="alert alert-success rounded-3xl" id="alert2">
                    <span>{{ session('message')}}</span>
                </div>
            @endif
            @yield('content')

      <!-- page-body-wrapper ends -->
           </div>
     <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->


    <!-- container-scroller -->
    <!-- plugins:js -->
          <script>
              let message= document.getElementById('alert')
              setTimeout(function(){
                    message.style.display = "none";
                }, 7000);
              let error= document.getElementById('alert2')
              setTimeout(function(){
                    error.style.display = "none";
                }, 4000);
          </script>
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.pie.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#body_uz' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#body_en' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
      </div>
    </div>
  </body>
</html>
