@extends('layouts.app')

@section('content')
<!-- خلفية بتدرج بنفسجي ووردي ناعم وخفيف بزاف -->
<div class="min-h-screen bg-gradient-to-br from-indigo-100/40 via-purple-50/30 to-pink-100/40 -mt-2 pt-6 pb-12">
    <main class="max-w-[1440px] mx-auto px-8 animate-fadeIn">

        <!-- شبكة التقسيم الثلاثية المودرن -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- ========================================== -->
            <!-- LEFT SIDEBAR: كرت البروفايل العصري مع الإحصائيات الجداد -->
            <!-- ========================================== -->
            <aside class="lg:col-span-3 sticky top-24">
                <div class="bg-white/90 backdrop-blur-md rounded-[24px] border border-white/60 p-5 shadow-sm flex flex-col items-center text-center">
                    
                    <!-- صورة البروفايل الدائرية -->
                    <div class="relative group cursor-pointer mb-3">
                        <div class="w-20 h-20 rounded-full p-0.5 bg-gradient-to-tr from-[--primary] to-[--pink] shadow-md overflow-hidden">
                            @if(auth()->user()->avatar)
                                <img src="{{ auth()->user()->avatar }}" alt="" class="w-full h-full rounded-full object-cover bg-white">
                            @else
                                <div class="w-full h-full rounded-full flex items-center justify-center text-white font-bold text-xl bg-slate-900">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- الاسم والـ Headline -->
                    <a href="{{ route('users.show', auth()->user()) }}" class="hover:text-[--primary] transition">
                        <h2 class="font-bold text-base text-slate-900">{{ auth()->user()->name }}</h2>
                    </a>
                    <p class="text-[11px] text-slate-400 mt-1 font-medium max-w-[180px]">{{ auth()->user()->headline ?? 'Développeur Full-Stack' }}</p>
                    
                    @if(auth()->user()->company)
                        <span class="mt-2 text-[10px] bg-indigo-50 border border-indigo-100 text-[--primary] font-bold px-2.5 py-1 rounded-full">
                            <i class="fa-solid fa-briefcase mr-1 text-[--primary]"></i> {{ auth()->user()->company }}
                        </span>
                    @endif

                    <!-- line -->
                    <div class="w-full h-[1px] bg-pink-100/60 my-4"></div>

                    <!-- أزرار التنقل السريع -->
                    <div class="w-full space-y-1">
                        <a href="{{ route('feed') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-indigo-50 text-[--primary] font-bold text-xs transition shadow-xs">
                            <i class="fa-solid fa-house text-sm"></i>
                            <span>Fil d'actualité</span>
                        </a>
                        <a href="{{ route('users.show', auth()->user()) }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-500 hover:bg-pink-50/50 hover:text-[--pink] font-semibold text-xs transition">
                            <i class="fa-regular fa-user text-sm"></i>
                            <span>Mon Profil public</span>
                        </a>
                    </div>

                    <!-- كرت الإحصائيات المطور (Abonnés / Abonnements) -->
                    <div class="w-full mt-5 bg-gradient-to-br from-indigo-50 via-purple-50/50 to-pink-50 border border-purple-100/40 rounded-2xl p-3.5 text-left shadow-2xs">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Statistiques</p>
                        
                        <div class="flex justify-between items-center mt-2.5">
                            <span class="text-xs text-slate-600 font-medium">Abonnés</span>
                            <span class="text-xs font-bold text-slate-900 bg-white/80 shadow-xs px-2 py-0.5 rounded-md">
                                {{ auth()->user()->followers ? auth()->user()->followers->count() : 0 }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center mt-1.5">
                            <span class="text-xs text-slate-600 font-medium">Abonnements</span>
                            <span class="text-xs font-bold text-slate-900 bg-white/80 shadow-xs px-2 py-0.5 rounded-md">
                                {{ auth()->user()->followings ? auth()->user()->followings->count() : 0 }}
                            </span>
                        </div>

                        <div class="w-full h-[1px] bg-purple-100/40 my-2"></div>

                        <div class="flex justify-between items-center">
                            <span class="text-xs text-slate-600 font-medium">Vos posts</span>
                            <span class="text-xs font-bold text-slate-900 bg-white/80 shadow-xs px-2 py-0.5 rounded-md">
                                {{ $posts->where('user_id', auth()->id())->count() }}
                            </span>
                        </div>
                    </div>

                </div>
            </aside>

            <!-- ========================================== -->
            <!-- CENTER: صندوق البوست الجديد وقائمة المنشورات -->
            <!-- ========================================== -->
            <section class="lg:col-span-6 space-y-4">
                
                <!-- صندوق إنشاء منشور سريع -->
                <div class="bg-white/90 backdrop-blur-md rounded-[24px] border border-white/60 p-4 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full overflow-hidden shrink-0 border border-slate-200">
                            @if(auth()->user()->avatar)
                                <img src="{{ auth()->user()->avatar }}" alt="" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-white text-xs font-bold bg-slate-400">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                        <a href="{{ route('posts.create') }}" class="flex-1 bg-indigo-50/40 hover:bg-indigo-50/80 border border-indigo-100/50 rounded-xl py-2.5 px-4 text-xs font-bold text-indigo-400 text-left transition duration-200 cursor-pointer flex items-center justify-between">
                            <span>Quoi de neuf aujourd'hui ?</span>
                            <i class="fa-solid fa-pen-to-square text-[--primary] text-sm"></i>
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-100 rounded-xl p-3.5 text-xs font-bold text-[--primary] flex items-center gap-2 shadow-xs">
                        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-gradient-to-r from-rose-50 to-pink-50 border border-rose-100 rounded-xl p-3.5 text-xs font-bold text-rose-600 flex items-center gap-2 shadow-xs">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}
                    </div>
                @endif

                <!-- قائمة المنشورات -->
                <div class="space-y-4">
                    @forelse($posts as $post)
                        @php
                            $isRepost = $post->original_post_id ? true : false;
                            $displayPost = $isRepost ? $post->originalPost : $post;
                        @endphp

                        {{-- تخطي البوست إذا كان الأصلي محذوفاً --}}
                        @if(!$displayPost)
                            @continue
                        @endif

                        @php
                            $hasReposted = \App\Models\Post::where('user_id', auth()->id())
                                                          ->where('original_post_id', $displayPost->id)
                                                          ->exists();
                            
                            $hasLiked = $displayPost->likes ? $displayPost->likes->contains('user_id', auth()->id()) : false;
                        @endphp

                        <div class="bg-white rounded-[24px] border border-purple-100/40 shadow-xs overflow-hidden transition-all hover:shadow-md hover:shadow-purple-100/50"> 
                            
                            <!-- الـ Header الفوقاني الخاص بالـ Repost (بحال LinkedIn) -->
                            @if($isRepost)
                                <div class="px-5 pt-4 pb-1 border-b border-slate-50 flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <!-- صورة الشخص اللي دار الـ Repost -->
                                        <div class="w-6 h-6 rounded-full overflow-hidden border border-slate-200 shadow-2xs shrink-0">
                                            @if($post->user->avatar)
                                                <img src="{{ $post->user->avatar }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-[10px] text-white bg-slate-800 font-bold">
                                                    {{ strtoupper(substr($post->user->name, 0, 2)) }}
                                                </div>
                                            @endif
                                        </div>
                                        <!-- نص إعادة النشر -->
                                        <span class="text-xs text-slate-500 font-medium">
                                            <strong class="text-slate-800 font-bold hover:text-[--primary] cursor-pointer">{{ $post->user->name }}</strong> a republié ceci
                                        </span>
                                    </div>
                                    
                                    {{-- خيارات الـ Repost: الحذف يلا كان ديال المستخدم الحالي --}}
                                    @if(auth()->id() === $post->user_id)
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="m-0" onsubmit="return confirm('Retirer ce repost ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-slate-400 hover:text-rose-500 p-1 rounded-md transition cursor-pointer" title="Retirer le repost">
                                                <i class="fa-solid fa-ellipsis text-sm"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @endif

                            <!-- معلومات كاتب البوست الأصلي -->
                            <div class="p-5 pb-3 flex justify-between items-start">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('users.show', $displayPost->user) }}" class="w-11 h-11 rounded-full overflow-hidden shrink-0 block border border-purple-100 p-0.5 bg-white shadow-xs">
                                        @if($displayPost->user->avatar)
                                            <img src="{{ $displayPost->user->avatar }}" alt="" class="w-full h-full rounded-full object-cover">
                                        @else
                                            <div class="w-full h-full rounded-full text-white flex items-center justify-center text-xs font-bold bg-slate-900">
                                                {{ strtoupper(substr($displayPost->user->name, 0, 2)) }}
                                            </div>
                                        @endif
                                    </a>
                                    <div>
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <a href="{{ route('users.show', $displayPost->user) }}" class="text-xs font-bold text-slate-900 hover:text-[--primary] transition">
                                                {{ $displayPost->user->name }}
                                            </a>
                                            
                                            <!-- زر الـ Follow للكاتب الأصلي -->
                                            @if(auth()->id() !== $displayPost->user_id)
                                                <form action="{{ route('users.follow', $displayPost->user) }}" method="POST" class="m-0 inline">
                                                    @csrf
                                                    @if(auth()->user()->isFollowing($displayPost->user))
                                                        <button type="submit" class="text-[9px] bg-purple-100 text-purple-900 border border-purple-300 px-2 py-0.5 rounded-full font-bold transition hover:bg-rose-100 hover:text-rose-700 hover:border-rose-300 cursor-pointer">
                                                            <i class="fa-solid fa-user-check mr-0.5"></i> Following
                                                        </button>
                                                    @else
                                                        <button type="submit" class="text-[9px] bg-slate-900 text-white px-2.5 py-0.5 rounded-full font-extrabold shadow-sm transition hover:bg-slate-800 cursor-pointer">
                                                            <i class="fa-solid fa-user-plus mr-0.5"></i> Follow
                                                        </button>
                                                    @endif
                                                </form>
                                            @endif
                                        </div>
                                        <p class="text-[10px] text-slate-400 font-medium mt-0.5 line-clamp-1 max-w-[280px]">
                                            {{ $displayPost->user->headline ?? 'Professionnel' }}
                                        </p>
                                        <p class="text-[9px] text-indigo-300 flex items-center gap-1 mt-0.5 font-semibold">
                                            <i class="fa-regular fa-clock"></i> <span>{{ $displayPost->created_at->diffForHumans(null, true) }}</span>
                                        </p>
                                    </div>
                                </div>

                                {{-- خيارات تعديل/حذف البوست الأصلي (كتظهر فقط يلا ما كانش هاد السطر عبارة عن Repost لواحد آخر) --}}
                                @if(!$isRepost)
                                    @can('update', $displayPost)
                                        <div class="flex items-center gap-1 bg-pink-50/50 p-1 rounded-lg border border-pink-100/30">
                                            <a href="{{ route('posts.edit', $displayPost) }}" class="text-[10px] font-bold text-slate-400 hover:text-[--primary] hover:bg-white px-2 py-1 rounded-md transition" title="Modifier">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <form action="{{ route('posts.destroy', $displayPost) }}" method="POST" class="m-0" onsubmit="return confirm('Supprimer ce post ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-[10px] font-bold text-slate-400 hover:text-rose-500 hover:bg-white px-2 py-1 rounded-md transition cursor-pointer" title="Supprimer">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                @endif
                            </div>

                            <!-- نص المنشور -->
                            <div class="px-5 pb-4">
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed font-normal whitespace-pre-line">{{ $displayPost->content }}</p>
                            </div>

                            <!-- عداد التفاعلات والـ Reposts -->
                            <div class="px-5 py-2.5 bg-gradient-to-r from-indigo-50/30 to-pink-50/20 border-t border-b border-purple-50 flex justify-between items-center text-[10px] text-slate-400 font-semibold">
                                <span class="flex items-center gap-1.5">
                                    <span class="bg-gradient-to-r from-[--primary] to-[--pink] text-white rounded-full w-4 h-4 flex items-center justify-center text-[8px] shadow-xs">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </span> 
                                    <span class="text-slate-700 font-bold">{{ $displayPost->likes ? $displayPost->likes->count() : 0 }}</span>
                                </span>
                                <div class="flex items-center gap-3">
                                    <span><i class="fa-regular fa-comment-dots text-[--primary]"></i> {{ $displayPost->comments->count() }} {{ Str::plural('commentaire', $displayPost->comments->count()) }}</span>
                                    <span><i class="fa-solid fa-arrows-rotate text-emerald-500"></i> {{ \App\Models\Post::where('original_post_id', $displayPost->id)->count() }} {{ Str::plural('partage', \App\Models\Post::where('original_post_id', $displayPost->id)->count()) }}</span>
                                </div>
                            </div>

                            <!-- أزرار التفاعل (J'aime, Commenter, Repost) -->
                            <div class="px-4 py-1 flex items-center gap-1 bg-white border-b border-purple-50/50">
                                <!-- Like -->
                                <form action="{{ route('posts.like', $displayPost) }}" method="POST" class="m-0 flex-1">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center justify-center gap-2 py-2 rounded-xl text-xs font-bold transition cursor-pointer {{ $hasLiked ? 'text-[--primary] bg-indigo-50/60' : 'text-slate-500 hover:bg-purple-50/40 hover:text-[--primary]' }}">
                                        <i class="fa-{{ $hasLiked ? 'solid' : 'regular' }} fa-thumbs-up text-sm"></i>
                                        <span>J'aime</span>
                                    </button>
                                </form>

                                <!-- Comment -->
                                <div class="flex-1 flex items-center justify-center gap-2 py-2 rounded-xl text-slate-500 hover:bg-pink-50/40 hover:text-[--pink] font-bold text-xs cursor-pointer">
                                    <i class="fa-regular fa-comment text-sm"></i>
                                    <span>Commenter</span>
                                </div>

                                <!-- Repost -->
                                <form action="{{ route('posts.repost', $displayPost) }}" method="POST" class="m-0 flex-1">
                                    @csrf
                                    @if($hasReposted)
                                        <button type="submit" class="w-full flex items-center justify-center gap-2 py-2 rounded-xl text-emerald-600 bg-emerald-50 border border-emerald-200 font-bold text-xs cursor-pointer transition hover:bg-rose-50 hover:text-rose-600 hover:border-rose-200 group">
                                            <i class="fa-solid fa-arrows-rotate text-sm group-hover:rotate-180 transition-transform duration-300"></i>
                                            <span>Unrepost</span>
                                        </button>
                                    @else
                                        <button type="submit" class="w-full flex items-center justify-center gap-2 py-2 rounded-xl text-slate-500 hover:bg-emerald-50 hover:text-emerald-600 font-bold text-xs cursor-pointer transition">
                                            <i class="fa-solid fa-arrows-rotate text-sm"></i>
                                            <span>Repost</span>
                                        </button>
                                    @endif
                                </form>
                            </div>

                            <!-- صندوق التعليقات -->
                            <div class="bg-gradient-to-b from-purple-50/20 to-pink-50/10 p-4 space-y-2.5">
                                @foreach($displayPost->comments as $comment)
                                    <div class="flex gap-2.5 items-start text-xs bg-white/80 backdrop-blur-xs p-3 rounded-2xl border border-purple-50 shadow-2xs group/comment">
                                        <div class="flex-1">
                                            <div class="flex justify-between items-center">
                                                <span class="font-bold text-slate-900 text-[11px]">{{ $comment->user->name }}</span>
                                                
                                                {{-- زر مسح التعليق --}}
                                                @if(auth()->id() === $comment->user_id || auth()->id() === $displayPost->user_id)
                                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="m-0 inline" onsubmit="return confirm('Supprimer ce commentaire ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-slate-400 hover:text-rose-500 transition opacity-0 group-hover/comment:opacity-100 p-1 cursor-pointer" title="Supprimer le commentaire">
                                                            <i class="fa-solid fa-trash-can text-[10px]"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                            <p class="text-slate-600 mt-1.5 leading-normal text-xs font-normal">{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                @endforeach

                                <form action="{{ route('comments.store', $displayPost) }}" method="POST" class="mt-2 flex gap-2 m-0 pt-1">
                                    @csrf
                                    <input type="text" name="content" placeholder="Écrire un commentaire..." required max="500"
                                           class="flex-1 text-xs border border-purple-100 rounded-xl px-4 py-2.5 bg-white focus:outline-none focus:border-[--primary] transition shadow-2xs placeholder-slate-300 text-slate-700">
                                    <button type="submit" class="bg-slate-900 text-white text-[11px] px-4 py-2 rounded-xl font-bold hover:bg-[--primary] transition cursor-pointer shadow-xs">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <div class="bg-white/80 border border-white p-12 rounded-[24px] text-center shadow-sm">
                            <p class="text-xs text-slate-400 font-bold">Aucun post disponible pour le moment.</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <!-- RIGHT SIDEBAR -->
            <aside class="lg:col-span-3 sticky top-24 space-y-4">
                <div class="bg-white/90 backdrop-blur-md rounded-[24px] border border-white/60 p-5 shadow-sm">
                    <h3 class="font-extrabold text-sm text-slate-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-fire text-orange-500 text-xs"></i>
                        <span>Tendances</span>
                    </h3>
                    <ul class="space-y-3.5">
                        <li class="group cursor-pointer flex items-start gap-2.5">
                            <div class="text-[--primary] font-bold mt-0.5 text-xs">#</div>
                            <div>
                                <p class="text-xs font-bold text-slate-800 group-hover:text-[--primary] transition truncate">Laravel</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>

        </div>
    </main>
</div>
@endsection