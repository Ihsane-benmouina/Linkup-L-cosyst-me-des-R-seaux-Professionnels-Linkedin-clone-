@extends('layouts.app')

@section('content')
<main class="max-w-3xl mx-auto px-4 py-8 animate-fadeIn">
    
    <div class="bg-white rounded-[32px] overflow-hidden border border-slate-100 shadow-sm mb-8">
        <div class="h-36 bg-gradient-to-r from-[--primary] via-[--primary-light] to-[--pink]"></div>
        
        <div class="px-6 pb-8 relative flex flex-col items-center text-center -mt-16">
            <div class="w-28 h-28 rounded-full bg-white p-1 shadow-md shrink-0 mb-3">
                @if($user->avatar)
                    <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-full h-full rounded-full object-cover">
                @else
                    <div class="w-full h-full rounded-full flex items-center justify-center text-white font-bold text-3xl bg-slate-900">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                @endif
            </div>

            <h1 class="text-xl font-bold text-[--ink]">{{ $user->name }}</h1>
            <p class="text-xs font-semibold text-[--primary] mt-1 bg-indigo-50 px-3 py-1 rounded-full inline-block">
                {{ $user->headline ?? 'Membre Linkup' }}
            </p>
            
            @if($user->company)
                <p class="text-xs text-slate-400 mt-2 font-medium">
                    🏢 <span>{{ $user->company }}</span>
                </p>
            @endif

            @if($user->id === auth()->id())
                <div class="mt-4">
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-1.5 px-5 py-2 rounded-xl text-xs font-bold text-slate-700 border border-slate-200 bg-slate-50 hover:bg-slate-100 transition cursor-pointer">
                        ⚙️ Modifier le profil
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="space-y-6">
        <h2 class="font-bold text-sm text-[--ink] mb-4 px-2 flex items-center gap-2">
            <span>📋</span> Publications de l'utilisateur ({{ $posts->count() }})
        </h2>
        
        @forelse($posts as $post)
            <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-6">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full overflow-hidden shrink-0 bg-slate-100">
                            @if($post->user->avatar)
                                <img src="{{ $post->user->avatar }}" alt="" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full text-white flex items-center justify-center text-[10px] font-bold bg-slate-900">
                                    {{ strtoupper(substr($post->user->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-[--ink]">{{ $post->user->name }}</h3>
                            <p class="text-[9px] text-[--muted] mt-0.5 font-medium">{{ $post->user->headline }}</p>
                        </div>
                    </div>
                    <span class="text-[10px] text-slate-400 font-medium bg-slate-50 px-2.5 py-1 rounded-xl">
                        {{ $post->created_at->diffForHumans(null, true) }}
                    </span>
                </div>

                <div class="pb-3">
                    <p class="text-xs sm:text-sm leading-7 text-slate-600 whitespace-pre-line">{{ $post->content }}</p>
                </div>

                <div class="flex items-center justify-between border-t border-slate-50 pt-3 text-xs text-slate-400 font-bold">
                    <span>👍 {{ $post->likes ? $post->likes->count() : 0 }} Likes</span>
                    <span>💬 {{ $post->comments->count() }} Commentaires</span>
                </div>
            </div>
        @empty
            <div class="bg-white border border-dashed border-slate-200 p-12 rounded-[24px] text-center">
                <p class="text-2xl mb-2">📭</p>
                <p class="text-xs font-semibold text-slate-400">Aucun post publié pour le moment.</p>
            </div>
        @endforelse
    </div>
</main>
@endsection