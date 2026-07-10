@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-100/40 via-purple-50/30 to-pink-100/40 -mt-2 pt-6 pb-12">
    <main class="max-w-[1440px] mx-auto px-8 animate-fadeIn">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            
            <!-- LEFT SIDEBAR: التنقل السريع -->
            <aside class="lg:col-span-3 sticky top-24">
                <div class="bg-white/90 backdrop-blur-md rounded-[24px] border border-white/60 p-5 shadow-sm flex flex-col items-center">
                    <div class="w-full space-y-1">
                        <a href="{{ route('feed') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-500 hover:bg-indigo-50/50 hover:text-[--primary] font-semibold text-xs transition">
                            <i class="fa-solid fa-house text-sm"></i>
                            <span>Fil d'actualité</span>
                        </a>
                        <a href="{{ route('saved.index') }}" class="flex items-center justify-between px-4 py-2.5 rounded-xl bg-indigo-50 text-[--primary] font-bold text-xs transition shadow-xs">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-bookmark text-sm"></i>
                                <span>Saved items</span>
                            </div>
                            <span class="bg-white text-[--primary] font-bold px-2 py-0.5 rounded-md text-[10px] shadow-2xs">
                                {{ auth()->user()->savedPosts()->count() }}
                            </span>
                        </a>
                    </div>
                </div>
            </aside>

            <!-- CENTER: قائمة المنشورات المحفوظة -->
            <section class="lg:col-span-6 space-y-4">
                <div class="bg-white/90 backdrop-blur-md rounded-[24px] border border-white/60 p-5 shadow-sm">
                    <h1 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-bookmark text-[--primary]"></i>
                        <span>Articles sauvegardés</span>
                    </h1>
                    <p class="text-[11px] text-slate-400 mt-1">Vos éléments enregistrés privés</p>
                </div>

                @if(session('success'))
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-100 rounded-xl p-3.5 text-xs font-bold text-[--primary] flex items-center gap-2 shadow-xs">
                        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="space-y-4">
                    @forelse($posts as $post)
                        @php
                            $hasLiked = $post->likes ? $post->likes->contains('user_id', auth()->id()) : false;
                            $isSaved = auth()->user()->hasSaved($post);
                        @endphp

                        <div class="bg-white rounded-[24px] border border-purple-100/40 shadow-xs overflow-hidden transition-all hover:shadow-md"> 
                            
                            <!-- معلومات كاتب البوست -->
                            <div class="p-5 pb-3 flex justify-between items-start">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('users.show', $post->user) }}" class="w-11 h-11 rounded-full overflow-hidden shrink-0 block border border-purple-100 p-0.5 bg-white shadow-xs">
                                        @if($post->user->avatar)
                                            <img src="{{ $post->user->avatar }}" alt="" class="w-full h-full rounded-full object-cover">
                                        @else
                                            <div class="w-full h-full rounded-full text-white flex items-center justify-center text-xs font-bold bg-slate-900">
                                                {{ strtoupper(substr($post->user->name, 0, 2)) }}
                                            </div>
                                        @endif
                                    </a>
                                    <div>
                                        <a href="{{ route('users.show', $post->user) }}" class="text-xs font-bold text-slate-900 hover:text-[--primary] transition">
                                            {{ $post->user->name }}
                                        </a>
                                        <p class="text-[10px] text-slate-400 font-medium mt-0.5 line-clamp-1">
                                            {{ $post->user->headline ?? 'Professionnel' }}
                                        </p>
                                        <p class="text-[9px] text-indigo-300 flex items-center gap-1 mt-0.5 font-semibold">
                                            <i class="fa-regular fa-clock"></i> <span>{{ $post->created_at->diffForHumans(null, true) }}</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- زر إلغاء الحفظ دغيا من هنا -->
                                <form action="{{ route('posts.save', $post) }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="p-1.5 rounded-lg border bg-indigo-50 border-indigo-200 text-[--primary] text-xs cursor-pointer" title="Retirer des signets">
                                        <i class="fa-solid fa-bookmark text-sm"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- نص المنشور -->
                            <div class="px-5 pb-4">
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed font-normal whitespace-pre-line">{{ $post->content }}</p>
                            </div>

                            <!-- تفاعلات خفيفة وسريعة -->
                            <div class="px-5 py-2.5 bg-gradient-to-r from-indigo-50/30 to-pink-50/20 border-t border-b border-purple-50 flex justify-between items-center text-[10px] text-slate-400 font-semibold">
                                <span class="text-slate-700 font-bold"><i class="fa-regular fa-thumbs-up mr-1 text-[--primary]"></i>{{ $post->likes ? $post->likes->count() : 0 }} likes</span>
                                <span><i class="fa-regular fa-comment-dots mr-1 text-[--primary]"></i>{{ $post->comments->count() }} commentaires</span>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white/80 border border-white p-12 rounded-[24px] text-center shadow-sm">
                            <i class="fa-regular fa-bookmark text-slate-300 text-3xl mb-3 block"></i>
                            <p class="text-xs text-slate-400 font-bold">Aucun post sauvegardé pour le moment.</p>
                            <a href="{{ route('feed') }}" class="mt-4 inline-block text-[11px] bg-slate-900 text-white font-bold px-4 py-2 rounded-xl hover:bg-[--primary] transition">
                                Explorer le fil d'actualité
                            </a>
                        </div>
                    @endforelse
                </div>
            </section>

        </div>
    </main>
</div>
@endsection