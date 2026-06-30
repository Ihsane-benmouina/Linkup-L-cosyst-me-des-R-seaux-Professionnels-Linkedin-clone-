<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte — LinkUp</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: -0.01em; }</style>
</head>
<body class="bg-[#f8fafc] text-[#0f172a] antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md bg-white border border-slate-200/60 rounded-2xl p-8 shadow-[0_1px_3px_rgba(0,0,0,0.02)]">
        
        <div class="text-center mb-8">
            <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center text-white font-extrabold text-sm tracking-tighter mx-auto mb-3">
                L
            </div>
            <h1 class="text-xl font-bold tracking-tight text-slate-900">Rejoindre la communauté</h1>
            <p class="text-xs text-slate-400 mt-1">Développez votre réseau professionnel dès aujourd'hui.</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 text-red-600 text-xs rounded-xl font-medium">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4.5">
            @csrf

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nom complet</label>
                <input type="text" name="name" value="{{ old('name') }}" required 
                       class="w-full bg-slate-50/50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-slate-900 focus:bg-white transition">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Adresse email</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                       class="w-full bg-slate-50/50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-slate-900 focus:bg-white transition">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Titre professionnel (Headline)</label>
                <input type="text" name="headline" value="{{ old('headline') }}" required placeholder="Ex: Développeuse Fullstack / Étudiante" 
                       class="w-full bg-slate-50/50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-slate-900 focus:bg-white transition">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Mot de passe</label>
                <input type="password" name="password" required 
                       class="w-full bg-slate-50/50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-slate-900 focus:bg-white transition">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required 
                       class="w-full bg-slate-50/50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-slate-900 focus:bg-white transition">
            </div>

            <button type="submit" class="w-full bg-black hover:bg-slate-800 text-white font-semibold text-xs py-2.5 rounded-xl transition cursor-pointer mt-2 shadow-xs">
                S'inscrire sur LinkUp
            </button>
        </form>

        <div class="text-center mt-6 pt-5 border-t border-slate-100">
            <p class="text-xs text-slate-400">Déjà membre ? <a href="{{ route('show.login') }}" class="text-black font-semibold hover:underline">Se connecter</a></p>
        </div>

    </div>

</body>
</html>