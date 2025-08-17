<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <section class="bg-[url('https://pagedone.io/asset/uploads/1691055810.png')] bg-cover bg-center pt-8 lg:pt-32">
        <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <div class="mx-auto mb-4 flex w-60 items-center justify-between rounded-full border border-emerald-600 p-1">
                <span class="font-inter ml-3 text-xs font-medium text-gray-900">Connectez vous a votre compte</span>
                <a href="login" class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-600">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.83398 8.00019L12.9081 8.00019M9.75991 11.778L13.0925 8.44541C13.3023 8.23553 13.4073 8.13059 13.4073 8.00019C13.4073 7.86979 13.3023 7.76485 13.0925 7.55497L9.75991 4.22241"
                            stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <h1
                class="font-manrope mx-auto mb-5 max-w-2xl text-center text-4xl font-bold leading-[50px] text-gray-900 md:text-5xl">
                Contrôlez vos finances avec notre
                <span class="text-emerald-600">outil intelligent</span>
            </h1>
            <p class="mx-auto mb-9 max-w-sm text-center text-base font-normal leading-7 text-gray-500">
                Découvrez une meilleure façon de gérer facilement l’ensemble
                de votre patrimoine.
            </p>
            <a href="register"
                class="shadow-xs mb-14 inline-flex w-full items-center justify-center rounded-full bg-emerald-500 px-7 py-3 text-center text-base font-semibold text-white transition-all duration-500 hover:bg-emerald-600 md:w-auto">
                Essayer gratuitement
                <svg class="ml-2" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.5 15L11.0858 11.4142C11.7525 10.7475 12.0858 10.4142 12.0858 10C12.0858 9.58579 11.7525 9.25245 11.0858 8.58579L7.5 5"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <a href="javascript:;"
                class="shadow-xs mb-14 inline-flex w-full items-center justify-center rounded-full bg-emerald-500 px-7 py-3 text-center text-base font-semibold text-white transition-all duration-500 hover:bg-emerald-600 md:w-auto">
                Voir le plan d'abonnement
                <svg class="ml-2" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.5 15L11.0858 11.4142C11.7525 10.7475 12.0858 10.4142 12.0858 10C12.0858 9.58579 11.7525 9.25245 11.0858 8.58579L7.5 5"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div class="flex justify-center">
                <img src="https://pagedone.io/asset/uploads/1691054543.png" alt="Dashboard image" />
            </div>
        </div>
    </section>

    <div>
        <h2 class="tracki mt-12 text-center text-3xl font-bold sm:text-5xl">
            Tarifs
        </h2>
        <p class="mx-auto mt-4 max-w-3xl text-center text-xl">
            Commencez avec notre forfait gratuit et passez à une version
            supérieure lorsque vous êtes prêt.
        </p>
    </div>

    <div class="mt-3 flex w-full items-center justify-center">
        <span class="mr-3 text-gray-600">Mensuel</span>
        <label for="toggle" class="flex cursor-pointer items-center">
            <div class="relative">
                <input type="checkbox" name="period" id="toggle" class="sr-only" onchange="toggleDarkMode(this)" />
                <div
                    class="block h-8 w-14 rounded-full bg-gray-300 shadow-neumorphic-toggle-outset transition-all duration-300 ease-in-out">
                </div>
                <div
                    class="dot absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition-transform duration-300 ease-in-out">
                </div>
            </div>
        </label>
        <span class="ml-3 text-gray-600">Annuel</span>
    </div>

    <div class="flex w-full items-center justify-center">
        <div class="mt-24 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
            <!-- Plans Placeholder -->
            <div class="relative flex flex-col rounded-2xl border border-gray-200 p-8 shadow-sm">
                <div class="flex-1">
                    <h3 class="text-xl font-semibold">Gratuit</h3>
                    <p class="mt-4 flex items-baseline">
                        <span class="text-5xl font-extrabold tracking-tight">$0</span><span
                            class="ml-1 text-xl font-semibold">/mois</span>
                    </p>
                    <p class="mt-6">Vous voulez juste decouvrir</p>
                    <ul role="list" class="mt-6 space-y-6">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="h-6 w-6 flex-shrink-0 text-emerald-500"
                                aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg><span class="ml-3">3 Cartes</span>
                        </li>
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="h-6 w-6 flex-shrink-0 text-emerald-500"
                                aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg><span class="ml-3">3 poches</span>
                        </li>
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="h-6 w-6 flex-shrink-0 text-emerald-500" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg><span class="ml-3">6 transactions</span>
                        </li>
                    </ul>
                </div>
                <a class="mt-8 block w-full rounded-md border border-transparent bg-emerald-50 px-6 py-3 text-center font-medium text-emerald-700 hover:bg-emerald-100"
                    href="{{ route('register') }}">Inscrivez-vous gratuitement</a>
            </div>

            <div class="relative flex flex-col rounded-2xl border border-gray-200 p-8 shadow-sm">
                <div class="flex-1">
                    <h3 class="text-xl font-semibold">Basic Pro</h3>
                    <p
                        class="absolute top-0 -translate-y-1/2 transform rounded-full bg-emerald-500 px-4 py-1.5 text-xs font-semibold uppercase tracking-wide text-white">
                        Le plus populaire
                    </p>
                    <p class="mt-4 flex items-baseline">
                        <span class="text-5xl font-extrabold tracking-tight">$12</span><span
                            class="ml-1 text-xl font-semibold">/mois</span>
                    </p>
                    <p class="mt-6">Acces total</p>
                    <ul role="list" class="mt-6 space-y-6">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="h-6 w-6 flex-shrink-0 text-emerald-500" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg><span class="ml-3">100</span>
                        </li>
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="h-6 w-6 flex-shrink-0 text-emerald-500" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg><span class="ml-3">100</span>
                        </li>
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="h-6 w-6 flex-shrink-0 text-emerald-500" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg><span class="ml-3">100.000</span>
                        </li>
                    </ul>
                </div>
                <a class="mt-8 block w-full rounded-md border border-transparent bg-emerald-500 px-6 py-3 text-center font-medium text-white hover:bg-emerald-600"
                    href="{{ route('register') }}">S'abonner</a>
            </div>

            <div class="relative flex flex-col rounded-2xl border border-gray-200 p-8 shadow-sm">
                <div class="flex-1">
                    <h3 class="text-xl font-semibold">Premium</h3>

                    <p class="mt-4 flex items-baseline">
                        <span class="text-5xl font-extrabold tracking-tight">$25</span><span
                            class="ml-1 text-xl font-semibold">/mois</span>
                    </p>
                    <p class="mt-6">Acces total</p>
                    <ul role="list" class="mt-6 space-y-6">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="h-6 w-6 flex-shrink-0 text-emerald-500" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg><span class="ml-3">1000</span>
                        </li>
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="h-6 w-6 flex-shrink-0 text-emerald-500" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg><span class="ml-3">1000</span>
                        </li>
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="h-6 w-6 flex-shrink-0 text-emerald-500" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg><span class="ml-3">1.000.000</span>
                        </li>
                    </ul>
                </div>
                <a class="mt-8 block w-full rounded-md border border-transparent bg-emerald-500 px-6 py-3 text-center font-medium text-white hover:bg-emerald-600"
                    href="{{ route('register') }}">S'abonner</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const planLinks = document.querySelectorAll("a[data-period]");
            planLinks.forEach((link) => {
                const url = new URL(link.href);
                url.searchParams.set("period", "monthly");
                link.href = url.toString();
                link.setAttribute("data-period", "monthly");
            });
        });

        function toggleDarkMode(checkbox) {
            const toggleTrack = checkbox.nextElementSibling;
            const toggleDot = toggleTrack.nextElementSibling;

            if (checkbox.checked) {
                toggleTrack.classList.remove(
                    "shadow-neumorphic-toggle-outset"
                );
                toggleTrack.classList.add(
                    "bg-green-500",
                    "shadow-neumorphic-toggle-inset"
                );
                toggleDot.classList.add("translate-x-6");
            } else {
                toggleTrack.classList.remove(
                    "bg-green-500",
                    "shadow-neumorphic-toggle-inset"
                );
                toggleTrack.classList.add(
                    "shadow-neumorphic-toggle-outset"
                );
                toggleDot.classList.remove("translate-x-6");
            }

            const period = checkbox.checked ? "yearly" : "monthly";
            const planLinks = document.querySelectorAll("a[data-period]");
            planLinks.forEach((link) => {
                const url = new URL(link.href);
                url.searchParams.set("period", period);
                link.href = url.toString();
                link.setAttribute("data-period", period);
            });
        }
    </script>
</body>

</html>
