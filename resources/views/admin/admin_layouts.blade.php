<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <title>BD Buy Mart Admin</title>

    <link href="{{asset('frontend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <!-- vendor css -->
    <link href="{{ asset ('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset ('backend/css/starlight.css')}}">
  </head>

  <body>

  @guest
  
  @else
  <!-- ########## START: LEFT PANEL ########## -->
  <div class="sl-logo"><a href="{{url ('admin/home')}}"><i class="icon ion-android-star-outline"></i>BD Buy Mart</a></div>
    <div class="sl-sideleft">
      <div class="sl-sideleft-menu">
      <a href="{{ url('admin/home')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{ url('/')}}" target="_blank" class="sl-menu-link ">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Visite frontend</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="" class="sl-menu-link @yield('category')">
          <div class="sl-menu-item ">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route ('admin.cateogry')}}" class="nav-link">Add Category</a></li>
          <li class="nav-item"><a href="{{ route ('admin.sub-category')}}" class="nav-link">Add Sub-Category</a></li>
        </ul>

        <a href="" class="sl-menu-link @yield('brand') ">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Brand</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route ('add.brand')}}" class="nav-link">Add Brand</a></li>
        </ul>

        <a href="" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('manage-product')}}" class="nav-link">Managed Products</a></li>
        </ul>

        <a href="" class="sl-menu-link @yield('coupon') ">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label"> Coupons</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route ('add.coupon')}}" class="nav-link">Add Coupon</a></li>
        </ul>

        <a href="" class="sl-menu-link @yield('slider')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label"> Add Slider</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route ('image.upload')}}" class="nav-link">Add Slider</a></li>
        </ul>

        <a href="" class="sl-menu-link @yield('banner') ">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label"> Add Banner</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route ('banner.upload')}}" class="nav-link">Add Banner</a></li>
        </ul>

        <a href="" class="sl-menu-link @yield('currency') ">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label"> Add Currency</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route ('create_currency')}}" class="nav-link">Add Currency</a></li>
        </ul>

      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="{{ Auth::User()->name}}" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">
              <img src="{{ asset ('backend/img/img3.jpg')}}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                <li><a href="{{ route ('admin.logout')}}"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    @endguest

  @yield('admin_content')

    <script src="{{ asset ('backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{ asset ('backend/lib/popper.js/popper.js')}}"></script>
    <script src="{{ asset ('backend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{ asset ('backend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{ asset ('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{ asset ('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset ('backend/lib/d3/d3.js')}}"></script>
    <script src="{{ asset ('backend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{ asset ('backend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{ asset ('backend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset ('backend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset ('backend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset ('backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>
    <script src="{{ asset ('backend/js/starlight.js')}}"></script>
    <script src="{{ asset ('backend/js/ResizeSensor.js')}}"></script>
    <script src="{{ asset ('backend/js/dashboard.js')}}"></script>
    {{-- =================sweet alert=========== --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     {{-- =================toster=========== --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    
  {{-- source code of toster============ --}}

<script>
  
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type', 'info') }}";
  switch(type){
      case 'info':
          toastr.info("{{ Session::get('message') }}");
          break;

      case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;

      case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;

      case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
  }
@endif  

</script>
{{-- ================sweet alert=========== --}}

<script>  
  $(document).on("click", "#delete", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
         swal({
           title: "Are you Want to delete?",
           text: "Once Delete, This will be Permanently Delete!",
           icon: "warning",
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
                window.location.href = link;
           } else {
             // swal("Safe Data!");
           }
         });
     });

</script>
</body>
</html>
