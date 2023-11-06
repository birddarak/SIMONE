<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal"
                    data-target="#appsModal"><i class="ik ik-grid"></i></button>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="avatar" src="{{ Auth::user()->profile_photo_url }}" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="pages/profile.html"><i class="ik ik-user dropdown-icon"></i>
                            Profile</a>
                        <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i>
                            Settings</a>
                        <form id="logout-navbar" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="dropdown-item" style="cursor: pointer;"
                                onclick="document.getElementById('logout-navbar').submit()"><i
                                    class="ik ik-power dropdown-icon"></i>Logout</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
