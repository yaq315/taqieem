@include('dashboard.include.top')

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="#">
          <img src="images/logo.png"  alt="" width="150">
        </a>

        
      </div>

    </div>


    <!-- Sidebar Start -->
@include('dashboard.include.aside')


    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">




      <!--  Header Start -->
@include('dashboard.include.nav')



      <!--  Header End -->
@yield('contact')
    </div>
  </div>



@include('dashboard.include.button')