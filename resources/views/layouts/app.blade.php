<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'LinkUp' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --primary:#7C6FEE; --primary-dark:#6355E0; --primary-light:#A78BFA;
            --pink:#F472B6; --pink-light:#FBCFE8; --bg:#F5F3FF; --ink:#241F3D; --muted:#8B87A3; --border:#E9E5FB;
            --amber-light:#FEF3C7; --blue-light:#DBEAFE; --green-light:#D1FAE5;
        }
        body{ font-family:'Plus Jakarta Sans', sans-serif; }
        .font-display{ font-family:'Baloo 2', sans-serif; }
    </style>
</head>
<body class="antialiased" style="background:var(--bg); color:var(--ink);">

    <!-- Navbar -->
    <nav class="bg-white/85 backdrop-blur-md border-b border-[--border] sticky top-0 z-50 px-6 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 text-white font-display font-extrabold text-sm rounded-xl flex items-center justify-center"
                 style="background:linear-gradient(135deg,var(--primary),var(--pink));">L</div>
            <a href="{{ route('feed') }}" class="font-display text-sm font-bold text-[--ink] tracking-wide">Fil d'actualité</a>
        </div>

        <div class="flex items-center space-x-4">
            <span class="text-xs text-[--muted] font-medium hidden sm:inline">{{ auth()->user()->name }} · {{ auth()->user()->headline }}</span>
            <div class="w-8 h-8 rounded-full text-white flex items-center justify-center text-[10px] font-bold"
                 style="background:linear-gradient(135deg,var(--primary),var(--primary-light));">
                {{ substr(auth()->user()->name, 0, 2) }}
            </div>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-xs font-semibold text-[--pink] bg-[--pink-light] hover:bg-[--pink] hover:text-white px-3 py-1.5 rounded-full transition cursor-pointer">
                    Déconnexion
                </button>
            </form>
        </div>
    </nav>

    <!-- Dynamic Content -->
    @yield('content')

</body>
</html>