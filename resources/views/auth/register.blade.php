<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register - inventaris Sekolah </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="/store/register" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Nama</strong></label>
                                            <input name="nama" type="text" class="form-control" placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input name="email" type="email" class="form-control" placeholder="Masukan email">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input name="password" type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Role</strong></label>
                                            <select name="role" class="form-control">
                                                <option value="user" selected>User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>

                                    <div class="new-account mt-3">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/js/quixnav-init.js')}}"></script>
    <!--endRemoveIf(production)-->
</body>

</html>
