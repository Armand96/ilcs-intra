<!DOCTYPE html>
<html lang="en">

@include('layouts.head-only')

<body>
    <div class="flex flex-col lg:flex-row w-full h-screen">
        <div class="lg:w-3/6  h-full flex flex-col justify-center items-center bg-login-100">
            <div class="flex-col lg:w-5/6">
                <img src="assets/images/logo/login_logo.svg" alt="tes" class="mx-auto lg:mx-0 mt-6 lg:mt-0">
                <h1 class="text-5xl  lg:text-left text-center mt-5 mb-12 font-semibold text-white"><span class="text-login-text-blue">INTRANET 2.0</span> <br />Comming soon</h1>

                <p class="mt-6 text-xs text-center lg:text-left lg:text-base text-login-text">© 2024 ILCS. All rights reserved</p>
                <img src="assets/images/background/tech-bg-left.svg" class="absolute bottom-0 left-0 w-42 hidden lg:block" alt="test">
            </div>
        </div>
        <div class="hidden lg:w-3/6 back-login lg:flex justify-center items-center h-screen" >
        </div>
</body>

</html>