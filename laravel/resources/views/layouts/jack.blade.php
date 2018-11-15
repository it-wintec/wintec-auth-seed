<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'title of template') }}</title>



    <link href="//fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <style>
        * { font-family : 'Abel', sans-serif; }
        a,
        a:hover,
        a:focus {
            color           : inherit;
            text-decoration : none;
            transition      : all 0.3s;
        }
        .navbar {
            padding       : 8px 10px;
            background    : #fff;
            border        : none;
            border-radius : 0;
            margin-bottom : 40px;
            box-shadow    : 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
        .navbar-btn {
            box-shadow : none;
            outline    : none !important;
            border     : none;
        }
        .line {
            width         : 100%;
            height        : 1px;
            border-bottom : 1px dashed #ddd;
            margin        : 40px 0;
        }
        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */

        .wrapper {
            display : flex;
            width   : 100%;
        }
        #sidebar {
            width      : 250px;
            position   : fixed;
            top        : 0;
            left       : 0;
            height     : 100vh;
            z-index    : 999;
            background : #7386D5;
            color      : #fff;
            transition : all 0.3s;
        }
        #sidebar.active {
            margin-left : -250px;
        }
        #sidebar .sidebar-header {
            padding    : 20px;
            background : #6d7fcc;
        }
        #sidebar ul.components {
            padding       : 20px 0;
            border-bottom : 1px solid #47748b;
        }
        #sidebar ul p {
            color   : #fff;
            padding : 10px;
        }
        #sidebar ul li a {
            padding   : 10px;
            font-size : 1.1em;
            display   : block;
        }
        #sidebar ul li a:hover {
            color      : #7386D5;
            background : #fff;
        }
        #sidebar ul li.active > a,
        a[aria-expanded="true"] {
            color      : #fff;
            background : #6d7fcc;
        }
        a[data-toggle="collapse"] {
            position : relative;
        }
        .dropdown-toggle::after {
            display   : block;
            position  : absolute;
            top       : 50%;
            right     : 20px;
            transform : translateY(-50%);
        }
        ul ul a {
            font-size    : 0.9em !important;
            padding-left : 30px !important;
            background   : #6d7fcc;
        }
        ul.CTAs {
            padding : 20px;
        }
        ul.CTAs a {
            text-align    : center;
            font-size     : 0.9em !important;
            display       : block;
            border-radius : 5px;
            margin-bottom : 5px;
        }
        a.download {
            background : #fff;
            color      : #7386D5;
        }
        a.article,
        a.article:hover {
            background : #6d7fcc !important;
            color      : #fff !important;
        }
        /* ---------------------------------------------------
            NAVBAR TOP STYLE
        ----------------------------------------------------- */
        .navbar-nav-top, .navbar-nav-top a { color : rgba(0, 0, 0, .5) }
        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */
        #content {
            width      : calc(100% - 250px);
            padding    : 66px 10px;
            min-height : 100vh;
            transition : all 0.3s;
            position   : absolute;
            top        : 0;
            right      : 0;
        }
        #content.active {
            width : 100%;
        }
        /* ---------------------------------------------------
            MEDIA QUERIES
        ----------------------------------------------------- */

        @media (max-width : 768px) {
            #sidebar {
                margin-left : -250px;
            }
            #sidebar.active {
                margin-left : 0;
            }
            #content {
                width : 100%;
            }
            #content.active {
                width : calc(100% - 250px);
            }
            #sidebarCollapse span {
                display : none;
            }
        }
    </style>
    @yield('style')

</head>
<body>

<div class="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3></h3>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="javascript:void(0);">Dashboard</a>
            </li>
            <li>
                <a href="/admin/config">Config</a>
            </li>
            <li>
                <a href="/admin/booking">Bookings</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="/" class="download">Home Page</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <nav class="navbar fixed-top navbar-light bg-light">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span> {{ config('app.name', '模板里面的title') }}</span>
            </button>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav-top mb-0 list-inline">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item list-inline-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item list-inline-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @else
                    <li class="nav-item list-inline-item">{{ Auth::user()->name }} </li>
                    <li class="nav-item list-inline-item">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>
                    @endguest
            </ul>
        </nav>

        @yield('content')
    </div>

</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="//code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
@yield('script')
</body>
</html>
