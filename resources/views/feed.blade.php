@extends('layouts.app')

@section('content')
<!-- زدت ليك هنا خلفية بتدرج بنفسجي ووردي ناعم وخفيف بزاف بحال الصورة تماماً -->
<div class="min-h-screen bg-gradient-to-br from-indigo-100/40 via-purple-50/30 to-pink-100/40 -mt-2 pt-6 pb-12">
    <main class="max-w-[1440px] mx-auto px-8 animate-fadeIn">

        <!-- شبكة التقسيم الثلاثية المودرن بحال الصورة -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- ========================================== -->
            <!-- LEFT SIDEBAR: كرت البروفايل العصري (ستايل عايم) -->
            <!-- ========================================== -->
            <aside class="lg:col-span-3 sticky top-24">
                <div class="bg-white/90 backdrop-blur-md rounded-[24px] border border-white/60 p-5 shadow-sm flex flex-col items-center text-center">
                    
                    <!-- صورة البروفايل الدائرية مع التدرج اللوني المحيط بها -->
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
                        <!-- حيدت الرمادي هنا ورديتو بنفسجي خفيف أنيق -->
                        <span class="mt-2 text-[10px] bg-indigo-50 border border-indigo-100 text-[--primary] font-bold px-2.5 py-1 rounded-full">
                            <i class="fa-solid fa-briefcase mr-1 text-[--primary]"></i> {{ auth()->user()->company }}
                        </span>
                    @endif

                    <!-- خط فاصل نقي وردي خفيف -->
                    <div class="w-full h-[1px] bg-pink-100/60 my-4"></div>

                    <!-- أزرار التنقل السريع بستايل القائمة الجانبية للصورة -->
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

                    <!-- كرت صغير سفلي للإحصائيات ستايل Premium من الصورة بتدرج وردي وبنفسجي مبهج -->
                    <div class="w-full mt-5 bg-gradient-to-br from-indigo-50 via-purple-50/50 to-pink-50 border border-purple-100/40 rounded-2xl p-3.5 text-left shadow-2xs">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Statistiques</p>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-xs text-slate-600 font-medium">Vos posts</span>
                            <span class="text-xs font-bold text-slate-900 bg-white/80 shadow-xs px-2 py-0.5 rounded-md">{{ $posts->where('user_id', auth()->id())->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center mt-1.5">
                            <span class="text-xs text-slate-600 font-medium">Total global</span>
                            <span class="text-xs font-bold text-[--primary] bg-white/80 shadow-xs px-2 py-0.5 rounded-md">{{ $posts->count() }}</span>
                        </div>
                    </div>

                </div>
            </aside>

            <!-- ========================================== -->
            <!-- CENTER: صندوق البوست الجديد وقائمة المنشورات العايمة -->
            <!-- ========================================== -->
            <section class="lg:col-span-6 space-y-4">
                
                <!-- صندوق إنشاء منشور سريع (Commencer un post) -->
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
                        <!-- البار رجع بنفسجي/وردي خفيف بزاف ومبهج -->
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

                <!-- قائمة المنشورات بستايل الكروت المودرن البيضاء المتناسقة -->
                <div class="space-y-4">
                    @forelse($posts as $post)
                        <div class="bg-white rounded-[24px] border border-purple-100/40 shadow-xs overflow-hidden transition-all hover:shadow-md hover:shadow-purple-100/50"> 
                            
                            <!-- معلومات الكاتب (User Header) -->
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
                                        <div class="flex items-center gap-1.5">
                                            <a href="{{ route('users.show', $post->user) }}" class="text-xs font-bold text-slate-900 hover:text-[--primary] transition">
                                                {{ $post->user->name }}
                                            </a>
                                            <span class="text-[9px] bg-pink-50 text-[--pink] px-1.5 py-0.5 rounded font-bold uppercase tracking-wider">Réseau</span>
                                        </div>
                                        <p class="text-[10px] text-slate-400 font-medium mt-0.5 line-clamp-1 max-w-[280px]">
                                            {{ $post->user->headline ?? 'Professionnel sur LinkUp' }}
                                        </p>
                                        <p class="text-[9px] text-indigo-300 flex items-center gap-1 mt-0.5 font-semibold">
                                            <i class="fa-regular fa-clock"></i> <span>{{ $post->created_at->diffForHumans(null, true) }}</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- أزرار التحكم بـ Icons نقيين وخلفية وردية خفيفة -->
                                @can('update', $post)
                                    <div class="flex items-center gap-1 bg-pink-50/50 p-1 rounded-lg border border-pink-100/30">
                                        <a href="{{ route('posts.edit', $post) }}" class="text-[10px] font-bold text-slate-400 hover:text-[--primary] hover:bg-white px-2 py-1 rounded-md transition" title="Modifier">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="m-0" onsubmit="return confirm('Supprimer ce post ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[10px] font-bold text-slate-400 hover:text-rose-500 hover:bg-white px-2 py-1 rounded-md transition cursor-pointer" title="Supprimer">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endcan
                            </div>

                            <!-- نص المنشور (Body Content) -->
                            <div class="px-5 pb-4">
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed font-normal whitespace-pre-line">{{ $post->content }}</p>
                            </div>

                            <!-- عداد التفاعلات والتعليقات النقي بخلفية ملونة ناعمة عوض الرمادي -->
                            <div class="px-5 py-2.5 bg-gradient-to-r from-indigo-50/30 to-pink-50/20 border-t border-b border-purple-50 flex justify-between items-center text-[10px] text-slate-400 font-semibold">
                                <span class="flex items-center gap-1.5">
                                    <span class="bg-gradient-to-r from-[--primary] to-[--pink] text-white rounded-full w-4 h-4 flex items-center justify-center text-[8px] shadow-xs">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </span> 
                                    <span class="text-slate-700 font-bold">{{ $post->likes ? $post->likes->count() : 0 }}</span> mentions j'aime
                                </span>
                                <span class="flex items-center gap-1 text-slate-400">
                                    <i class="fa-regular fa-comment-dots text-xs text-[--primary]"></i> {{ $post->comments->count() }} {{ Str::plural('commentaire', $post->comments->count()) }}
                                </span>
                            </div>

                            <!-- أزرار التفاعل الفاخرة -->
                            <div class="px-4 py-1 flex items-center gap-1 bg-white">
                                <!-- Like Button -->
                                <form action="{{ route('posts.like', $post) }}" method="POST" class="m-0 flex-1">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center justify-center gap-2 py-2 rounded-xl text-xs font-bold transition cursor-pointer {{ $post->likes && $post->likes->contains(auth()->id()) ? 'text-[--primary] bg-indigo-50/60' : 'text-slate-500 hover:bg-purple-50/40 hover:text-[--primary]' }}">
                                        <i class="fa-{{ $post->likes && $post->likes->contains(auth()->id()) ? 'solid' : 'regular' }} fa-thumbs-up text-sm"></i>
                                        <span>J'aime</span>
                                    </button>
                                </form>

                                <!-- Comment Placeholder -->
                                <div class="flex-1 flex items-center justify-center gap-2 py-2 rounded-xl text-slate-500 hover:bg-pink-50/40 hover:text-[--pink] font-bold text-xs cursor-pointer">
                                    <i class="fa-regular fa-comment text-sm"></i>
                                    <span>Commenter</span>
                                </div>
                            </div>

                            <!-- صندوق التعليقات مدمج بذكاء مع تدرج خفيف -->
                            <div class="bg-gradient-to-b from-purple-50/20 to-pink-50/10 p-4 border-t border-purple-50 space-y-2.5">
                                @foreach($post->comments as $comment)
                                    <div class="flex gap-2.5 items-start text-xs bg-white/80 backdrop-blur-xs p-3 rounded-2xl border border-purple-50 shadow-2xs">
                                        <div class="flex-1">
                                            <div class="flex justify-between items-center">
                                                <span class="font-bold text-slate-900 text-[11px]">{{ $comment->user->name }}</span>
                                                @can('delete', $comment)
                                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="m-0" onsubmit="return confirm('Supprimer ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-slate-300 hover:text-rose-500 transition font-bold text-[10px] cursor-pointer">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                            <p class="text-[9px] text-slate-400 font-medium">{{ $comment->user->headline ?? 'Membre' }}</p>
                                            <p class="text-slate-600 mt-1.5 leading-normal text-xs font-normal">{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- فورم إضافة تعليق دائري ومريح للعين بوردر بنفسجي ناعم -->
                                <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-2 flex gap-2 m-0 pt-1">
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
                            <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-[--primary] mx-auto mb-3">
                                <i class="fa-regular fa-folder-open text-xl"></i>
                            </div>
                            <p class="text-xs text-slate-400 font-bold">Aucun post disponible pour le moment.</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <!-- ========================================== -->
            <!-- RIGHT SIDEBAR: كرت الـ Trends بستايل الصورة الدائرية -->
            <!-- ========================================== -->
            <aside class="lg:col-span-3 sticky top-24 space-y-4">
                
                <!-- كرت التوجهات الهاشتاغات الحقيقية النظيفة وبوردر ناعم -->
                <div class="bg-white/90 backdrop-blur-md rounded-[24px] border border-white/60 p-5 shadow-sm">
                    <h3 class="font-extrabold text-sm text-slate-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-fire text-orange-500 text-xs animate-bounce"></i>
                        <span>Tendances</span>
                    </h3>
                    <ul class="space-y-3.5">
                        <li class="group cursor-pointer flex items-start gap-2.5">
                            <div class="text-[--primary] font-bold mt-0.5 text-xs">#</div>
                            <div>
                                <p class="text-xs font-bold text-slate-800 group-hover:text-[--primary] transition truncate">Laravel</p>
                                <p class="text-[10px] text-slate-400 font-medium mt-0.5">Framework PHP moderne</p>
                            </div>
                        </li>
                        <li class="group cursor-pointer flex items-start gap-2.5">
                            <div class="text-[--primary] font-bold mt-0.5 text-xs">#</div>
                            <div>
                                <p class="text-xs font-bold text-slate-800 group-hover:text-[--primary] transition truncate">React</p>
                                <p class="text-[10px] text-slate-400 font-medium mt-0.5">Développement Front-end</p>
                            </div>
                        </li>
                        <li class="group cursor-pointer flex items-start gap-2.5">
                            <div class="text-[--primary] font-bold mt-0.5 text-xs">#</div>
                            <div>
                                <p class="text-xs font-bold text-slate-800 group-hover:text-[--primary] transition truncate">IntelligenceArtificielle</p>
                                <p class="text-[10px] text-slate-400 font-medium mt-0.5">Les nouveautés de l'IA</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>

        </div>
    </main>
</div>
@endsection