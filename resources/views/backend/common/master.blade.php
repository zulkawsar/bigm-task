<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>BIGM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="mfbl" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/logo.png')}}">

    @include('backend.common.includes.style')
</head>
<body class="">

    <!-- Begin page -->
    <div id="wrapper">

        @include('backend.common.topbar')

        @include('backend.common.sidebar')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    
                    @if(\Request::route()->getName() == 'admin.dashboard')
                    
                    @else
                        @include('backend.common.includes.breadcrumb')
                    @endif

                    @yield('content')

                    
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('backend.common.footer')

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    @include('backend.common.includes.script')

</body>
</html>