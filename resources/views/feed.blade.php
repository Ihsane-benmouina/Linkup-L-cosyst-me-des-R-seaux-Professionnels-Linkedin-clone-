@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
    
    <div class="hidden lg:block lg:col-span-1 bg-white border border-slate-200/60 rounded-2xl p-5 shadow-xs sticky top-24">
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 p-0.5 shadow-sm mb-3">
                <div class="w-full h-full bg-white rounded-full flex items-center justify-center font-bold text-lg text-slate-800">
                    IB
                </div>
            </div>
            <h2 class="font-bold text-slate-900 text-sm tracking-tight">Ihsane Ben-Mouina</h2>
            <p class="text-[11px] text-blue-600 font-medium mt-0.5">Développeuse Fullstack</p>
            
            <hr class="w-full border-slate-100 my-3.5">
            
            <div class="w-full text-left space-y-2 text-[11px] text-slate-500">
                <div class="flex justify-between">
                    <span>Vues du profil</span>
                    <span class="font-bold text-slate-800">142</span>
                </div>
                <div class="flex justify-between">
                    <span>Impressions</span>
                    <span class="font-bold text-slate-800 font-mono">1.2K</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-1 lg:col-span-2 space-y-4">
        
        <div class="flex items-center justify-between mb-1">
            <h1 class="text-base font-bold tracking-tight text-slate-900">Fil d'actualité</h1>
            <span class="text-[10px] bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full font-medium">Live</span>
        </div>

        @forelse($posts as $post)
            <article class="bg-white border border-slate-200/70 rounded-xl shadow-[0_1px_2px_rgba(0,0,0,0.02)] hover:border-slate-300 transition duration-200 group">
                
                <div class="p-4 flex items-start justify-between">
                    <div class="flex items-center space-x-3">
                        <img src="{{ $post->user->image_url ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop' }}" 
                             alt="{{ $post->user->name }}" 
                             class="w-9 h-9 rounded-xl object-cover ring-2 ring-slate-50">
                        <div>
                            <h3 class="font-semibold text-slate-900 text-xs hover:text-blue-600 cursor-pointer transition">
                                {{ $post->user->name }}
                            </h3>
                            <p class="text-[10px] text-slate-400 font-medium line-clamp-1">
                                {{ $post->user->headline }} 
                                @if($post->user->company) 
                                    <span class="text-slate-300">|</span> <span class="text-slate-500">{{ $post->user->company }}</span> 
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    <span class="text-[10px] text-slate-400 font-normal">
                        {{ $post->created_at->diffForHumans(null, true) }} </span>
                </div>

                <div class="px-4 pb-3">
                    <p class="text-slate-700 text-xs leading-relaxed select-text line-clamp-3 group-hover:line-clamp-none transition-all duration-300">
                        {{ $post->content }}
                    </p>
                </div>

                <div class="px-4 py-2 bg-slate-50/50 border-t border-slate-100 rounded-b-xl flex items-center space-x-4 text-slate-400 text-[11px] font-medium">
                    <button class="flex items-center space-x-1.5 hover:text-blue-600 transition cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.757c.746 0 1.436.318 1.908.878l.4.472c.446.527.62 1.233.474 1.91l-1.242 5.8a3 3 0 01-2.93 2.37H7a1 1 0 01-1-1v-8a1 1 0 01.3-.7l5.4-5.4a1 1 0 011.414 0l1.242 1.242c.325.325.508.766.508 1.226V10zM6 21H4a1 1 0 01-1-1v-8a1 1 0 011-1h2v10z"></path></svg>
                        <span>J'aime</span>
                    </button>
                    
                    <button class="flex items-center space-x-1.5 hover:text-slate-700 transition cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <span>Commenter</span>
                    </button>
                </div>

            </article>
        @empty
            <div class="bg-white border border-dashed border-slate-200 p-8 rounded-xl text-center text-slate-400 text-xs">
                Aucun post disponible.
            </div>
        @endforelse

    </div>

    <div class="hidden lg:block lg:col-span-1 bg-white border border-slate-200/60 rounded-2xl p-4 shadow-xs sticky top-24">
        <h3 class="text-xs font-bold text-slate-900 mb-3 tracking-tight flex items-center justify-between">
            <span>Membres en ligne</span>
            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
        </h3>
        
        <div class="space-y-3.5">
            <div class="flex items-center justify-between group cursor-pointer">
                <div class="flex items-center space-x-2.5">
                    <div class="relative">
                        <div class="w-7 h-7 rounded-full bg-slate-900 text-white font-bold text-[10px] flex items-center justify-center">
                            AM
                        </div>
                        <span class="absolute bottom-0 right-0 w-2 h-2 bg-green-500 border border-white rounded-full"></span>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-slate-800 group-hover:text-blue-600 transition">Anas Mazouni</p>
                        <p class="text-[9px] text-slate-400">Tech Lead @Google</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between group cursor-pointer">
                <div class="flex items-center space-x-2.5">
                    <div class="relative">
                        <div class="w-7 h-7 rounded-full bg-amber-500 text-white font-bold text-[10px] flex items-center justify-center">
                            SR
                        </div>
                        <span class="absolute bottom-0 right-0 w-2 h-2 bg-green-500 border border-white rounded-full"></span>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-slate-800 group-hover:text-blue-600 transition">Sara Radi</p>
                        <p class="text-[9px] text-slate-400">UI/UX Designer</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between group cursor-pointer">
                <div class="flex items-center space-x-2.5">
                    <div class="relative">
                        <div class="w-7 h-7 rounded-full bg-indigo-600 text-white font-bold text-[10px] flex items-center justify-center">
                            OK
                        </div>
                        <span class="absolute bottom-0 right-0 w-2 h-2 bg-green-500 border border-white rounded-full"></span>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-slate-800 group-hover:text-blue-600 transition">Omar Kabiri</p>
                        <p class="text-[9px] text-slate-400">DevOps Engineer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection