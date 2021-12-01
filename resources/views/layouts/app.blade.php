<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - TechLife Columbus </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


   
</head>
<body >
    







 <div id="main-wrapper">
 <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="images/logo.png" alt="">
                <img class="logo-compact" src="images/logo-text.png" alt="">
                <img class="brand-title" src="images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


         <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>

                                @if(Request::is('admin_events') || Request::is('search_events') || Request::is('admin_interests') || Request::is('search_interests') || Request::is('/') || Request::is('search_users') || Request::is('admin_user_interests') || Request::is('search_user_interests'))
                                <div class="dropdown-menu p-0 m-0">
                                    @if(Request::is('admin_events') || Request::is('search_events'))
                                    <form action="{{ route('search_events') }}" method="get">
                                    @endif

                                    @if(Request::is('admin_interests') || Request::is('search_interests'))
                                    <form action="{{ route('search_interests') }}" method="get">
                                    @endif


                                    @if(Request::is('/') || Request::is('search_users'))
                                    <form action="{{ route('search_users') }}" method="get">
                                    @endif
                                  

                                    @if(Request::is('admin_user_interests') || Request::is('search_user_interests'))
                                    <form action="{{ route('search_user_interests') }}" method="get">
                                    @endif
                                   
                                    @if(Request::is('admin_user_interests') || Request::is('search_user_interests'))
                                    
                                    <input class="form-control" type="number" name="search" placeholder="Search By Interest ID" aria-label="Search">
                                    
                                    @else
                                        <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">

                                    @endif
                                  

                                  
                                    
                                    </form>
                                    
                                </div>
                                @endif
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-user-circle" style="font-size:40px;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('admin_profile') }}" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                   
                                    <a href="{{ route('logout') }}" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

         <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav" >
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu"  >
                   
                

                
               

                    
                    <li><a href="{{ route('admin_home') }}" aria-expanded="false"><i class="fa fa-home"></i><span
                                class="nav-text">Home</span></a></li>
                  
                  
                                <li><a href="{{ route('admin_events') }}" aria-expanded="false"><i class="fa fa-calendar"></i><span
                                class="nav-text">Events</span></a></li>



                                <li><a href="{{ route('admin_interests') }}" aria-expanded="false"><i class="fa fa-book"></i><span
                                class="nav-text">Interests</span></a></li>



                                <li><a href="{{ route('admin_user_interests') }}" aria-expanded="false"><i class="fa fa-user"></i><span
                                class="nav-text">User Interests</span></a></li>

                           


                                




                               
                   
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    <br>
    <br>
    <br>
    <br>
    

        @if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <center>
        {{ session('status') }}
        </center>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    
 @endif

@yield('content')


</div>




<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
    <script src="js/quixnav-init.js"></script>
    <script src="js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morris/morris.min.js"></script>


    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="vendor/flot/jquery.flot.js"></script>
    <script src="vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="js/dashboard/dashboard-1.js"></script>

</body>
</html>