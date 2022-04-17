<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Employees Record Management System for Sikkim">
        <meta name="keywords" content="ems, employees management systems, sikkim ems">
        <meta name="author" content="iambhagatt">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>{{ config('app.name', 'EMS Sikkim') }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet">  

        <!-- FOR DataTables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
 

      
        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/lime.min.css') }}" rel="stylesheet">
        <!-- <link href="{{ asset('assets/css/themes/admin2.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>EMS SIKKIM ...</span>
            </div>
        </div>
        
        <div class="lime-sidebar">
            <div class="lime-sidebar-inner slimscroll">
                @if(Auth::check() && Auth::user()->role == 0)
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        App
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="active"><i class="material-icons">dashboard</i>Dashboard</a>
                    </li>
                    <li class="sidebar-title">
                        Office
                    </li>
                    <li>
                        <a href="{{ route('departments') }}"><i class="material-icons">domain</i>Departments</a>
                    </li>
                    <li>
                        <a href="{{ route('designation') }}"><i class="material-icons">queue</i>Designation</a>
                    </li>
                    <li>
                        <a href="{{ route('cadres') }}"><i class="material-icons">post_add</i>Cadres</a>
                    </li>
                    <li>
                        <a href="{{ route('employees') }}"><i class="material-icons">badge</i>Employees</a>
                    </li>
                    <li class="sidebar-title">
                        EMS Management
                    </li>
                    <li>
                        <a href="{{ route('users') }}"><i class="material-icons">groups</i>Users</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="material-icons">logout</i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                @endif
                @if(Auth::check() && Auth::user()->role == 1)
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        App
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="active"><i class="material-icons">dashboard</i>Dashboard</a>
                    </li>
                    <li class="sidebar-title">
                        Office
                    </li>
                    <li>
                        <a href="{{ route('mod.employees') }}"><i class="material-icons">queue</i>Approvals</a>
                    </li>
                    <li class="sidebar-title">
                        Others
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="material-icons">logout</i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                @endif
                @if(Auth::check() && Auth::user()->role == 2)
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        App
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="active"><i class="material-icons">dashboard</i>Dashboard</a>
                    </li>
                    <li class="sidebar-title">
                        Office
                    </li>
                    <li>
                        <a href="{{ route('data-entry') }}"><i class="material-icons">queue</i>Employees</a>
                    </li>
                    <li class="sidebar-title">
                        Others
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="material-icons">logout</i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                @endif
            </div>
        </div>
        
        <div class="lime-header">
            <nav class="navbar navbar-expand-lg">
                <section class="material-design-hamburger navigation-toggle">
                    <a href="javascript:void(0)" class="button-collapse material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </section>
                <a class="navbar-brand" href="#">{{ config('app.name', 'EMS Sikkim') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="material-icons">keyboard_arrow_down</i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="lime-container">
            <div class="lime-body">
                @yield('body-contents')
            </div>
            <div class="lime-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="footer-text">{{ date('Y') }} © iambhagatt</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Javascripts -->
        <script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/js/lime.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

        <!-- FOR DataTables -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.js"></script>
                
        @yield('footer-contents')
    </body>
</html>