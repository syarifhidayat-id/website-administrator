
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') &raquo; Website Administrator</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Icon -->
    <link rel="icon" type="image/png" href="{{ asset('styles/images/logo/logo.png') }}"/>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('styles/plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('styles/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('styles/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('styles/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('styles/plugins/iCheck/flat/blue.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('styles/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap" rel="stylesheet">
    <!-- Preload -->
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/preload.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('styles/vendor/sweetalert2/bootstrap-4.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Images --}}
    <link rel="stylesheet" href="{{ asset('vendor/images/image-uploader.min.css') }}">

    <link rel="stylesheet" href="{{ asset('styles/vendor/fancybox/jquery.fancybox.css') }}">
    @yield('style')

    @livewireStyles
</head>

<body class="hold-transition skin-yellow fixed sidebar-mini">

    @include('layouts.preload')

    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            @if (auth()->user()->type == 'admin')
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <span class="logo-mini">WA</span>
                <span class="logo-lg">Website Administrator</span>
            </a>
            @else
            <a href="{{ route('user.dashboard') }}" class="logo">
                <span class="logo-mini">WA</span>
                <span class="logo-lg">Website Administrator</span>
            </a>
            @endif
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{-- <img src="{{ url('storage/foto/'.Auth::user()->foto) }}" class="user-image" alt="User Image"> --}}
                                <img src="{{ Auth::user()->profile_photo_url }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <div class="box-widget widget-user">
                                    <div class="widget-user-header text-white" style="background: url('{{ asset('styles/images/photo4.jpg') }}') center center;"></div>
                                    <div class="widget-user-image">
                                        {{-- <img class="img-circle" src="{{ url('storage/foto/'.Auth::user()->foto) }}" alt="User Avatar"> --}}
                                        <img class="img-circle" src="{{ Auth::user()->profile_photo_url }}" alt="User Avatar">
                                    </div>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-xs-12 text-left">
                                                <strong>PENGGUNA</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 text-left">
                                                <p>{{ Auth::user()->username }}</p>
                                            </div>
                                            <div class="col-xs-6 text-right">
                                                <a href="#" class="btn bg-yellow btn-sm"><i class="fa fa-cog"></i></a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 text-left">
                                                <strong>NAMA</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 text-left">
                                                <p>{{ Auth::user()->name }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 text-left">
                                                <strong>LEVEL</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 text-left">
                                                <p>{{ Auth::user()->type == '0' ? 'User' : 'Admin' }}</p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="pull-center">
                                            <a class="btn bg-red btn-block" href="{{ route('logout.store') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                <i class="mdi mdi-logout mr-2 text-primary"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout.store') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        {{-- <img src="{{ url('storage/foto/'.Auth::user()->foto) }}" class="img-circle" alt="User Image"> --}}
                        <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-green"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="{{ (Request::is('user/dashboard') or Request::is('admin/dashboard')) ? 'active' : ''}}">
                        <a href="@if (auth()->user()->type == 'admin') {{ url('admin/dashboard') }} @else  {{ url('user/dashboard') }} @endif"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>

                    <li class="header" style="color: #ffffff">MAIN NAVIGATION</li>
                    <li class="{{ (Request::is('user/manage-member') or Request::is('admin/manage-member') or Request::is('admin/manage-member*create') or Request::is('admin/manage-member*edit')) ? 'active' : '' }}">
                        <a href="@if(Auth::user()->type == 'admin') {{ route('admin.manage-member.index') }} @else {{ route('user.manage-member.index') }} @endif"><i class="fa fa-user"></i> <span>Data Member</span></a>
                    </li>
                    <li class="{{ (Request::is('user/list-member') or Request::is('admin/list-member')) ? 'active' : '' }}">
                        <a href="@if(Auth::user()->type == 'admin') {{ route('admin.list.member') }} @else {{ route('user.list.member') }} @endif"><i class="fa fa-user"></i> <span>List Member Json</span></a>
                    </li>
                </ul>
            </section>
        </aside>

        @yield('content')

        <footer class="main-footer">
            Copyright &copy; 2024 <strong><a href="#" class="text-yellow">Website Administrator</a></strong>. All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="{{ asset('styles/vendor/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('styles/vendor/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('styles/vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('styles/vendor/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('styles/vendor/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('styles/vendor/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('styles/vendor/bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('styles/vendor/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('styles/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('styles/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('styles/vendor/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('styles/vendor/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('styles/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('styles/vendor/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('styles/vendor/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('styles/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('styles/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('styles/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('styles/vendor/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('styles/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('styles/vendor/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('styles/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('styles/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('styles/vendor/bower_components/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('styles/vendor/bower_components/chart.js/Chart.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('styles/vendor/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('styles/js/adminlte.min.js') }}"></script>
    {{-- Preloader --}}
    <script src="{{ asset('styles/vendor/preloader.js') }}"></script>
    {{-- Sweetalert2 --}}
    <script src="{{ asset('styles/vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('styles/vendor/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('vendor/images/image-uploader.min.js') }}"></script>

    <script src="{{ asset('styles/vendor/fancybox/jquery.fancybox.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tb').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                'responsive'  : true
            })

            $('.datepicker').datepicker({
                singleDatePicker: true,
                showDropdowns: true,
                format: 'yyyy-mm-dd'
            })

            $('.timepicker').timepicker({
                showInputs: false
            })

            $('.select2').select2()
        });
    </script>

    @yield('script')
    @livewireScripts
</body>

</html>

