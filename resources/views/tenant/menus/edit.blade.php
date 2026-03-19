@extends('layouts.tenant')

@section('title', 'Refine Dish Details')

@section('content')
    <header class="mb-16">
        <h2 class="text-6xl font-black tracking-tighter text-slate-900 mb-2 font-primary italic">Edit Signature Dish 🍽️</h2>
        <p class="text-xl text-slate-500 font-medium italic opacity-80 opacity-80">Update the recipe, price, or presentation for "{{ $menu->name }}".</p>
    </header>

    <div class="bg-white rounded-[4rem] shadow-2xl shadow-indigo-200/50 border border-slate-100 p-16 max-w-4xl max-w-4xl">
        <form action="{{ route('tenant.menu.update', $menu->id) }}" method="POST" class="space-y-12">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="space-y-4">
                    <label for="name" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Dish Name</label>
                    <input type="text" name="name" id="name" value="{{ $menu->name }}" required class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-2xl font-black text-slate-900 tracking-tight tracking-tight">
                </div>

                <div class="space-y-4">
                    <label for="price" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Price Point ($)</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ $menu->price }}" required class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-2xl font-black text-indigo-700 tracking-tighter">
                </div>
            </div>

            <div class="space-y-4">
                <label for="description" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Culinary Description</label>
                <textarea name="description" id="description" rows="3" placeholder="Crafted with passion..." class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-xl font-medium text-slate-700 leading-relaxed">{{ $menu->description }}</textarea>
            </div>

            <div class="space-y-4">
                <label for="image_url" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Visual Asset Link (URL)</label>
                <input type="url" name="image_url" id="image_url" value="{{ $menu->image_url }}" placeholder="https://unsplash.com/..." class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-sm font-bold text-indigo-600 tracking-tight tracking-tight">
            </div>

            <div class="flex gap-6 pt-10 pt-10 pt-10">
                <button type="submit" class="flex-1 bg-indigo-600 text-white py-6 rounded-[2.5rem] font-black uppercase tracking-widest hover:bg-slate-900 shadow-2xl shadow-indigo-200 transition hover:scale-[1.03]">Save Dish Changes</button>
                <a href="{{ route('tenant.menu.index') }}" class="bg-slate-100 text-slate-500 px-12 py-6 rounded-[2.5rem] font-bold flex items-center justify-center hover:bg-gray-200 transition transition transition">Cancel</a>
            </div>
        </form>
    </div>
@endsection
