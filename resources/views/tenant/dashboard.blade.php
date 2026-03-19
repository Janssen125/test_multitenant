@extends('layouts.tenant')

@section('title', 'Overview Dashboard')

@section('content')
    <header class="mb-20">
        <h2 class="text-6xl font-black tracking-tighter text-slate-900 mb-6 font-primary">Overview 🚀</h2>
        <p class="text-xl text-slate-500 font-medium italic opacity-80 decoration-indigo-500/30">Real-time stats and performance metrics for your isolated workspace.</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
        <!-- Stat Card 1 -->
        <div class="bg-white p-12 rounded-[3.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 group hover:translate-y-[-10px] transition duration-700">
            <p class="text-slate-400 font-black text-xs uppercase tracking-[0.3em] mb-6">Total Published Dishes</p>
            <div class="flex items-end justify-between">
                <h3 class="text-8xl font-black text-indigo-700 tracking-tighter">{{ $stats['total_dishes'] }}</h3>
                <a href="{{ route('tenant.menu.index') }}" class="w-16 h-16 bg-indigo-50 text-indigo-700 rounded-3xl flex items-center justify-center hover:bg-indigo-700 hover:text-white transition duration-500 shadow-xl shadow-indigo-100/50">
                    →
                </a>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white p-12 rounded-[3.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 group hover:translate-y-[-10px] transition duration-700">
            <p class="text-slate-400 font-black text-xs uppercase tracking-[0.3em] mb-6">Pending Quick Orders</p>
            <div class="flex items-end justify-between">
                <h3 class="text-8xl font-black text-emerald-600 tracking-tighter">{{ $stats['pending_orders'] }}</h3>
                <a href="{{ route('tenant.orders') }}" class="w-16 h-16 bg-emerald-50 text-emerald-700 rounded-3xl flex items-center justify-center hover:bg-emerald-700 hover:text-white transition duration-500 shadow-xl shadow-emerald-100/50">
                    →
                </a>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white p-12 rounded-[3.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 group hover:translate-y-[-10px] transition duration-700">
            <p class="text-slate-400 font-black text-xs uppercase tracking-[0.3em] mb-6">Workspace Team Size</p>
            <div class="flex items-end justify-between">
                <h3 class="text-8xl font-black text-slate-900 tracking-tighter">{{ $stats['team_count'] }}</h3>
                <a href="{{ route('tenant.team') }}" class="w-16 h-16 bg-slate-100 text-slate-900 rounded-3xl flex items-center justify-center hover:bg-slate-900 hover:text-white transition duration-500 shadow-xl">
                    →
                </a>
            </div>
        </div>
    </div>

    <div class="mt-20 p-16 bg-indigo-600 rounded-[4rem] text-white flex justify-between items-center shadow-2xl shadow-indigo-600/40 transform hover:scale-[1.01] transition duration-700">
        <div class="max-w-xl">
            <h4 class="text-5xl font-black tracking-tight mb-4 leading-tight italic">Ready to serve your signature style?</h4>
            <p class="text-indigo-100 font-medium text-xl opacity-80 leading-relaxed">Update your menu or invite new team members to keep your kitchen running at peak performance.</p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('tenant.menu.create') }}" class="px-12 py-6 bg-white text-indigo-700 rounded-3xl font-black uppercase tracking-widest shadow-2xl shadow-indigo-950/20 hover:bg-indigo-50 transition duration-300">Add Dish</a>
            <a href="{{ route('tenant.team.create') }}" class="px-12 py-6 bg-indigo-900 text-white rounded-3xl font-black uppercase tracking-widest shadow-2xl shadow-indigo-950/20 hover:bg-indigo-800 transition duration-300">Invite Team</a>
        </div>
    </div>
@endsection
