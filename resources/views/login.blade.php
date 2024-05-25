<!DOCTYPE html>
<html lang="en">

@include('layouts.head-only')

<body>
    <div class="flex flex-col lg:flex-row w-full h-screen">
        <div class="lg:w-3/6 h-full flex flex-col justify-center items-center bg-login-100">
            <div class="flex-col lg:w-5/6">
                <img src="assets/images/logo/login_logo.svg" alt="tes" class=" mx-auto mt-6 lg:mt-0">
                <form class="background-inner-login text-center mt-4 lg:mt-12 px-12 py-12 lg:px-20 lg:py-20" action="{{ route('login_user') }}" method="POST">
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
                            <input type="text" name="nip" class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none" placeholder="Enter Your NIP">
                        </div>
                        <div class="mt-4">
                            <p class="text-white text-lg text-left">
                                Password
                            </p>
                            <div class="relative">
                                <input type="password" name="password" id="password-input" class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none" placeholder="Password ">
                                <div id="password-toggle" class="password-toggle text-white absolute top-0 right-0 mt-5 mr-3 cursor-pointer" onclick="togglePassword()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>

                            </div>
                        </div>
                        <button class="bg-login-button login-button relative z-10 w-full mt-12 text-white rounded-3xl py-2">
                            Login
                        </button>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form>
                <p class="mt-6 text-xs text-center lg:text-base text-login-text">© 2024 ILCS. All rights reserved</p>
                <img src="assets/images/background/tech-bg-left.svg" class="absolute bottom-0 left-0 w-42 hidden lg:block" alt="test">
            </div>

        </div>
        <div class="hidden lg:w-3/6 back-login lg:flex justify-center items-center h-screen">
            <div class="w-5/6">
                <h1 class="text-2xl mt-5 mb-12 font-semibold text-white">Welcome to <span class="text-login-text-blue">INTRANET 2.0</span> <br />Please sign in to your account</h1>
                <img src="assets/images/background/login-right-image.svg" class="w-full mb-16">
            </div>
        </div>
</body>

<script>
    function togglePassword() {
        let element = document.getElementById("password-input")
        let eye = document.getElementById("password-toggle")

        if (element.type === "password") {
            eye.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
</svg>`

            element.type = "text"
        } else {
            eye.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>`
            element.type = "password"
        }
    }
</script>

</html>
