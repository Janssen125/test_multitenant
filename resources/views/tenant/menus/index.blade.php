@extends('layouts.tenant')

@section('title', 'Manage Restaurant Menu')

@section('content')
    <header class="mb-12 flex justify-between items-end gap-10">
        <div>
            <h2 class="text-6xl font-black tracking-tighter text-slate-900 mb-2">Restaurant Menu 🍽️</h2>
            <p class="text-xl text-slate-500 font-medium italic italic">Configure your digital menu and publish dishes to your customers.</p>
        </div>
        <a href="{{ route('tenant.menu.create') }}" class="bg-indigo-600 text-white px-10 py-5 rounded-[2rem] font-black uppercase tracking-widest shadow-xl shadow-indigo-100/50 hover:scale-105 transition shrink-0">Add New Dish</a>
    </header>

    @if(session('status'))
        <div class="mb-12 p-6 bg-emerald-100 text-emerald-800 border-l-8 border-emerald-500 rounded-3xl font-black uppercase tracking-widest text-sm shadow-xl shadow-emerald-50/50">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white rounded-[3.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden mb-12">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-slate-400 text-xs font-black uppercase tracking-widest border-b border-slate-100 bg-slate-50/30">
                    <th class="px-10 py-7">Dish Details</th>
                    <th class="px-10 py-7 text-center">Price</th>
                    <th class="px-10 py-7 text-center">Visibility</th>
                    <th class="px-10 py-7 text-right pr-16">Operations</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($menus as $menu)
                    <tr class="hover:bg-slate-50/20 transition group">
                        <td class="px-10 py-10">
                            <div class="flex items-center gap-6">
                                <img src="{{ $menu->image_url ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=800' }}" class="w-24 h-24 rounded-[2rem] object-cover shadow-2xl shadow-slate-200 group-hover:rotate-2 transition duration-500" alt="">
                                <div>
                                    <p class="font-black text-2xl text-slate-900 tracking-tight leading-tight">{{ $menu->name }}</p>
                                    <p class="text-xs text-slate-400 uppercase font-black tracking-[0.2em] mt-2 opacity-60">ID #{{ $menu->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-10 text-center">
                            <span class="font-mono font-black text-indigo-700 bg-indigo-50/50 px-6 py-3 rounded-2xl border border-indigo-100 tracking-tighter text-2xl shadow-inner">${{ number_format($menu->price, 2) }}</span>
                        </td>
                        <td class="px-10 py-10 text-center">
                             <span class="inline-flex items-center gap-2 px-5 py-2 bg-emerald-100/50 text-emerald-700 rounded-full text-xs font-black uppercase tracking-widest border border-emerald-100">
                                <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-ping"></span> Live Now
                            </span>
                        </td>
                        <td class="px-10 py-10 text-right pr-16">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('tenant.menu.edit', $menu->id) }}" class="p-4 bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-[1.5rem] transition shadow-sm border border-indigo-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" /></svg>
                                </a>
                                <form action="{{ route('tenant.menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Archive global admin account?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-4 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-[1.5rem] transition shadow-sm border border-rose-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
