<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    <div class="flex flex-col lg:flex-row w-full h-screen">
        <div class="lg:w-3/6 h-full flex flex-col justify-center items-center bg-login-100">
            <div class="flex-col lg:w-5/6">
                <img src="assets/images/logo/login_logo.svg" alt="tes" class=" mx-auto mt-6 lg:mt-0">
                <form class="background-inner-login text-center mt-4 lg:mt-12 px-12 py-12 lg:px-20 lg:py-20" action="{{ route('login_user') }}">
                    @csrf
                    <h4 class="text-xl lg:text-2xl font-bold text-white">
                        Sign In
                    </h4>
                    <p class="text-sm lg:text-xl mt-4 text-login-text">
                        Welcome back! Please enter your details
                    </p>

                    <div class="mt-12">
                        <div class="mt-3">
                            <p class="text-white text-lg text-left">
                                NIP
                            </p>
                            <input type="text" class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none" placeholder="Enter Your NIP">
                        </div>
                        <div class="mt-4">
                            <p class="text-white text-lg text-left">
                                Password
                            </p>
                            <input type="password" class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text no-focus" placeholder="Password ">
                        </div>
                        <button class="bg-login-button login-button relative z-10 w-full mt-12 text-white rounded-md py-2">
                            Login
                        </button>
                    </div>
                </form>
                <p class="mt-6 text-xs text-center lg:text-base text-login-text">© 2024 ILCS. All rights reserved</p>
                <img src="assets/images/background/tech-bg-left.svg" class="absolute bottom-0 left-0 w-42 hidden lg:block" alt="test">
            </div>

        </div>
        <div class="hidden lg:w-3/6 back-login lg:flex justify-center items-center h-screen" >
           <div class="w-5/6">
            <h1 class="text-2xl mt-5 mb-12 font-semibold text-white">Welcome to <span class="text-login-text-blue">INTRANET 2.0</span> <br />Please sign in to your account</h1>
           <img src="assets/images/background/login-right-image.svg" class="w-full mb-16">
           </div>
        </div>
</body>

</html>
