@extends('layouts.app')

@section('content')
<main class="max-w-2xl mx-auto px-6 py-8">
    <div class="bg-white rounded-[32px] border border-[--border] shadow-md p-8">
        <h1 class="text-2xl font-bold mb-2 text-[--ink]">Personnaliser votre profil</h1>
        <p class="text-sm text-[--muted] mb-6">Mettez à jour vos informations professionnelles pour rester attractif.</p>

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Headline -->
            <div>
                <label for="headline" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Titre professionnel (Headline)</label>
                <input type="text" name="headline" id="headline" value="{{ old('headline', $user->headline) }}" 
                       placeholder="Ex: Développeur Full-Stack PHP / Laravel"
                       class="w-full text-sm border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 focus:outline-none focus:bg-white focus:border-[--primary] transition">
                @error('headline') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Company -->
            <div>
                <label for="company" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Entreprise actuelle (Company)</label>
                <input type="text" name="company" id="company" value="{{ old('company', $user->company) }}" 
                       placeholder="Ex: Linkup Inc. / Freelance"
                       class="w-full text-sm border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 focus:outline-none focus:bg-white focus:border-[--primary] transition">
                @error('company') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Avatar URL -->
            <div>
                <label for="avatar" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">URL de votre image de profil</label>
                <input type="url" name="avatar" id="avatar" value="{{ old('avatar', $user->avatar) }}" 
                       placeholder="https://example.com/photo.jpg"
                       class="w-full text-sm border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 focus:outline-none focus:bg-white focus:border-[--primary] transition">
                @error('avatar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-100">
                <a href="{{ route('feed') }}" class="text-xs font-semibold px-5 py-3 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition">
                    Annuler
                </a>
                <button type="submit" class="bg-[--primary] text-white text-xs px-6 py-3 rounded-xl font-semibold hover:opacity-90 transition shadow-sm cursor-pointer">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</main>
@endsection