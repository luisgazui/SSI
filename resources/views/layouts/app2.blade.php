<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>InfyOm Generator</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/skins/_all-skins.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">    
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="/public/css/bootstrap-select.min.css">
    

</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <b>InfyOm</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">
                                      @if (Auth::guest())
                                        InfyOm
                                    @else
                                    {!! Auth::user()->name !!}
                                    @endif
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        @if (Auth::guest())
                                            InfyOm
                                        @else
                                            {!! Auth::user()->name !!}
                                        @endif
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    InfyOm Generator
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{!! url('/login') !!}">Login</a></li>
                        <li><a href="{!! url('/register') !!}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- jQuery 2.1.4 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/js/app.min.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <!--Select-->
    <script src="/public/js/bootstrap-select.min.js"></script>
    <script src="/public/js/defaults-es_CL.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#areasFisicas-table').dataTable( {
            dom: 'Bfrtip',
        buttons: [
            {
                extend:'csv',
                title:'Areas_Fisicas'
            }, 
            {
                extend:'excel',
                title: 'Areas_Fisicas'
                 
            }, 
            {
                extend:'pdf',
                title: 'Areas_Fisicas'
            }
        
                ],
        "columnDefs": [{
            "targets": 'nosort',
                        "orderable" : false,
                        "searchable": false,
                        "printable" : false,
                        "exportable" : false
        }]
       });
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#Enabled').bootstrapToggle();
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#departamentosProses-table').dataTable( {
        
        dom: 'Bfrtip',
        buttons: [
            {
                extend:'csv',
                title:'Departamentos_Prose'
            }, 
            {
                extend:'excel',
                title: 'Departamentos_Prose'
                 
            }, 
            {
                extend:'pdf',
                title: 'Departamentos_Prose'
            }
        
                ],
        "columnDefs": [{
            "targets": 'nosort',
                        "orderable" : false,
                        "searchable": false,
                        "printable" : false,
                        "exportable" : false
        
                       }]
        
       
        
       });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#perfilesProses-table').dataTable( {
        
        dom: 'Bfrtip',
        buttons: [
            {
                extend:'csv',
                title:'Perfiles_Prose'
            }, 
            {
                extend:'excel',
                title: 'Perfiles_Prose'
                 
            }, 
            {
                extend:'pdf',
                title: 'Perfiles_Prose'
            }
        
                ],
        "columnDefs": [{
            "targets": 'nosort',
                        "orderable" : false,
                        "searchable": false,
                        "printable" : false,
                        "exportable": false
        
                       }]
        
       
        
       });

    });
</script>

    @yield('scripts')
</body>
</html>
