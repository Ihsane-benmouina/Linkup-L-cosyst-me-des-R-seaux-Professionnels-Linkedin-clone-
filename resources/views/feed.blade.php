@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
    
    <div class="hidden lg:block lg:col-span-1 bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs sticky top-24">
        <div class="flex flex-col items-center text-center">
            <div class="w-20 h-20 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-600 p-0.5 shadow-md mb-4">
                <div class="w-full h-full bg-white rounded-full flex items-center justify-center font-bold text-xl text-slate-800">
                    IB
                </div>
            </div>
            <h2 class="font-bold text-slate-800 text-lg tracking-tight">Ihsane Ben-Mouina</h2>
            <p class="text-xs text-blue-600 font-medium mt-1">Développeuse Fullstack</p>
            
            <hr class="w-full border-slate-100 my-4">
            
            <div class="w-full text-left space-y-2 text-xs text-slate-500">
                <div class="flex justify-between">
                    <span>Vues du profil</span>
                    <span class="font-bold text-slate-700">142</span>
                </div>
                <div class="flex justify-between">
                    <span>Impressions du post</span>
                    <span class="font-bold text-slate-700 font-mono">1.2K</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-1 lg:col-span-3 space-y-6">
        
        <div class="flex items-center justify-between mb-2">
            <h1 class="text-xl font-bold tracking-tight text-slate-800">Fil d'actualité</h1>
            <span class="text-xs text-slate-400 font-medium">Mis à jour en temps réel</span>
        </div>

        @forelse($posts as $post)
            <article class="bg-white border border-slate-200/80 rounded-2xl shadow-xs hover:border-slate-300 transition duration-300 group">
                
                <div class="p-5 flex items-start justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="relative group-hover:scale-105 transition duration-300">
                            <img src="{{ $post->user->image_url ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop' }}" 
                                 alt="{{ $post->user->name }}" 
                                 class="w-12 h-12 rounded-xl object-cover ring-2 ring-slate-100 group-hover:ring-blue-100 transition">
                            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 text-sm hover:text-blue-600 cursor-pointer transition">
                                {{ $post->user->name }}
                            </h3>
                            <p class="text-xs text-slate-500 font-medium mt-0.5 line-clamp-1">
                                {{ $post->user->headline }} 
                                @if($post->user->company) 
                                    <span class="text-slate-400 font-normal">chez</span> <span class="text-slate-700">{{ $post->user->company }}</span> 
                                @endif
                            </p>
                            <span class="inline-flex items-center text-[11px] text-slate-400 font-medium mt-1">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                    <button class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg hover:bg-slate-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                    </button>
                </div>

                <div class="px-5 pb-5">
                    <p class="text-slate-700 text-sm leading-relaxed whitespace-pre-line select-text">
                        {{ $post->content }}
                    </p>
                </div>

                <div class="px-5 py-3.5 bg-slate-50/50 border-t border-slate-100 rounded-b-2xl flex items-center justify-between text-slate-500 text-xs font-semibold">
                    <button class="flex items-center space-x-2 hover:text-blue-600 hover:bg-blue-50/60 px-3 py-2 rounded-xl transition cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.757c.746 0 1.436.318 1.908.878l.4.472c.446.527.62 1.233.474 1.91l-1.242 5.8a3 3 0 01-2.93 2.37H7a1 1 0 01-1-1v-8a1 1 0 01.3-.7l5.4-5.4a1 1 0 011.414 0l1.242 1.242c.325.325.508.766.508 1.226V10zM6 21H4a1 1 0 01-1-1v-8a1 1 0 011-1h2v10z"></path></svg>
                        <span>J'aime</span>
                    </button>
                    
                    <button class="flex items-center space-x-2 hover:text-slate-800 hover:bg-slate-200/50 px-3 py-2 rounded-xl transition cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <span>Commenter</span>
                    </button>

                    <button class="flex items-center space-x-2 hover:text-slate-800 hover:bg-slate-200/50 px-3 py-2 rounded-xl transition cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                        <span>Partager</span>
                    </button>
                </div>

            </article>
        @empty
            <div class="bg-white border border-dashed border-slate-300 p-12 rounded-2xl text-center text-slate-400">
                <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5a2 2 0 012-2h2a2 2 0 002-2V7a2 2 0 012-2h4a2 2 0 012 2v3a2 2 0 002 2h2a2 2 0 012 2z"></path></svg>
                <p class="text-sm font-medium">Aucun post disponible pour le moment.</p>
            </div>
        @endforelse

    </div>
</div>
@endsection