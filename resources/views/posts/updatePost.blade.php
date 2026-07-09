@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto px-4">
    <div class="bg-white border border-[--border] rounded-[1.75rem] p-6 shadow-[0_10px_30px_-12px_rgba(124,111,238,0.18)]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="font-display text-base font-bold text-[--ink] flex items-center space-x-2">
                <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm" style="background:var(--pink-light);">📝</span>
                <span>Modifier la publication</span>
            </h1>
            <a href="{{ route('feed') }}" class="text-xs text-[--muted] hover:text-[--primary] font-semibold transition">Annuler</a>
        </div>

        <form action="{{ route('posts.update', $post) }}" method="POST"   class="space-y-4">
    @csrf
    @method('PUT')>
           
   

            <div>
                <label class="block text-[11px] font-bold text-[--muted] uppercase tracking-wider mb-2">Contenu du post</label>
                <!-- Hna tslla7 l-khata2 dyal quotes -->
                <textarea name="content" rows="5" required
                          class="w-full bg-[--bg] border border-[--border] rounded-2xl p-4 text-xs focus:outline-none focus:border-[--primary] focus:ring-4 focus:ring-[--primary]/10 focus:bg-white transition">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-rose-600 text-[11px] mt-1.5 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full text-white font-bold text-xs py-3.5 rounded-full transition cursor-pointer shadow-lg shadow-[--primary]/20 hover:shadow-xl hover:-translate-y-0.5"
                    style="background:linear-gradient(135deg,var(--primary),var(--pink));">
                Enregistrer les modifications
            </button>
        </form>
    </div>
</div>
@endsection
