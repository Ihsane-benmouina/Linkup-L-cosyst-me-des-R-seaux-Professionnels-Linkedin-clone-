<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp — Professional Network</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50/50 text-slate-900 antialiased selection:bg-blue-500 selection:text-white">

    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-600 text-white font-black text-xl px-3 py-1.5 rounded-xl shadow-xs tracking-tight">
                        LU
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-800 hidden sm:block">
                        Link<span class="text-blue-600">Up</span>
                    </span>
                </div>

                <div class="flex items-center space-x-1 sm:space-x-4">
                    <a href="#" class="bg-slate-100 text-blue-600 px-4 py-2 rounded-xl text-sm font-semibold transition">
                        Feed
                    </a>
                    <a href="#" class="text-slate-600 hover:text-slate-900 px-3 py-2 rounded-xl text-sm font-medium transition">
                        Réseau
                    </a>
                    <a href="#" class="text-slate-600 hover:text-slate-900 px-3 py-2 rounded-xl text-sm font-medium transition">
                        Messages
                    </a>
                </div>

                <div class="flex items-center space-x-3 border-l border-slate-200 pl-4">
                    <div class="w-9 h-9 rounded-full bg-blue-100 border border-blue-200 flex items-center justify-center text-blue-600 font-bold text-sm">
                        I
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

</body>
</html>