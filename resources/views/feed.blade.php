@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto px-6 py-8">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- ========================= -->
        <!-- LEFT SIDEBAR -->
        <!-- ========================= -->
        <aside class="lg:col-span-3">
            <a href=""
class="block bg-white rounded-[30px] overflow-hidden border border-[--border] shadow-sm hover:shadow-xl transition duration-300 sticky top-24">

    <div
        class="h-28"
        style="background:linear-gradient(135deg,var(--primary),var(--primary-light),var(--pink));">
    </div>

    <div class="-mt-10 flex justify-center">

        <div
            class="w-20 h-20 rounded-full bg-white p-1 shadow">

            <div
                class="w-full h-full rounded-full flex items-center justify-center text-white font-bold text-xl"
                style="background:linear-gradient(135deg,var(--primary),var(--pink));">

                {{ strtoupper(substr(auth()->user()->name,0,2)) }}

            </div>

        </div>

    </div>

    <div class="text-center px-5 pb-6">

        <h2 class="font-bold text-lg text-[--ink]">

            {{ auth()->user()->name }}

        </h2>

        <p class="text-sm text-[--muted] mt-1">

            {{ auth()->user()->headline }}

        </p>

        @if(auth()->user()->company)

        <p class="text-xs mt-2 text-gray-400">

            {{ auth()->user()->company }}

        </p>

        @endif

    </div>

    <div class="border-t border-[--border] p-5 space-y-4">

        <div class="flex justify-between">

            <span class="text-sm">

                Mes Posts

            </span>

            <span
                class="font-bold"
                style="color:var(--primary);">

                {{ $posts->where('user_id',auth()->id())->count() }}

            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-sm">

                Publications

            </span>

            <span
                class="font-bold"
                style="color:var(--pink);">

                {{ $posts->count() }}

            </span>

        </div>

    </div>

    <div
        class="border-t border-[--border] p-5 text-center font-semibold"
        style="color:var(--primary);">

        Voir mon profil →

    </div>

</a>

        </aside>

        <!-- ========================= -->
        <!-- CENTER -->
        <!-- ========================= -->
        <section class="lg:col-span-6">
            @if(session('success'))
<div
    class="mb-5 rounded-2xl border p-4 text-sm"
    style="background:var(--green-light);border-color:#B7ECD3;color:#16794B;">

    {{ session('success') }}

</div>
@endif


    <!-- Welcome banner -->
   <div
class="rounded-[30px] overflow-hidden shadow-lg mb-6">

    <div
    class="p-8 text-white relative"

    style="background:linear-gradient(135deg,var(--primary),var(--primary-light),var(--pink));">

        <div
        class="absolute right-0 top-0 w-44 h-44 rounded-full bg-white/10 blur-xl"></div>

        <h1 class="text-3xl font-display font-bold relative">

            Bonjour {{ explode(' ', auth()->user()->name)[0] }} 👋

        </h1>

        <p class="mt-3 text-white/80 relative">

            Bienvenue sur votre réseau professionnel.

            Partagez vos idées et échangez avec votre communauté.

        </p>

    </div>

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
    <a
href="{{ route('posts.create') }}"

class="bg-white rounded-[30px] border border-[--border] p-5 flex items-center justify-between shadow-sm hover:shadow-lg transition mb-6">

<div class="flex items-center gap-4">

    <div

    class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold"

    style="background:linear-gradient(135deg,var(--primary),var(--pink));">

        {{ strtoupper(substr(auth()->user()->name,0,2)) }}

    </div>

    <div>

        <h3 class="font-semibold">

            Créer une publication

        </h3>

        <p class="text-sm text-gray-500">

            Partagez une idée avec votre réseau.

        </p>

    </div>

</div>

<div

class="px-5 py-2 rounded-full text-white"

style="background:linear-gradient(135deg,var(--primary),var(--pink));">

Créer

</div>

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
<div

class="bg-white rounded-[32px] border border-[--border] shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">                
                <!-- User Header -->
<div class="flex justify-between items-start p-6">                    <div class="flex items-start space-x-3">
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
<div class="px-6 pb-6">

<p

class="text-[15px] leading-8 whitespace-pre-line text-gray-700">

{{ $post->content }}

</p>

</div>
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
    </section>

<!-- ========================= -->
<!-- RIGHT SIDEBAR -->
<!-- ========================= -->

<aside class="lg:col-span-3">

    <div class="sticky top-24 space-y-5">

        <!-- Statistiques -->

        <div class="bg-white rounded-[30px] border border-[--border] p-6 shadow-sm">

            <h2 class="font-bold text-lg mb-5">

                📊 Vos statistiques

            </h2>

            <div class="space-y-4">

                <div class="flex justify-between">

                    <span>Total publications</span>

                    <strong style="color:var(--primary)">

                        {{ $posts->count() }}

                    </strong>

                </div>

                <div class="flex justify-between">

                    <span>Vos publications</span>

                    <strong style="color:var(--pink)">

                        {{ $posts->where('user_id',auth()->id())->count() }}

                    </strong>

                </div>

            </div>

        </div>

        <!-- Tendances -->

        <div class="bg-white rounded-[30px] border border-[--border] p-6 shadow-sm">

            <h2 class="font-bold text-lg mb-5">

                🔥 Tendances

            </h2>

            <div class="space-y-4">

                <div>

                    <p class="font-semibold">

                        #Laravel

                    </p>

                    <p class="text-sm text-gray-500">

                        Framework PHP moderne

                    </p>

                </div>

                <div>

                    <p class="font-semibold">

                        #React

                    </p>

                    <p class="text-sm text-gray-500">

                        Développement Front-end

                    </p>

                </div>

                <div>

                    <p class="font-semibold">

                        #IntelligenceArtificielle

                    </p>

                    <p class="text-sm text-gray-500">

                        Les nouveautés de l'IA

                    </p>

                </div>

            </div>

        </div>

        <!-- Citation -->

        <div
        class="rounded-[30px] p-6 text-white shadow-lg"

        style="background:linear-gradient(135deg,var(--primary),var(--pink));">

            <h2 class="font-bold text-lg">

                💡 Inspiration

            </h2>

            <p class="mt-4 text-white/90 leading-7">

                Le succès ne vient pas de ce que vous faites de temps en temps.

                Il vient de ce que vous faites constamment.

            </p>

        </div>

    </div>

</aside>

</div>

</main>

@endsection