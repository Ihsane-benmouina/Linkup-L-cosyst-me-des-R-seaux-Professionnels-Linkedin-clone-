@extends('layouts.app')

@section('content')
<main class="max-w-xl mx-auto my-8 px-4">

    <!-- Welcome banner -->
    <div class="rounded-[1.75rem] p-6 mb-5 text-white relative overflow-hidden shadow-lg shadow-[--primary]/20"
         style="background:linear-gradient(135deg,var(--primary) 0%, var(--primary-light) 55%, var(--pink) 100%);">
        <div class="absolute -right-6 -top-8 w-32 h-32 rounded-full bg-white/10"></div>
        <div class="absolute right-10 bottom-0 w-16 h-16 rounded-full bg-white/10"></div>
        <p class="font-display text-lg font-bold relative z-10">Bonjour, {{ explode(' ', auth()->user()->name)[0] }} 👋</p>
        <p class="text-xs text-white/85 mt-1 relative z-10">Prêt(e) à partager une actualité avec ton réseau aujourd'hui ?</p>
    </div>

    <!-- Stat pills -->
    <div class="grid grid-cols-2 gap-3 mb-5">
        <div class="bg-white border border-[--border] rounded-2xl p-4 shadow-sm">
            <p class="text-[10px] font-bold text-[--muted] uppercase tracking-wider">Publications totales</p>
            <p class="font-display text-2xl font-bold mt-1" style="color:var(--primary);">{{ $posts->count() }}</p>
        </div>
        <div class="bg-white border border-[--border] rounded-2xl p-4 shadow-sm">
            <p class="text-[10px] font-bold text-[--muted] uppercase tracking-wider">Vos publications</p>
            <p class="font-display text-2xl font-bold mt-1" style="color:var(--pink);">{{ $posts->where('user_id', auth()->id())->count() }}</p>
        </div>
    </div>

    <!-- Create post prompt -->
    <a href="{{ route('posts.create') }}" class="bg-white border border-[--border] rounded-2xl p-4 mb-6 flex items-center justify-between hover:border-[--primary]/40 transition group shadow-xs">
        <p class="text-xs text-[--muted] font-medium">Partagez votre actualité professionnelle...</p>
        <span class="text-white font-semibold text-xs px-4 py-2 rounded-full transition group-hover:-translate-y-0.5"
              style="background:linear-gradient(135deg,var(--primary),var(--pink));">
            Créer un post
        </span>
    </a>

    <!-- Message Success -->
    @if(session('success'))
        <div class="mb-4 p-3 rounded-2xl text-xs font-medium border" style="background:var(--green-light); color:#16794B; border-color:#B7ECD3;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Liste des Posts -->
    <div class="space-y-4">
        @forelse($posts as $post)
            <div class="bg-white border border-[--border] rounded-[1.5rem] p-5 shadow-[0_6px_20px_-10px_rgba(124,111,238,0.15)] hover:border-[--primary]/20 transition duration-200">
                
                <!-- User Header -->
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-start space-x-3">
                        <div class="w-9 h-9 rounded-full text-white flex items-center justify-center text-[10px] font-bold shrink-0"
                             style="background:linear-gradient(135deg,var(--primary),var(--primary-light));">
                            {{ substr($post->user->name, 0, 2) }}
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-[--ink]">{{ $post->user->name }}</h3>
                            <p class="text-[10px] text-[--muted] mt-0.5">
                                {{ $post->user->headline }} 
                                @if($post->user->company) • <span class="font-medium text-[--ink]/70">{{ $post->user->company }}</span> @endif
                            </p>
                        </div>
                    </div>
                    <span class="text-[10px] text-[--muted] font-normal">
                        {{ $post->created_at->diffForHumans(null, true) }}
                    </span>
                </div>

                <!-- Content -->
                <p class="text-xs text-[--ink]/80 leading-relaxed whitespace-pre-line select-text">{{ $post->content }}</p>

                <!-- Actions Verification & Protection -->
                @can('update', $post)
                    <div class="flex items-center space-x-2 pt-3 border-t border-[--border] mt-4">
                        <a href="{{ route('posts.edit', $post) }}" class="text-[11px] font-semibold px-3 py-1.5 rounded-full transition hover:opacity-90" style="color:var(--primary-dark); background:var(--bg);">
                            Modifier
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce post ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-[11px] font-semibold text-[--pink] hover:text-white bg-[--pink-light] hover:bg-[--pink] px-3 py-1.5 rounded-full transition cursor-pointer">
                                Supprimer
                            </button>
                        </form>
                    </div>
                @endcan
            </div>
        @empty
            <div class="bg-white border border-dashed border-[--border] p-10 rounded-2xl text-center">
                <p class="text-3xl mb-2">🌱</p>
                <p class="text-xs text-[--muted]">Aucun post publié pour le moment.</p>
            </div>
        @endforelse
    </div>
</main>
@endsection