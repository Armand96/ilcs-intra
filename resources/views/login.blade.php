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
                                        <img src="{{ URL::asset('assets/images/logo-sm-dark.png') }}" height="50"
                                            alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Lets Get Started Dastone</h4>
                                    <p class="text-muted  mb-0">Sign in to continue to Dastone.</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav-border nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#LogIn_Tab"
                                            role="tab">Log In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#Register_Tab"
                                            role="tab">Register</a>
                                    </li>
                                </ul>
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
                                                        <label class="form-check-label" for="remember"> Remember me
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-sm-6 text-end">

                                                    <a href="" class="text-muted">Forgot password?</a>

                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light"
                                                        type="submit">Log In <i
                                                            class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->
                                        </form>
                                        <!--end form-->
                                        <div class="m-3 text-center text-muted">
                                            <p class="mb-0">Do not have an account ? <a href=""
                                                    class="text-primary ms-2">Free Register</a></p>
                                        </div>
                                        <div class="account-social">
                                            <h6 class="mb-3">Or Login With</h6>
                                        </div>
                                        <div class="btn-group w-100">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary">Facebook</button>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary">Twitter</button>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary">Google</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane px-3 pt-3" id="Register_Tab" role="tabpanel">

                                        <div class="alert alert-success text-center">
                                            alert success
                                        </div>

                                        <form class="form-horizontal auth-form" method="POST" action=""
                                            enctype="multipart/form-data">
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="username">Username</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        value="{{ old('name') }}" id="username" name="name"
                                                        autofocus placeholder="Enter username">

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>error</strong>
                                                    </span>

                                                </div>
                                            </div>


                                            <div class="form-group mb-2">
                                                <label class="form-label" for="useremail">Email</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control " id="useremail"
                                                        value="{{ old('email') }}" name="email"
                                                        placeholder="Enter email" autofocus>

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>error</strong>
                                                    </span>

                                                </div>
                                            </div>


                                            <div class="form-group mb-2">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control " id="userpassword"
                                                        name="password" placeholder="Enter password" autofocus>

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>message</strong>
                                                    </span>

                                                </div>
                                            </div>


                                            <div class="form-group mb-2">
                                                <label class="form-label" for="conf_password">Confirm Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control " id="confirmpassword"
                                                        name="password_confirmation"
                                                        placeholder="Enter Confirm password" autofocus>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>message</strong>
                                                    </span>
                                                </div>
                                            </div>


                                            <div class="form-group mb-2">
                                                <label class="form-label" for="mo_number">Mobile Number</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mo_number"
                                                        name="mobilenumber" placeholder="Enter Mobile Number"
                                                        autofocus>

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>message</strong>
                                                    </span>

                                                </div>
                                            </div>


                                            <div class="from-group mb-2">
                                                <label class="form-label" for="avatar">Profile Picture</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control is-invalid "
                                                        id="inputGroupFile02" name="avatar" autofocus>
                                                    <label class="input-group-text"
                                                        for="inputGroupFile02">Upload</label>

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>

                                                </div>
                                            </div>

                                            <div class="form-group row my-3">
                                                <div class="col-sm-12">
                                                    <div class="custom-control custom-switch switch-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitchSuccess2">
                                                        <label class="form-label text-muted"
                                                            for="customSwitchSuccess2">You agree to the Dastone <a
                                                                href="#" class="text-primary">Terms of
                                                                Use</a></label>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light"
                                                        type="submit">Register <i
                                                            class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->
                                        </form>
                                        <!--end form-->
                                        <p class="my-3 text-muted">Already have an account ? <a href=""
                                                class="text-primary ms-2">Log in</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body bg-light-alt text-center">
                                <span class="text-muted d-none d-sm-inline-block">Mannatthemes ©
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
