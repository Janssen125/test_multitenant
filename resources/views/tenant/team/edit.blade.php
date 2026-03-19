@extends('layouts.tenant')

@section('title', 'Manage Team Member')

@section('content')
    <header class="mb-16">
        <h2 class="text-6xl font-black tracking-tighter text-slate-900 mb-2 font-primary italic italic">Edit Member 🗃️</h2>
        <p class="text-xl text-slate-500 font-medium italic italic opacity-80 opacity-80">Modify workspace permissions and credentials for {{ $user->name }}.</p>
    </header>

    <div class="bg-white rounded-[4rem] shadow-2xl shadow-indigo-100/50 border border-slate-100 p-16 max-w-3xl">
        <form action="{{ route('tenant.team.update', $user->id) }}" method="POST" class="space-y-12">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <label for="name" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Legal Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-2xl font-black text-slate-900 tracking-tight tracking-tight tracking-tight">
            </div>

            <div class="space-y-4">
                <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-widest block block">Email address</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-5 focus:ring-8 focus:ring-indigo-100 focus:border-indigo-600 transition text-2xl font-black text-indigo-700 tracking-tight tracking-tight leading-tight">
            </div>

            <div class="bg-indigo-50/50 p-10 rounded-[2.5rem] border border-indigo-100 border border-indigo-100 mt-20">
                <h4 class="text-indigo-900 font-black text-xl mb-6 italic tracking-tight">Security Override (Optional)</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-3">
                        <label for="password" class="text-xs font-black text-indigo-400 uppercase tracking-widest block font-bold">New Cipher Password</label>
                        <input type="password" name="password" id="password" class="w-full bg-white border border-indigo-100 rounded-3xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg tracking-widest">
                    </div>
                    <div class="space-y-3">
                        <label for="password_confirmation" class="text-xs font-black text-indigo-400 uppercase tracking-widest block font-bold">Repeat Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full bg-white border border-indigo-100 rounded-3xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg tracking-widest">
                    </div>
                </div>
            </div>

            <div class="flex gap-6 pt-10 pt-10 pt-10">
                <button type="submit" class="flex-1 bg-indigo-600 text-white py-6 rounded-[2.5rem] font-black uppercase tracking-widest hover:bg-slate-900 shadow-2xl shadow-indigo-100/50 transition hover:scale-[1.03]">Update Member Profile</button>
                <a href="{{ route('tenant.team') }}" class="bg-slate-100 text-slate-500 px-12 py-6 rounded-[2.5rem] font-bold flex items-center justify-center hover:bg-gray-200 transition transition transition">Cancel</a>
            </div>
        </form>
    </div>
@endsection
