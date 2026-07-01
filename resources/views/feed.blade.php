<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fil d'actualité — LinkUp</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#f8fafc] text-[#0f172a] antialiased">

    <!-- Navbar Minimaliste -->
    <nav class="bg-white border-b border-slate-200/60 sticky top-0 z-50 px-6 py-3 flex justify-between items-center shadow-[0_1px_2px_rgba(0,0,0,0.01)]">
        <div class="flex items-center space-x-6">
            <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center text-white font-extrabold text-sm">L</div>
            <a href="{{ route('feed') }}" class="text-xs font-bold text-slate-950 uppercase tracking-wider">Fil d'actualité</a>
        </div>
        
        <div class="flex items-center space-x-4">
            <span class="text-xs text-slate-500 font-medium">{{ auth()->user()->name }} ({{ auth()->user()->headline }})</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-xs font-semibold text-red-500 bg-red-50 hover:bg-red-100/80 px-3 py-1.5 rounded-xl transition cursor-pointer">
                    Déconnexion
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-xl mx-auto my-8 px-4">
        
        <!-- Section Action Create -->
        <div class="bg-white border border-slate-200/60 rounded-2xl p-4 mb-6 flex items-center justify-between shadow-[0_1px_3px_rgba(0,0,0,0.01)]">
            <p class="text-xs text-slate-400 font-medium">Partagez votre actualité professionnelle...</p>
            <a href="{{ route('posts.form') }}" class="bg-black hover:bg-slate-800 text-white font-semibold text-xs px-4 py-2 rounded-xl transition">
                Créer un post
            </a>
        </div>

        <!-- Message Success -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-emerald-50 text-emerald-600 text-xs rounded-xl font-medium border border-emerald-100">
                {{ session('success') }}
            </div>
        @endif

        <!-- Liste des Posts -->
        <div class="space-y-4">
            @forelse($posts as $post)
                <div class="bg-white border border-slate-200/60 rounded-2xl p-5 shadow-[0_1px_3px_rgba(0,0,0,0.01)]">
                    <!-- User Header -->
                    <div class="flex items-start space-x-3 mb-3">
                        <div class="w-8 h-8 rounded-full bg-slate-900 text-white flex items-center justify-center text-[10px] font-bold">
                            {{ substr($post->user->name, 0, 2) }}
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-slate-900">{{ $post->user->name }}</h3>
                            <p class="text-[10px] text-slate-400 mt-0.5">{{ $post->user->headline }} • {{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <p class="text-xs text-slate-700 leading-relaxed whitespace-pre-line">{{ $post->content }}</p>

                    <!-- Verrous & Protection @can (US 4.1) -->
                    @can('update', $post)
                        <div class="flex items-center space-x-2 pt-3 border-t border-slate-100 mt-4">
                            <a href="{{ route('posts.pageUpdate', $post) }}" class="text-[11px] font-semibold text-slate-600 hover:text-blue-600 bg-slate-50 hover:bg-blue-50 px-3 py-1.5 rounded-lg transition">
                                Modifier
                            </a>
                            <form action="{{ route('posts.delete', $post) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce post ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[11px] font-semibold text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition cursor-pointer">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            @empty
                <p class="text-center text-xs text-slate-400 py-8">Aucun post publié pour le moment.</p>
            @endforelse
        </div>
    </main>

</body>
</html>