@extends('layouts.app')

@section('content')
<main class="max-w-xl mx-auto px-4 py-8 animate-fadeIn">
    <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-8">
        
        <div class="mb-6">
            <h1 class="text-xl font-bold text-[--ink] flex items-center gap-1.5">✨ Personnaliser votre espace</h1>
            <p class="text-xs text-[--muted] mt-1">Ajustez vos infos publiques pour donner un sytle pro à votre profil.</p>
        </div>

        <form action="{{ route('profile.update',$user) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="headline" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Titre professionnel (Headline)</label>
                <input type="text" name="headline" id="headline" value="{{ old('headline', $user->headline) }}" 
                       placeholder="Ex: Développeuse Full-Stack PHP / Laravel"
                       class="w-full text-xs border border-slate-100 rounded-xl px-4 py-3 bg-slate-50/70 focus:outline-none focus:bg-white focus:border-[--primary] transition shadow-sm font-medium">
                @error('headline') <p class="text-rose-500 text-[11px] mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="company" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Entreprise actuelle (Company)</label>
                <input type="text" name="company" id="company" value="{{ old('company', $user->company) }}" 
                       placeholder="Ex: Freelance / ENAA Digital"
                       class="w-full text-xs border border-slate-100 rounded-xl px-4 py-3 bg-slate-50/70 focus:outline-none focus:bg-white focus:border-[--primary] transition shadow-sm font-medium">
                @error('company') <p class="text-rose-500 text-[11px] mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="avatar" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Lien URL de votre Photo de profil</label>
                <input type="url" name="avatar" id="avatar" value="{{ old('avatar', $user->avatar) }}" 
                       placeholder="https://images.unsplash.com/photo-..."
                       class="w-full text-xs border border-slate-100 rounded-xl px-4 py-3 bg-slate-50/70 focus:outline-none focus:bg-white focus:border-[--primary] transition shadow-sm font-medium">
                <p class="text-[9px] text-slate-400 mt-1">Collez le lien direct d'une photo trouvée sur internet.</p>
                @error('avatar') <p class="text-rose-500 text-[11px] mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end gap-2 pt-5 border-t border-slate-50 mt-6">
                <a href="{{ route('feed') }}" class="text-xs font-bold px-4 py-2.5 rounded-xl border border-slate-200 text-slate-500 hover:bg-slate-50 transition cursor-pointer">
                    Annuler
                </a>
                <button type="submit" class="bg-slate-900 text-white text-xs px-5 py-2.5 rounded-xl font-bold hover:bg-slate-800 transition shadow-sm cursor-pointer">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</main>
@endsection