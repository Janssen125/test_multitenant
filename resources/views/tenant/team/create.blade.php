@extends('layouts.tenant')

@section('title', 'Invite Team Member')

@section('content')
    <header class="mb-16">
        <h2 class="text-6xl font-black tracking-tighter text-slate-900 mb-2 font-primary italic">Invite Member 📤</h2>
        <p class="text-xl text-slate-500 font-medium italic opacity-80">Grant workspace access to a new team member. They will help manage your restaurant.</p>
    </header>

    <div class="bg-white rounded-[4rem] shadow-2xl shadow-indigo-100/50 border border-slate-100 p-16 max-w-3xl">
        <form action="{{ route('tenant.team.store') }}" method="POST" class="space-y-12">
            @csrf
            
            <div class="space-y-4">
                <label for="name" class="text-xs font-black text-slate-400 uppercase tracking-widest block">Full Name</label>
                <input type="text" name="name" id="name" placeholder="Executive Chef" required class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-2xl font-black text-slate-900 tracking-tight tracking-tight">
            </div>

            <div class="space-y-4">
                <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-widest block">Email Address</label>
                <input type="email" name="email" id="email" placeholder="chef@restaurant.com" required class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-2xl font-black text-indigo-700 tracking-tight tracking-tight leading-tight">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-medium">
                <div class="space-y-3">
                    <label for="password" class="text-xs font-black text-slate-400 uppercase tracking-widest block text-rose-500">Secure Password</label>
                    <input type="password" name="password" id="password" required class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg tracking-widest">
                </div>
                <div class="space-y-3">
                    <label for="password_confirmation" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg tracking-widest">
                </div>
            </div>

            <div class="flex gap-6 pt-10">
                <button type="submit" class="flex-1 bg-indigo-600 text-white py-6 rounded-[2.5rem] font-black uppercase tracking-widest hover:bg-slate-900 shadow-2xl shadow-indigo-100/50 transition hover:scale-[1.03]">Send Invitation</button>
                <a href="{{ route('tenant.team') }}" class="bg-slate-100 text-slate-500 px-12 py-6 rounded-[2.5rem] font-bold flex items-center justify-center hover:bg-slate-200 transition transition">Cancel</a>
            </div>
        </form>
    </div>
@endsection
