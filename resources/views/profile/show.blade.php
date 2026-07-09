@extends('layouts.app')

@section('content')
<main class="max-w-4xl mx-auto px-6 py-8">
    <!-- Header du Profil -->
    <div class="bg-white rounded-[32px] overflow-hidden border border-[--border] shadow-sm mb-8">
        <div class="h-40" style="background:linear-gradient(135deg,var(--primary),var(--primary-light),var(--pink));"></div>
        <div class="-mt-16 px-8 pb-6 flex flex-col sm:flex-row items-center sm:items-end justify-between gap-4">
            <div class="flex flex-col sm:flex-row items-center sm:items-end gap-4 text-center sm:text-left">
                <div class="w-28 h-28 rounded-full bg-white p-1 shadow-lg shrink-0">
                    @if($user->avatar)
                        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-full h-full rounded-full object-cover">
                    @else
                        <div class="w-full h-full rounded-full flex items-center justify-center text-white font-bold text-3xl" style="background:linear-gradient(135deg,var(--primary),var(--pink));">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                    @endif
                </div>
                <div class="mb-2">
                    <h1 class="text-2xl font-bold text-[--ink]">{{ $user->name }}</h1>
                    <p class="text-sm text-[--muted] mt-1">{{ $user->headline ?? 'Membre Linkup' }}</p>
                    @if($user->company)
                        <p class="text-xs text-slate-400 mt-1">🏢 {{ $user->company }}</p>
                    @endif
                </div>
            </div>

            @if($user->id === auth()->id())
                <a href="{{ route('profile.edit') }}" class="px-5 py-2.5 rounded-full text-xs font-semibold border border-[--border] bg-slate-50 hover:bg-slate-100 transition shadow-sm mb-2">
                    Modifier le profil
                </a>
            @endif
        </div>
    </div>

    <!-- Historique des Posts -->
    <h2 class="font-bold text-lg mb-4 text-[--ink]">Publications de {{ $user->name }} ({{ $posts->count() }})</h2>
    
    <div class="space-y-6">
        @forelse($posts as $post)
            <div class="bg-white rounded-[32px] border border-[--border] shadow-sm p-6">
                <!-- الـ Header والكونتنت والـ Likes والـ Comments بنفس الكود المصلح اللي صاوبنا ف الـ Feed -->
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-9 h-9 rounded-full text-white flex items-center justify-center text-[10px] font-bold shrink-0" style="background:linear-gradient(135deg,var(--primary),var(--primary-light));">
                            {{ strtoupper(substr($post->user->name, 0, 2)) }}
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-[--ink]">{{ $post->user->name }}</h3>
                            <p class="text-[10px] text-[--muted] mt-0.5">{{ $post->user->headline }}</p>
                        </div>
                    </div>
                    <span class="text-[10px] text-[--muted]">
                        {{ $post->created_at->diffForHumans(null, true) }}
                    </span>
                </div>

                <div class="pb-4">
                    <p class="text-[15px] leading-8 text-gray-700 whitespace-pre-line">{{ $post->content }}</p>
                </div>

                <!-- التفاعلات المبسطة في صفحة البروفايل -->
                <div class="flex items-center justify-between border-t border-slate-100 pt-3 text-xs text-slate-500">
                    <span>👍 {{ $post->likes ? $post->likes->count() : 0 }} Likes</span>
                    <span>💬 {{ $post->comments->count() }} {{ Str::plural('commentaire', $post->comments->count()) }}</span>
                </div>
            </div>
        @empty
            <div class="bg-white border border-dashed border-[--border] p-10 rounded-2xl text-center">
                <p class="text-3xl mb-2">📭</p>
                <p class="text-xs text-[--muted]">Aucune publication trouvée pour cet utilisateur.</p>
            </div>
        @endforelse
    </div>
</main>
@endsection