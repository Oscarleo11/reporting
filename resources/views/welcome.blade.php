<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue sur UReporting</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
        <nav class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <img src="{{ asset('favicon.png') }}" alt="Logo" class="h-4 w-4 rounded">
                <span class="font-semibold text-lg">UREPORTING</span>
            </div>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                            Accéder au tableau de bord
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 border border-transparent hover:border-[#19140035] text-[#1b1b18] rounded-sm text-sm leading-normal">
                            Se connecter
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal ml-2">
                                S'inscrire
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
    </header>

    <main class="w-full lg:max-w-4xl max-w-[335px] text-center mt-10">
        {{-- <h1 class="text-3xl font-bold mb-4 text-primary">Bienvenue sur UReporting</h1> --}}
        {{-- <p class="text-lg text-[#706f6c] mb-8">
            Plateforme de reporting centralisé pour la gestion des produits électroniques et de transfert rapide.<br>
            Connectez-vous pour accéder à vos tableaux de bord, générer des rapports XML, et bien plus encore.
        </p> --}}
        <img src="{{ asset('welcome3.avif') }}" alt="Illustration" class="mx-auto mb-8" style="max-width:320px;">
        <div class="flex flex-col items-center gap-2">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary px-5 py-2">
                        <i class="fas fa-chart-pie mr-2"></i> Tableau de bord
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary px-5 py-2">
                        <i class="fas fa-sign-in-alt mr-2"></i> Se connecter
                    </a>
                    @if (Route::has('register') && Auth::check() && Auth::user()->role === 'admin')
                        <a href="{{ route('register') }}" class="btn btn-outline-primary px-5 py-2">
                            <i class="fas fa-user-plus mr-2"></i> S'inscrire
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </main>

    <footer class="mt-12 text-xs text-[#706f6c]">
        &copy; {{ date('Y') }} UReporting. Tous droits réservés.
    </footer>
</body>

</html>