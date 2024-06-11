<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Sisipkan CSS dari template utama -->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <!-- Gambar latar belakang -->
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <!-- Form login -->
                            <div class="col-lg-6">
                                <div class="p-5 mt-3 mb-3">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900 mb-4">Welcome To Warehouse!</h1>
                                        <h1 class="h5 text-gray-900 mb-4">Already on your Account?</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <label for="exampleInputUsername">Username</label>
                                            <input type="username" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword">Password</label>
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Enter Password...">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" style="margin-top: 30px;">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sisipkan JavaScript dari template utama -->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>
</body>
</html>
