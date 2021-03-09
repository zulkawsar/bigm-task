<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="mfbl">
        <link rel="shortcut icon" href="{{asset('favico.png')}}">
        <title>MFBL | login</title>
        @include('backend.common.includes.style')
        <style type="text/css">
            .help-block{
                color: #cd0000;
            }
        </style>
    </head>

    <body class="authentication-bg authentication-bg-pattern d-flex align-items-center">

        <div class="home-btn d-none d-sm-block">
            <a href="{{url('/')}}"><i class="fas fa-home h2 text-white"></i></a>
        </div>
        
        <div class="account-pages w-100 mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <a href="javascript:void(0)">
                                        <span><img src="{{asset('logo.png')}}" alt="" height="80"></span>
                                    </a>
                                    <h3 class="mt-2">Welcome Back</h3>

                                </div>

                                <form id="auth_validation" action="{{route('login.store')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required value="{{old('email')}}" placeholder="Enter your email">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" required id="password" placeholder="Enter your password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        @include('backend.common.includes.script')
        
        <script src="{{asset('backend/assets/libs/parsleyjs/parsley.min.js')}}"></script>
        <script type="text/javascript">
            $('#auth_validation').parsley()
        </script>
    </body>
</html>