<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Finance App Auth</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    @vite("ressources/css/app.css", "ressources/js/app.js")
</head>

<body class="bg-gray-100 h-screen p-6"
    style="
      background: url({{asset('images/bg.jpg')}});
      background-repeat: no-repeat;
      background-size: auto;
    ">
    <div class="w-full h-full">
        <div class="py-16">
            <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
                <div class="hidden lg:block lg:w-1/2 bg-cover" style="background-image: url('../images/login-bg.jpg')">
                </div>
                <div class="w-full p-8 lg:w-1/2">
                    <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">
                        FinanzApp
                    </h1>

                    @yield('auth-form')
                </div>
            </div>
        </div>
    </div>
</body>