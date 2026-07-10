<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'LinkUp' }}</title>
    
    <!-- Tailwind & Google Fonts -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- 🌟 زدت ليك هنا مكتبة FontAwesome 6 الرسمية والأنيقة -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary: #6366f1;         /* بنفسجي ملكي مودرن */
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --pink: #ec4899;            /* وردي حيوي */
            --pink-light: #fce7f3;
            --bg: #f4f5fa;              /* نفس خلفية الصورة المريحة */
            --border: #e2e8f0;          /* حدود خفيفة جداً */
            --ink: #0f172a;             /* لون نصوص غامق وأنيق */
            --muted: #64748b;
        }
        body {
            background-color: var(--bg) !important;
            color: var(--ink);
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.4s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="antialiased" style="background:var(--bg); color:var(--ink);">

    <!-- ========================================== -->
    <!-- NEW NAVBAR: ستايل مودرن، نقي وعايم بـ Icons FontAwesome -->
    <!-- ========================================== -->
    <nav class="bg-white/80 backdrop-blur-xl sticky top-0 z-50 px-8 py-4 flex justify-between items-center max-w-[1440px] mx-auto mt-2 rounded-[24px] shadow-sm border border-slate-100/50">
        
        <!-- لفت: اللوغو والسمية بستايل طاير -->
        <div class="flex items-center gap-6">
            <a href="{{ route('feed') }}" class="flex items-center gap-2.5 group">
                <!-- Icon ديال اللوغو رجع صاروخ FontAwesome نقي -->
                <div class="w-9 h-9 text-white text-sm rounded-xl flex items-center justify-center shadow-sm transition-transform group-hover:scale-105"
                     style="background: linear-gradient(135deg, var(--primary), var(--primary-light));">
                    <i class="fa-solid fa-rocket animate-pulse"></i>
                </div>
                <span class="text-base font-extrabold tracking-tight text-[--ink]">
                    Link<span class="text-[--primary]">Up</span>
                </span>
            </a>

            <!-- بار البحث الوهمي بحال LinkedIn مع Icon نقي -->
            <div class="hidden md:flex items-center gap-2.5 bg-slate-50/80 border border-slate-100 px-4 py-2 rounded-xl w-64">
                <i class="fa-solid fa-magnifying-glass text-slate-400 text-xs"></i>
                <input type="text" placeholder="Rechercher sur LinkUp..." disabled class="bg-transparent text-xs w-full focus:outline-none text-slate-400 cursor-not-allowed">
            </div>
        </div>

        <!-- يمين: الإشعارات، البروفايل، وزر تسجيل الخروج -->
        <div class="flex items-center gap-4">
            
            <!-- أزرار الإشعارات والمراسلة بستايل FontAwesome الاحترافي -->
            <div class="hidden sm:flex items-center gap-2">
                <button class="w-9 h-9 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-xs text-slate-500 hover:text-[--primary] hover:bg-indigo-50/50 transition cursor-pointer">
                    <i class="fa-regular fa-bell text-sm"></i>
                </button>
                <button class="w-9 h-9 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-xs text-slate-500 hover:text-[--primary] hover:bg-indigo-50/50 transition cursor-pointer">
                    <i class="fa-regular fa-envelope text-sm"></i>
                </button>
            </div>

            <!-- خط فاصل خفيف -->
            <div class="hidden sm:block w-[1px] h-6 bg-slate-200/60 mx-1"></div>

            <!-- كرت المستخدم مصغر أنيق -->
            <a href="{{ route('users.show', auth()->user()) }}" class="flex items-center gap-3 p-1 pr-3 rounded-xl hover:bg-slate-50 transition">
                <div class="w-9 h-9 rounded-full overflow-hidden shrink-0 border border-slate-200 p-0.5 bg-white shadow-inner">
                    @if(auth()->user()->avatar)
                        <img src="{{ auth()->user()->avatar }}" alt="" class="w-full h-full rounded-full object-cover">
                    @else
                        <div class="w-full h-full rounded-full text-white flex items-center justify-center text-[10px] font-bold bg-gradient-to-tr from-[--primary] to-[--pink]">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                    @endif
                </div>
                <div class="hidden lg:block text-left">
                    <p class="text-xs font-bold text-[--ink] leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-[--muted] mt-0.5 font-medium max-w-[100px] truncate">{{ auth()->user()->headline ?? 'Développeur' }}</p>
                </div>
            </a>

            <!-- زر الخروج الأنيق والدائري بـ Icon نقي -->
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" title="Déconnexion" class="w-9 h-9 flex items-center justify-center rounded-xl text-xs font-semibold text-rose-500 bg-rose-50 hover:bg-rose-500 hover:text-white transition cursor-pointer">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </button>
            </form>

        </div>
    </nav>

    <!-- Dynamic Content -->
    <div class="pt-2">
        @yield('content')
    </div>

</body>
</html>