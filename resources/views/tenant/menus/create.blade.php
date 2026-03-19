@extends('layouts.tenant')

@section('title', 'Add New Dish')

@section('content')
    <header class="mb-16">
        <h2 class="text-6xl font-black tracking-tighter text-slate-900 mb-2">Create New Dish 🍳</h2>
        <p class="text-xl text-slate-500 font-medium italic opacity-80 italic opacity-80">Add a signature creation to your restaurant's digital menu.</p>
    </header>

    <div class="bg-white rounded-[4rem] shadow-2xl shadow-indigo-200/50 border border-slate-100 p-16 max-w-4xl">
        <form action="{{ route('tenant.menu.store') }}" method="POST" class="space-y-12">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="space-y-4">
                    <label for="name" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Dish Name</label>
                    <input type="text" name="name" id="name" placeholder="Epic Signature Burger" required class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-2xl font-black text-slate-900 tracking-tight">
                </div>

                <div class="space-y-4">
                    <label for="price" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Price ($)</label>
                    <input type="number" step="0.01" name="price" id="price" placeholder="19.99" required class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-2xl font-black text-indigo-700 tracking-tighter">
                </div>
            </div>

            <div class="space-y-4">
                <label for="description" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Dish Description</label>
                <textarea name="description" id="description" rows="3" placeholder="Crafted with aged cheddar, brioche bun, and secret restaurant sauce..." class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-xl font-medium text-slate-700"></textarea>
            </div>

            <div class="space-y-4">
                <label for="image_url" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Showcase Image URL</label>
                <input type="url" name="image_url" id="image_url" placeholder="https://unsplash.com/..." class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-sm font-bold text-indigo-600 tracking-tight">
            </div>

            <div class="flex gap-6 pt-8">
                <button type="submit" class="flex-1 bg-indigo-600 text-white py-6 rounded-[2.5rem] font-black uppercase tracking-widest hover:bg-indigo-700 shadow-2xl shadow-indigo-200 transition hover:scale-[1.03]">Publish Dish to Menu</button>
                <a href="{{ route('tenant.menu.index') }}" class="bg-slate-100 text-slate-500 px-12 py-6 rounded-[2.5rem] font-bold flex items-center justify-center hover:bg-slate-200 transition transition">Cancel</a>
            </div>
        </form>
    </div>
@endsection
