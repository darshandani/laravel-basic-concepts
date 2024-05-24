<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="backend/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>
        @yield('title')
    </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{!! asset('backend/img/favicon/favicon.ico') !!}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons {!! asset('backend/') !!} -->
    <link rel="stylesheet" href="{!! asset('backend/vendor/fonts/fontawesome.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/fonts/tabler-icons.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/fonts/flag-icons.css') !!}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{!! asset('backend/vendor/css/rtl/core.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/css/rtl/theme-default.css') !!}"/>
    <link rel="stylesheet" href="{!! asset('backend/css/demo.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/css/pages/page-auth.css') !!}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{!! asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/libs/node-waves/node-waves.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/libs/typeahead-js/typeahead.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/libs/apex-charts/apex-charts.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/libs/swiper/swiper.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') !!}" />
    <link rel="stylesheet" href="{!! asset('backend/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') !!}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{!! asset('backend/vendor/css/pages/cards-advance.css') !!}" />
    <!-- Helpers -->
    <script src="{!! asset('backend/vendor/js/helpers.js') !!}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{!! asset('backend/vendor/js/template-customizer.js') !!}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{!! asset('backend/js/config.js') !!}"></script>
</head>

<body>
    @yield('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <!-- / Menu -->

            <!-- Layout container -->
                <!-- Navbar -->



                <!-- / Navbar -->

                <!-- Content wrapper -->
                
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{!! asset('backend/vendor/libs/jquery/jquery.js') !!}"></script>
    <script src="{!! asset('backend/vendor/libs/popper/popper.js') !!}"></script>
    <script src="{!! asset('backend/vendor/js/bootstrap.js') !!}"></script>
    <script src="{!! asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') !!}"></script>
    <script src="{!! asset('backend/vendor/libs/node-waves/node-waves.js') !!}"></script>

    <script src="{!! asset('backend/vendor/libs/hammer/hammer.js') !!}"></script>
    <script src="{!! asset('backend/vendor/libs/i18n/i18n.js') !!}"></script>
    <script src="{!! asset('backend/vendor/libs/typeahead-js/typeahead.js') !!}"></script>

    <script src="{!! asset('backend/vendor/js/menu.js') !!}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{!! asset('backend/vendor/libs/apex-charts/apexcharts.js') !!}"></script>
    <script src="{!! asset('backend/vendor/libs/swiper/swiper.js') !!}"></script>
    <script src="{!! asset('backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') !!}"></script>

    <!-- Main JS -->
    <script src="{!! asset('backend/js/main.js') !!}"></script>

    <!-- Page JS {!! asset('') !!}backend -->
    <script src="{!! asset('backend/js/dashboards-analytics.js') !!}"></script>
</body>

</html>