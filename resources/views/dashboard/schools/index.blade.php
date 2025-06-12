
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>taqieem</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="#">
          <img src="../images/logo.png"  alt="" width="150">
        </a>

        
      </div>

    </div>

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-6"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                        <i class="ti ti-atom"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- Dashboard Sections -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users.parents') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Parents</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('schools.manage') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-school"></i>
                            </span>
                            <span class="hide-menu">Schools</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('contacts.index') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-mail"></i>
                            </span>
                            <span class="hide-menu">Contacts</span>
                        </div>
                    </a>
                </li>
                
                <!-- Front Pages Section -->
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-layout-grid"></i>
                            </span>
                            <span class="hide-menu">Front Pages</span>
                        </div>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-home"></i>
                                    </div>
                                    <span class="hide-menu">Homepage</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/about">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-info-circle"></i>
                                    </div>
                                    <span class="hide-menu">About Us</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/contact">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-mail"></i>
                                    </div>
                                    <span class="hide-menu">Contact Us</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Logout -->
                <li class="sidebar-item">
                 <a class="sidebar-link" href="{{ route('logout') }}">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-logout"></i>
                            </span>
                            <span class="hide-menu">Logout</span>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">



      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">

          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
               
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" clas="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>



<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold">School Management</h5>
                <a href="{{ route('schools.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i> Add New School
                </a>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">School Name</th>
                            <th class="border-bottom-0">Location</th>
                            <th class="border-bottom-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schools as $school)
                        <tr>
                            <td class="border-bottom-0">{{ $loop->iteration }}</td>
                            <td class="border-bottom-0">{{ $school->name }}</td>
                            <td class="border-bottom-0">{{ $school->location }}</td>
                            <td class="border-bottom-0">
                                <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-sm btn-primary">
                                    <i class="ti ti-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $schools->links() }}
            </div>
        </div>
    </div>
</div>
    </div>
  </div>

  
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>