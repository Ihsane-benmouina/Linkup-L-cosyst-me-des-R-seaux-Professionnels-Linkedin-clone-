<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'LinkUp') }} — Votre réseau professionnel</title>
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
        .blob{ position:absolute; border-radius:50%; filter:blur(2px); }
    </style>
</head>
<body class="antialiased" style="background:var(--bg); color:var(--ink);">

    <!-- Navbar -->
    <nav class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 text-white font-display font-extrabold text-lg rounded-2xl flex items-center justify-center shadow-sm"
                 style="background:linear-gradient(135deg,var(--primary),var(--pink));">L</div>
            <span class="font-display text-lg font-bold tracking-tight">Link<span style="color:var(--primary);">Up</span></span>
        </div>
        <div class="flex items-center space-x-2">
            @if (Route::has('login'))
                <a href="{{ url('/login') }}" class="text-xs font-semibold text-[--muted] hover:text-[--ink] px-4 py-2 rounded-full transition">Se connecter</a>
            @endif
            @if (Route::has('show.register'))
                <a href="{{ route('show.register') }}" class="text-xs font-bold text-white px-4 py-2 rounded-full transition shadow-sm hover:-translate-y-0.5"
                   style="background:linear-gradient(135deg,var(--primary),var(--pink));">Créer un compte</a>
            @endif
        </div>
    </nav>

    <!-- Hero -->
    <main class="max-w-6xl mx-auto px-6 pt-10 pb-20 relative">
        <div class="blob w-72 h-72 bg-[--primary-light] opacity-20 -top-10 -left-24"></div>
        <div class="blob w-56 h-56 bg-[--pink] opacity-15 top-20 -right-16"></div>

        <div class="relative z-10 max-w-2xl mx-auto text-center">
            <span class="inline-block text-[11px] font-bold uppercase tracking-wider px-4 py-1.5 rounded-full mb-6" style="background:var(--pink-light); color:var(--primary-dark);">
                ✨ Le réseau des pros qui avancent
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold tracking-tight leading-tight mb-5">
                Connecte-toi à ton <span style="color:var(--primary);">avenir</span> professionnel
            </h1>
            <p class="text-sm text-[--muted] leading-relaxed max-w-lg mx-auto mb-8">
                Partage tes projets, célèbre tes réussites et reste proche d'une communauté de professionnels qui te ressemble.
            </p>
            <div class="flex items-center justify-center gap-3">
                @if (Route::has('show.register'))
                    <a href="{{ route('show.register') }}" class="text-white font-bold text-xs px-6 py-3.5 rounded-full transition shadow-lg shadow-[--primary]/25 hover:shadow-xl hover:-translate-y-0.5"
                       style="background:linear-gradient(135deg,var(--primary),var(--pink));">
                        Rejoindre LinkUp
                    </a>
                @endif
                @if (Route::has('login'))
                    <a href="{{ url('/login') }}" class="text-xs font-semibold text-[--ink] bg-white border border-[--border] px-6 py-3.5 rounded-full transition hover:border-[--primary]/40">
                        J'ai déjà un compte
                    </a>
                @endif
            </div>
        </div>

        <!-- Feature cards -->
        <div class="grid sm:grid-cols-3 gap-4 mt-16 relative z-10">
            <div class="bg-white border border-[--border] rounded-[1.5rem] p-6">
                <div class="w-10 h-10 rounded-2xl flex items-center justify-center text-lg mb-4" style="background:var(--pink-light);">📝</div>
                <h3 class="font-display font-bold text-sm mb-1.5">Partage tes actus</h3>
                <p class="text-xs text-[--muted] leading-relaxed">Publie tes réalisations et projets en quelques secondes.</p>
            </div>
            <div class="bg-white border border-[--border] rounded-[1.5rem] p-6">
                <div class="w-10 h-10 rounded-2xl flex items-center justify-center text-lg mb-4" style="background:var(--blue-light);">🤝</div>
                <h3 class="font-display font-bold text-sm mb-1.5">Élargis ton réseau</h3>
                <p class="text-xs text-[--muted] leading-relaxed">Connecte-toi avec des professionnels qui partagent tes ambitions.</p>
            </div>
            <div class="bg-white border border-[--border] rounded-[1.5rem] p-6">
                <div class="w-10 h-10 rounded-2xl flex items-center justify-center text-lg mb-4" style="background:var(--amber-light);">🚀</div>
                <h3 class="font-display font-bold text-sm mb-1.5">Fais avancer ta carrière</h3>
                <p class="text-xs text-[--muted] leading-relaxed">Reste visible et saisis les opportunités au bon moment.</p>
            </div>
        </div>
    </main>

</body>
</html>
