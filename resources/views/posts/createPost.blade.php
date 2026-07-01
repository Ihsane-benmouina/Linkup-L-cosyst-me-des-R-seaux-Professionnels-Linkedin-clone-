<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un post — LinkUp</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#f8fafc] text-[#0f172a] antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-lg bg-white border border-slate-200/60 rounded-2xl p-6 shadow-[0_1px_3px_rgba(0,0,0,0.02)]">
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-sm font-bold text-slate-900 uppercase tracking-wider">Nouvelle publication</h1>
            <a href="{{ route('feed') }}" class="text-xs text-slate-400 hover:text-slate-600 font-medium">Annuler</a>
        </div>

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-2">Quoi de neuf ?</label>
                <textarea name="content" rows="5" placeholder="Partagez vos idées ou réalisations (min: 10 caractères)..." required
                          class="w-full bg-slate-50/50 border border-slate-200 rounded-xl p-3 text-xs focus:outline-none focus:border-slate-900 focus:bg-white transition resize-none">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-[11px] mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-black hover:bg-slate-800 text-white font-semibold text-xs py-2.5 rounded-xl transition cursor-pointer shadow-xs">
                Publier le post
            </button>
        </form>
    </div>

</body>
</html>