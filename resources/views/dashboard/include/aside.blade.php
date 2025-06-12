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
 <a href="#" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
  <div class="d-flex align-items-center gap-3">
    <span class="d-flex"><i class="ti ti-logout"></i></span>
    <span class="hide-menu">Logout</span>
  </div>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
  @csrf
</form>

</li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>