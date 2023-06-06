<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href=""><i class="mdi mdi-buffer text-primary"></i> {{ env('APP_NAME') }}
        </a>
        <a class="navbar-brand brand-logo-mini" href=""><i class="mdi mdi-buffer text-primary"></i>
            {{ env('APP_ST_NAME') }}</a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">


            {{-- <li class="nav-item nav-profile dropdown">{{ $user[0]->name }} &NonBreakingSpace; <a class="nav-link dropdown-toggle" href="#"
                    data-toggle="dropdown" id="profileDropdown">
                    <img src="https://via.placeholder.com/30x30" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <div class="dropdown-divider"></div>
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item"> <i class="mdi mdi-logout text-primary"></i> Logout</button>
                    </form>
                </div>
            </li> --}}
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
