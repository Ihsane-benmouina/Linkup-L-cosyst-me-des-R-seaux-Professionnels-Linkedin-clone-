<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — LinkUp</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --primary:#7C6FEE; --primary-dark:#6355E0; --primary-light:#A78BFA;
            --pink:#F472B6; --pink-light:#FBCFE8; --bg:#F5F3FF; --ink:#241F3D; --muted:#8B87A3;
        }
        body{ font-family:'Plus Jakarta Sans', sans-serif; }
        .font-display{ font-family:'Baloo 2', sans-serif; }
        .blob{ position:absolute; border-radius:50%; filter:blur(2px); opacity:.35; }
    </style>
</head>
<body class="antialiased flex items-center justify-center min-h-screen p-4" style="background:radial-gradient(circle at 15% 20%, #EDE9FE 0%, #F5F3FF 45%, #FDF2F8 100%);">

    <div class="w-full max-w-4xl bg-white border border-[#EDE9FE] rounded-[2rem] overflow-hidden shadow-2xl shadow-[#7C6FEE]/10 flex flex-col md:flex-row min-h-[540px]">

        <!-- Left Side: Illustration Panel -->
        <div class="md:w-1/2 relative p-12 flex flex-col justify-between text-white overflow-hidden min-h-[300px] md:min-h-auto"
             style="background:linear-gradient(135deg,#7C6FEE 0%, #9D8CFA 45%, #F472B6 100%);">

            <!-- decorative blobs -->
            <div class="blob w-40 h-40 bg-white -top-10 -left-10"></div>
            <div class="blob w-28 h-28 bg-[#FBCFE8] bottom-10 -right-6"></div>
            <div class="blob w-16 h-16 bg-white top-1/3 right-8 opacity-20"></div>

            <!-- sparkles -->
            <span class="absolute top-10 right-16 text-xl">✨</span>
            <span class="absolute bottom-32 left-10 text-lg">⭐</span>

            <div class="relative z-10">
                <div class="w-11 h-11 bg-white/25 backdrop-blur-md rounded-2xl flex items-center justify-center font-display font-extrabold text-lg shadow-sm">
                    L
                </div>
            </div>

            <div class="relative z-10 mt-auto">
                <h2 class="font-display text-3xl font-bold tracking-tight mb-2">Content de te revoir ! 👋</h2>
                <p class="text-sm text-white/85 max-w-sm leading-relaxed">Reconnecte-toi à ta communauté de professionnels et ne rate aucune opportunité.</p>
            </div>
        </div>

        <!-- Right Side: The Form Box -->
        <div class="md:w-1/2 bg-white p-8 md:p-12 flex flex-col justify-center">
            <div class="mb-7">
                <h1 class="font-display text-2xl font-bold tracking-tight text-[--ink]">Bon retour parmi nous</h1>
                <p class="text-xs text-[--muted] mt-1 font-medium">Connecte-toi pour continuer sur LinkUp</p>
            </div>

            <form action="{{ route('login')}}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-[11px] font-bold text-[--muted] uppercase tracking-wider mb-1.5">Adresse email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="toi@exemple.com"
                           class="w-full bg-[--bg] border border-[#E9E5FB] rounded-full px-5 py-3 text-xs focus:outline-none focus:border-[--primary] focus:ring-4 focus:ring-[--primary]/10 focus:bg-white transition">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-[--muted] uppercase tracking-wider mb-1.5">Mot de passe</label>
                    <input type="password" name="password" required placeholder="••••••••"
                           class="w-full bg-[--bg] border border-[#E9E5FB] rounded-full px-5 py-3 text-xs focus:outline-none focus:border-[--primary] focus:ring-4 focus:ring-[--primary]/10 focus:bg-white transition">
                </div>

                <button type="submit"
                        class="w-full text-white font-bold text-xs py-3.5 rounded-full transition cursor-pointer mt-2 shadow-lg shadow-[--primary]/25 hover:shadow-xl hover:-translate-y-0.5"
                        style="background:linear-gradient(135deg,var(--primary),var(--pink));">
                    Se connecter
                </button>
            </form>

            <div class="mt-7 pt-5 border-t border-[#F1EEFC]">
                <p class="text-xs text-[--muted] font-medium">
                    Nouveau sur LinkUp ?
                    <a href="{{ route('show.register') }}" class="text-[--primary] hover:text-[--primary-dark] font-bold ml-1 transition">Créer un compte</a>
                </p>
            </div>
        </div>

    </div>

</body>
</html>
