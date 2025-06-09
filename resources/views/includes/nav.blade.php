<header class="fixed-top header">
  <!-- top header -->
  <div class="top-header py-2 bg-white">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-4 text-center text-lg-left">
          <a class="text-color mr-3" href="tel:+962790000000"><strong>CALL</strong> +962790000000</a>
          <ul class="list-inline d-inline">
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-github"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
          <ul class="list-inline">
            {{-- <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="/notice">notice</a></li> --}}
            {{-- <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="research.html">research</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="scholarship.html">SCHOLARSHIP</a></li> --}}
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#loginModal" data-toggle="modal" data-target="#loginModal">login</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#signupModal" data-toggle="modal" data-target="#signupModal">register</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a class="navbar-brand" href="/"><img src="images/logo.png" alt="logo" ></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item @@about">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item @@courses">
              <a class="nav-link" href="/ratings">RATINGS</a>
            </li>
            {{-- <li class="nav-item @@events">
              <a class="nav-link" href="events.html">EVENTS</a>
            </li>
            <li class="nav-item @@blog">
              <a class="nav-link" href="blog.html">BLOG</a>
            </li>
            <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="teacher.html">Teacher</a></li>
                <li><a class="dropdown-item" href="teacher-single.html">Teacher Single</a></li>
                <li><a class="dropdown-item" href="notice.html">Notice</a></li>
                <li><a class="dropdown-item" href="notice-single.html">Notice Details</a></li>
                <li><a class="dropdown-item" href="research.html">Research</a></li>
                <li><a class="dropdown-item" href="scholarship.html">Scholarship</a></li>
                <li><a class="dropdown-item" href="course-single.html">Course Details</a></li>
                <li><a class="dropdown-item" href="event-single.html">Event Details</a></li>
                <li><a class="dropdown-item" href="blog-single.html">Blog Details</a></li>
                
                <li class="dropdown-item dropdown dropleft">
                  <a class="dropdown-toggle" href="#" id="navbarDropdownSubmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sub Menu
                  </a>
                  <ul class="dropdown-menu dropdown-submenu" aria-labelledby="navbarDropdownSubmenu">
                    <li><a class="dropdown-item" href="#!">Sub Menu 01</a></li>
                    <li><a class="dropdown-item" href="#!">Sub Menu 02</a></li>
                    <li><a class="dropdown-item" href="#!">Sub Menu 03</a></li>
                  </ul>
                </li>
              </ul>
            </li> --}}
            <li class="nav-item @@contact">
              <a class="nav-link" href="/contact">CONTACT</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>


<!-- Register Modal -->

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content rounded-0 border-0 p-4">
      <div class="modal-header border-0">
        <h3>Register</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
          @csrf
          <input type="text" name="name" class="form-control mb-3" placeholder="Name" value="{{ old('name') }}" required>
          <input type="text" name="phone" class="form-control mb-3" placeholder="Phone" value="{{ old('phone') }}" required>
          <input type="email" name="email" class="form-control mb-3" placeholder="Email" value="{{ old('email') }}" required>
          <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
          <select name="role" class="form-control mb-3" required>
            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select Role</option>
            <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
            <option value="parent" {{ old('role') == 'parent' ? 'selected' : '' }}>Parent</option>
          </select>
          <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content rounded-0 border-0 p-4">
      <div class="modal-header border-0">
        <h3>Login</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
          @csrf
          <input type="email" name="email" class="form-control mb-3" placeholder="Email" value="{{ old('email') }}" required>
          <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>



