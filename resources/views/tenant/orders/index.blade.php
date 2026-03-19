@extends('layouts.tenant')

@section('title', 'Quick Orders Management')

@section('content')
    <header class="mb-16">
        <h2 class="text-6xl font-black tracking-tighter text-slate-900 mb-6 font-primary italic">Live Orders 🛎️</h2>
        <p class="text-xl text-slate-500 font-medium italic decoration-sky-400">Monitor incoming digital menu orders in real-time. Keep your kitchen synchronized.</p>
    </header>

    <div class="bg-white rounded-[4rem] shadow-2xl shadow-indigo-100/50 border border-slate-100 p-20 flex flex-col items-center justify-center min-h-[500px] text-center">
        <div class="w-32 h-32 bg-indigo-50 text-indigo-300 rounded-[2.5rem] flex items-center justify-center mb-10 shadow-inner">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
        </div>
        <h3 class="text-4xl font-black text-slate-300 tracking-tighter uppercase mb-2">No Active Orders</h3>
        <p class="text-slate-400 font-medium max-w-sm italic opacity-60 italic opacity-60">Wait for customers to scan your QR code and place their signature orders from your live menu.</p>
        
        <div class="mt-12">
            <a href="{{ route('tenant.public') }}" target="_blank" class="px-10 py-5 bg-indigo-600 text-white rounded-[2rem] font-black uppercase tracking-widest hover:bg-slate-900 shadow-xl transition hover:scale-105">View Live Menu 🔗</a>
        </div>
    </div>
@endsection
