<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Akome app</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('js/datatables/datatables.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('js/fuelux/fuelux.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('js/select2/select2.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('js/select2/theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/print.css') }}" type="text/css" media="print">
    <!--[if lt IE 9]>
    <script src="{{ asset('js/ie/html5shiv.js') }}"></script>
    <script src="{{ asset('js/ie/respond.min.js') }}"></script>
    <script src="{{ asset('js/ie/excanvas.js') }}"></script>
    <![endif]-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
        <div class="navbar-header aside-md">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                <i class="fa fa-bars"></i>
            </a>
            <a href="#" class="navbar-brand" style="color: #fb6b5b; font-weight: 200" data-toggle="fullscreen">Akome <span style="font-size: 15px; color: rgb(101, 189, 119); font-weight: 900">DOMINICAN</span></a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                <i class="fa fa-cog"></i>
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle-l" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <b>Notification</b>
                </a>
                <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">
                    <li class="dropdown-header">No notifications</li>
                </ul>
            </li>

            <li class="hidden-xs"><a href="#" class="dropdown-toggle"> <b>Admin</b></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInRight">
                    <span class="arrow top"></span>

                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" >Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-dark lter aside-md hidden-print" id="nav">
                <section class="vbox">

                    <section class="w-f scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                            <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav">
                                    <li  class="active">
                                        <a href="{{ route('waiter.index') }}"   class="active">
                                            <i class="fa fa-dashboard icon">
                                                <b class="bg-danger"></b>
                                            </i>
                                            <span>Workset</span>
                                        </a>
                                    </li>
                                    <li >
                                        <a href=""  >
                                            <i class="fa fa-shopping-cart icon">
                                                <b class="bg-warning"></b>
                                            </i>
                                            <span class="pull-right">
                                                <i class="fa fa-angle-down text"></i>
                                              <i class="fa fa-angle-up text-active"></i>
                                            </span>
                                            <span>Order</span>
                                        </a>
                                        <ul class="nav lt">
                                            <li >
                                                <a href="{{ route('waiter.create') }}" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>New Order</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="{{ route('table.edit_order') }}" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Edit Order</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="{{ url('admin/bartender') }}" >
                                            <i class="fa fa-beer"><b class="bg-warning"></b></i>
                                            <span>Bartender</span>
                                        </a>
                                    </li>
                                    <li >
                                        <a href="{{ url('admin/kitchen') }}" >
                                            <i class="fa fa-cutlery"><b class="bg-warning"></b></i>
                                            <span>Kitchen</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href=""  >
                                            <i class="fa fa-bars icon">
                                                <b class="bg-info"></b>
                                            </i>
                                            <span class="pull-right">
                                                <i class="fa fa-angle-down text"></i>
                                                <i class="fa fa-angle-up text-active"></i>
                                            </span>
                                            <span>Setting</span>
                                        </a>
                                        <ul class="nav lt">
                                             <li >
                                                <a href="{{ route('user.index') }}" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Users</span>
                                                </a>
                                            </li>
                                        </ul>
                                            
                                        <ul class="nav lt">
                                             <li >
                                                <a href="{{ route('business.index') }}" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Business</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <ul class="nav lt">
                                             <li >
                                                <a href="{{ route('product.index') }}" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Product</span>
                                                </a>
                                            </li>
                                        </ul>

                                    </li>
                                    <li >
                                        <a href="{{ route('logout') }}" >
                                            <i class="fa fa-angle-right"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- / nav -->
                        </div>
                    </section>

                    <footer class="footer lt hidden-xs b-t b-dark">
                        <div id="chat" class="dropup">
                            <section class="dropdown-menu on aside-md m-l-n">
                                <section class="panel bg-white">
                                    <header class="panel-heading b-b b-light">About</header>
                                    <div class="panel-body animated fadeInRight">
                                        <p class="text-sm">Copyright © {{ date("Y") }} <b>Akome DOMINICAN</b></p>
                                        <p>BY <strong><span style="color: red">Nanji</span><span style="color:green"> Zhao</span></strong></p>
                                    </div>
                                </section>
                            </section>
                        </div>
                        <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                            <i class="fa fa-angle-left text"></i>
                            <i class="fa fa-angle-right text-active"></i>
                        </a>
                        <div class="btn-group hidden-nav-xs">
                            <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#chat"><i class="fa fa-question"></i></button>
                        </div>
                    </footer>
                </section>
            </aside>
            <!-- /.aside -->
            <section id="content">

                @if(Session::has('message'))
                    <div class="alert {{ Session::get('m-class') }} alert-dismissible fade in" style="margin: 20px 30px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Notification:</strong> {{ Session::get('message') }}
                    </div>
                @endif

                @yield('body')

                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
            </section>
        </section>
    </section>
</section>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- App -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/app.plugin.js') }}"></script>
<script src="{{ asset('js/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/fuelux/fuelux.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function () {

        window.setTimeout(function() {
            $(".alert").fadeTo(10000, 0).slideUp(1000, function(){
                $(this).remove();
            });
        }, 5000);

    });

</script>

<script type="text/javascript" src="{{ asset('js/tableExport/tableExport.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tableExport/jquery.base64.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tableExport/jspdf/libs/sprintf.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tableExport/jspdf/jspdf.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tableExport/jspdf/libs/base64.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/select2/select2.min.js') }}"></script>
<script type="text/javascript">
    $('#product_id').select2();
</script>

@yield ('scripts')

</body>
</html>