@include('includes.top')

  <!-- preloader start -->
  <div class="preloader">
    <img src="images/preloader.gif" alt="preloader">
  </div>
  <!-- preloader end -->

<!-- header -->
@include('includes.nav')
<!-- /header -->

@yield('content')


<!-- footer -->
@include('includes.footer')
<!-- /footer -->



@include('includes.button')