@extends('master_without_nav')

@section('title') Login @endsection

@section('content')

<body class="account-body accountbg">
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <a href="index" class="logo logo-admin">
                                        <img src="https://www.ilcs.co.id/cfind/source/images/pelindo-solusi-digital-logo-putih.png" height="50"
                                            alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Selamat datang</h4>
                                    <p class="text-muted  mb-0">Silahkan login untuk menggunakan wifi</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
        
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active  p-3" id="LogIn_Tab" role="tabpanel">


                                        <div class="alert alert-success text-center">
                                            message
                                        </div>

                                        <form class="form-horizontal auth-form" method="POST" action="">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="username">Username</label>
                                                <div class="input-group">
                                                    <input name="email" type="email" class="form-control"
                                                        value="" id="username" placeholder="Enter Email"
                                                        autocomplete="email" autofocus>

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>

                                                </div>
                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <div class="input-group">
                                                    <input type="password" name="password" class="form-control "
                                                        id="userpassword" value="123456" placeholder="Enter password"
                                                        aria-label="Password" aria-describedby="password-addon">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row my-3">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch switch-success">
                                                        <input class="form-check-input" type="checkbox" id="remember"
                                                            {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember"> simpan user
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-sm-6 text-end">

                                                    <a href="" class="text-muted">Lupa password ?</a>

                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light"
                                                        type="submit">Log In
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->
                                        </form>
                                        <!--end form-->
                                     
                            
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="card-body bg-light-alt text-center">
                                <span class="text-muted d-none d-sm-inline-block">copyright
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
