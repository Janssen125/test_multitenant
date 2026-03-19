<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} - Overview Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-indigo-900 text-slate-900 min-h-screen selection:bg-indigo-500 selection:text-white">
    <nav class="bg-white text-slate-900 shadow-xl shadow-indigo-950/20 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-10 h-20 flex items-center justify-between">
            <div class="flex items-center gap-6">
                 <div class="w-12 h-12 bg-indigo-700 text-white font-black flex items-center justify-center text-3xl rounded-2xl shadow-xl shadow-indigo-200 rotate-6">{{ strtoupper(substr(tenant('id'), 0, 1)) }}</div>
                 <h1 class="text-3xl font-black tracking-tighter text-slate-900">{{ ucfirst(tenant('id')) }} HUB</h1>
            </div>
            <div class="flex items-center gap-8">
                <a href="{{ route('tenant.public') }}" target="_blank" class="text-sm font-black uppercase tracking-widest text-indigo-700 hover:scale-105 transition">Live Website</a>
                <div class="h-8 w-[1px] bg-slate-200"></div>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-black text-slate-400 leading-tight uppercase tracking-[0.2em] mb-1">Status: Active</p>
                        <p class="text-sm font-black text-slate-900 leading-tight">Workspace Admin</p>
                    </div>
                    <div class="w-12 h-12 bg-emerald-500 text-white font-black flex items-center justify-center text-xl rounded-2xl shadow-xl shadow-emerald-200">A</div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Dashboard Sidebar -->
        <aside class="w-80 bg-white/5 border-r border-white/10 min-h-[calc(100vh-80px)] p-10 hidden lg:block backdrop-blur-3xl">
            <nav class="space-y-6">
                <a href="{{ route('tenant.dashboard') }}" class="flex items-center gap-4 px-6 py-4 bg-white text-indigo-900 rounded-[2rem] font-black uppercase tracking-widest shadow-2xl shadow-indigo-950/40 transform scale-[1.05] transition duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    Overview
                </a>
                <a href="{{ route('tenant.menu.index') }}" class="flex items-center gap-4 px-6 py-4 text-white/60 hover:text-white hover:bg-white/10 rounded-[2rem] font-bold transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    Manage Menu
                </a>
                <a href="{{ route('tenant.orders') }}" class="flex items-center gap-4 px-6 py-4 text-white/60 hover:text-white hover:bg-white/10 rounded-[2rem] font-bold transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                    Orders
                </a>
                <a href="{{ route('tenant.team') }}" class="flex items-center gap-4 px-6 py-4 text-white/60 hover:text-white hover:bg-white/10 rounded-[2rem] font-bold transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    Workspace Team
                </a>
            </nav>
        </aside>

        <!-- CMS Content -->
        <main class="flex-1 p-12 lg:p-20 bg-slate-50 min-h-screen rounded-[4rem] mt-4 mb-4 mr-4 shadow-inner shadow-indigo-950/20">
            <header class="mb-20">
                <h2 class="text-6xl font-black tracking-tighter text-slate-900 mb-6">Overview 🚀</h2>
                <p class="text-xl text-slate-500 font-medium italic opacity-80">Real-time stats and performance metrics for your isolated workspace.</p>
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
        </main>
    </div>
</body>
</html>
