<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="BGIM" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/logo.png')}}">

    @include('backend.common.includes.style')

    <style type="text/css">
        .content-page{
            margin-left: 10px;
        }
        .hide{
            display: none;
        }
    </style>
</head>
<body class="">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    
                    @yield('content')

                    
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('web.common.footer')

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    @include('web.common.includes.script')

</body>
</html>