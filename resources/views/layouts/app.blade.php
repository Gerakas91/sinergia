<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset( '/img/apple-icon.png' ) }}">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title', config('app.name'))</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('/css/now-ui-dashboard.css?v=1.0.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('/demo/demo.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-confirm.css') }}" />
    @yield('styles')
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar font-menu" data-color="orange" data-image="https://pz-3-gatorwraps.netdna-ssl.com/wp-content/uploads/2015/08/sidebar-background-3-min.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="" class="simple-text logo-mini">
                    PR
                </a>
                <a href="" class="simple-text logo-normal">
                    Prueba Aspirante
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                        <li>
                            <a data-toggle="collapse" href="#componentsExamples4">
                                <i class="fa fa-users"></i>
                                <p>Pacientes<b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse" id="componentsExamples4">
                                <ul class="nav">
                                    <li>
                                        <a href="{{ url('/paciente/create') }}">
                                            <i class="fa fa-user-plus submenu"></i>
                                            <span class="sidebar-normal"> Nuevo Paciente </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('paciente') }}">
                                            <i class="fa fa-eye submenu"></i>
                                            <span class="sidebar-normal"> Ver Pacientes </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand">@yield('titulo-contenido','pagina')</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <!-- <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form> -->
                        <ul class="navbar-nav">

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <!-- yield del header es cambiante -->
            @yield('header-class')

            <div class="content">
                @yield('contenido')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul>
                            <li>
                                <a href="">
                                    Acerca De
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Mis Proyectos
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Diseñado Por
                        <a href="#" target="_blank">Gerardo Losada</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="{{ asset('/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('/js/core/popper.min.js') }}"></script>
<script src="{{ asset('/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Chart JS -->
<script src="{{ asset('/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('/js/now-ui-dashboard.js?v=1.0.1') }}"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('/demo/demo.js') }}"></script>
<script src="{{ asset('/demo/jquery.sharrre.js') }}"></script>
<!-- plugin js para eliminar registros -->
<script src="{{ asset('/js/jquery-confirm.js') }}" type="text/javascript"></script>
<!-- LOS NUEVOS SCRIPTS -->
<script src="{{ asset('/js/plugins/moment.min.js') }}"></script>
<script src="{{ asset('/js/plugins/bootstrap-datetimepicker.js') }}"></script>
<script src="{{ asset('/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('/js/plugins/bootstrap-selectpicker.js') }}"></script>
<script src="{{ asset('/js/plugins/bootstrap-switch.js') }}"></script>
<script src="{{ asset('/js/plugins/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('/js/plugins/fullcalendar.min.js') }}"></script>
<script src="{{ asset('/js/plugins/jasny-bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
<script src="{{ asset('/js/plugins/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/js/plugins/jquery-jvectormap.js') }}"></script>
<script src="{{ asset('/js/plugins/nouislider.min.js') }}"></script>
<script src="{{ asset('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('/js/plugins/sweetalert2.min.js') }}"></script>
 <!-- Google Maps Plugin
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS-rmXg8BxyY1KtI2N3s7h86kOhzZQvI8&callback=initMap"></script> -->
<!-- <script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initGoogleMaps();
    });
</script> -->
<!-- <script>
    //hacer los submenus activos
    // $(document).ready(function() {
        var header = document.getElementById("componentsExamples");
        var btns = header.getElementsByClassName("nav-item");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    // });
</script> -->
@yield('scripts')

</html>