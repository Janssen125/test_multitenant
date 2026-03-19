@extends('layouts.tenant')

@section('title', 'Workspace Team')

@section('content')
    <header class="mb-12 flex justify-between items-end gap-10">
        <div>
            <h2 class="text-6xl font-black tracking-tighter text-slate-900 mb-2 font-primary">Workspace Team 👥</h2>
            <p class="text-xl text-slate-500 font-medium italic decoration-slate-400">Invite and manage chefs, waiters, and managers for your restaurant.</p>
        </div>
        <a href="{{ route('tenant.team.create') }}" class="bg-indigo-600 text-white px-10 py-5 rounded-[2rem] font-black uppercase tracking-widest shadow-xl shadow-indigo-100/50 hover:scale-105 transition shrink-0">Invite Member</a>
    </header>

    @if(session('status'))
        <div class="mb-12 p-6 bg-emerald-100 text-emerald-800 border-l-8 border-emerald-500 rounded-3xl font-black uppercase tracking-widest text-sm">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white rounded-[3.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden mb-12">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-slate-400 text-xs font-black uppercase tracking-widest border-b border-slate-100 bg-slate-50/50">
                    <th class="px-10 py-7">Member Identity</th>
                    <th class="px-10 py-7 text-center">Contact Email</th>
                    <th class="px-10 py-7 text-center">Role Status</th>
                    <th class="px-10 py-7 text-right pr-16">Controls</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 lowercase">
                @foreach($users as $user)
                    <tr class="hover:bg-slate-50/30 transition capitalize">
                        <td class="px-10 py-10">
                            <div class="flex items-center gap-6">
                                <div class="w-16 h-16 rounded-[1.5rem] bg-indigo-600 flex items-center justify-center text-white font-black text-2xl shadow-xl shadow-indigo-100 rotate-2">{{ substr($user->name, 0, 1) }}</div>
                                <div>
                                    <p class="font-black text-2xl text-slate-900 tracking-tight leading-tight">{{ $user->name }}</p>
                                    <p class="text-[10px] text-slate-400 font-bold tracking-widest uppercase mt-1 opacity-60">Joined {{ $user->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-10 text-center">
                            <span class="font-bold text-slate-600 bg-slate-100 px-5 py-2 rounded-2xl border border-slate-200 lowercase tracking-tight">{{ $user->email }}</span>
                        </td>
                        <td class="px-10 py-10 text-center">
                             <span class="inline-flex items-center gap-1.5 px-5 py-2 bg-indigo-100 text-indigo-700 rounded-full text-[10px] font-black uppercase tracking-widest border border-indigo-100">
                                Administrator
                            </span>
                        </td>
                        <td class="px-10 py-10 text-right pr-16 capitalize">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('tenant.team.edit', $user->id) }}" class="p-4 bg-indigo-50 text-indigo-700 hover:bg-indigo-600 hover:text-white rounded-[1.5rem] transition shadow-sm border border-indigo-100">
                                    Edit
                                </a>
                                <form action="{{ route('tenant.team.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Revoke workspace access for this member?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-4 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-[1.5rem] transition shadow-sm border border-rose-100">Revoke</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
