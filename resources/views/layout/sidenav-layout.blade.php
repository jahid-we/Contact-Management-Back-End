<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title></title>

    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/toastify.min.css') }}" rel="stylesheet" />


    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css') }}"
        rel="stylesheet" />

    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


    <script src="{{ asset('js/toastify-js.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>




</head>

<body>

    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <nav class="navbar fixed-top px-0 shadow-sm bg-white">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                    <img class="nav-logo-sm mx-2" src="{{ asset('images/menu.svg') }}" alt="logo" />
                </span>
                <span
                    style="color: rgb(169, 0, 99) ;  font-weight: bold; font-size: 1.3rem; font-family: 'Arial', sans-serif;">C
                    <span style="text-decoration: underline; font-size: 30px">M</span> S</span>
                <!-- Replaced logo with CMS text -->
            </a>

            <div class="float-right h-auto d-flex">
                <div class="user-dropdown">
                    <img class="icon-nav-img" src="{{ asset('images/user.webp') }}" alt="" />
                    <div class="user-dropdown-content ">
                        <div class="mt-4 text-center">
                            <img class="icon-nav-img" id="userImg" src="{{ asset('images/user.webp') }}" alt="" />
                            <h6>User Name</h6>
                            <hr class="user-dropdown-divider  p-0" />
                        </div>
                        <a href="{{ url('/api/userProfile') }}" class="side-bar-item">
                            <span class="side-bar-item-caption">Profile</span>
                        </a>
                        <a href="{{ url('/api/passwordChange') }}" class="side-bar-item">
                            <span class="side-bar-item-caption">Change Password</span>
                        </a>
                        <a href="{{ url('/api/user-logout') }}" class="side-bar-item">
                            <span class="side-bar-item-caption">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div id="sideNavRef" class="side-nav-open">

        <a href="{{ url('/api/dashboard') }}" class="side-bar-item">
            <i class="fas fa-tachometer-alt"></i> <!-- Replacing with Font Awesome Tachometer Alt icon -->
            <span class="side-bar-item-caption">Dashboard</span>
        </a>


        <a href="{{ url('/') }}" class="side-bar-item">
            <i class="fas fa-home"></i> <!-- Replacing with Font Awesome Home icon -->
            <span class="side-bar-item-caption">Return Home</span>
        </a>

        <a href="#" class="side-bar-item dropdown-toggle" id="contactDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-people"></i>
            <span class="side-bar-item-caption">Contact</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="contactDropdown">
            <a class="dropdown-item" href="{{ url('/api/contact') }}">
                <i class="fa fa-cogs me-2"></i> <!-- Font Awesome icon for settings -->
                Manage Contacts
            </a>
        </div>

        {{-- *************************** --}}

        <a href="#" class="side-bar-item dropdown-toggle" id="contactDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-users"></i> <!-- Replacing with Font Awesome Users icon -->
            <span class="side-bar-item-caption"> Contact's PDF</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="contactDropdown">
            <a class="dropdown-item" href="{{ url('/api/reportPage') }}">
                <i class="fas fa-file-pdf me-2"></i> <!-- Replacing with Font Awesome PDF icon -->
                Download PDF Report
            </a>
        </div>


        {{-- <a href="{{url("/categoryPage")}}" class="side-bar-item">
        <i class="bi bi-list-nested"></i>
        <span class="side-bar-item-caption">Category</span>
    </a>

    <a href="{{url("/productPage")}}" class="side-bar-item">
        <i class="bi bi-bag"></i>
        <span class="side-bar-item-caption">Product</span>
    </a>

    <a href="{{url('/salePage')}}" class="side-bar-item">
        <i class="bi bi-currency-dollar"></i>
        <span class="side-bar-item-caption">Create Sale</span>
    </a>

    <a href="{{url('/invoicePage')}}" class="side-bar-item">
        <i class="bi bi-receipt"></i>
        <span class="side-bar-item-caption">Invoice</span>
    </a>

    <a href="{{url('/reportPage')}}" class="side-bar-item">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">Report</span>
    </a> --}}


    </div>


    <div id="contentRef" class="content">
        @yield('content')
    </div>



    <script>
        function MenuBarClickHandler() {
            let sideNav = document.getElementById('sideNavRef');
            let content = document.getElementById('contentRef');
            if (sideNav.classList.contains("side-nav-open")) {
                sideNav.classList.add("side-nav-close");
                sideNav.classList.remove("side-nav-open");
                content.classList.add("content-expand");
                content.classList.remove("content");
            } else {
                sideNav.classList.remove("side-nav-close");
                sideNav.classList.add("side-nav-open");
                content.classList.remove("content-expand");
                content.classList.add("content");
            }
        }
    </script>

</body>

</html>
