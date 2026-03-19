<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdmin Dashboard - Platform Control</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen font-['Inter']">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-indigo-900 text-white min-h-screen p-6 hidden md:block border-r border-indigo-800 shadow-2xl">
            <h2 class="text-2xl font-black mb-8 tracking-tighter uppercase italic">SaaS Master</h2>
            <nav class="space-y-4 font-bold">
                <a href="{{ route('central.dashboard') }}" class="block px-4 py-2 bg-indigo-700 text-white rounded-lg shadow-lg">Dashboard</a>
                <a href="{{ route('tenants.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition">Workspaces</a>
                <a href="{{ route('central.users.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition">Platform Users</a>
            </nav>
        </aside>

        <main class="flex-1 p-8 lg:p-12">
            <header class="flex justify-between items-center mb-12">
                <div>
                    <h1 class="text-4xl font-black text-slate-800 tracking-tight tracking-tight">System Control Center</h1>
                    <p class="text-slate-500 font-medium italic mt-1.5">Global overview of your multi-tenant ecosystem.</p>
                </div>
                <div class="flex gap-4">
                     <a href="{{ route('tenants.create') }}" class="bg-indigo-600 text-white px-8 py-3.5 rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-indigo-100 hover:scale-105 transition">Spawn Workspace</a>
                </div>
            </header>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white p-10 rounded-[2.5rem] shadow-xl border border-slate-100 group hover:translate-y-[-4px] transition duration-500">
                    <p class="text-slate-400 font-black text-xs uppercase tracking-widest mb-4">Total Active Workspaces</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-6xl font-black text-indigo-600 tracking-tighter">{{ $tenantCount ?? 0 }}</h3>
                        <a href="{{ route('tenants.index') }}" class="text-indigo-600 font-bold bg-indigo-50 px-4 py-2 rounded-xl text-sm border border-indigo-100 hover:bg-indigo-600 hover:text-white transition">Manage All →</a>
                    </div>
                </div>
                <div class="bg-white p-10 rounded-[2.5rem] shadow-xl border border-slate-100 group hover:translate-y-[-4px] transition duration-500">
                    <p class="text-slate-400 font-black text-xs uppercase tracking-widest mb-4">Central Administrators</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-6xl font-black text-emerald-600 tracking-tighter">{{ $userCount ?? 0 }}</h3>
                        <a href="{{ route('central.users.index') }}" class="text-emerald-600 font-bold bg-emerald-50 px-4 py-2 rounded-xl text-sm border border-emerald-100 hover:bg-emerald-600 hover:text-white transition">Manage All →</a>
                    </div>
                </div>
            </div>

            <!-- Recent Workspaces -->
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 overflow-hidden">
                <div class="px-10 py-8 border-b border-slate-50 flex justify-between items-center bg-slate-50/30">
                    <h3 class="text-2xl font-black text-slate-800 tracking-tight">Workspace Distribution Hub</h3>
                    <span class="px-4 py-1.5 bg-indigo-100 text-indigo-700 text-xs font-black uppercase rounded-xl tracking-widest animate-pulse">Live Monitor</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] border-b border-slate-50">
                                <th class="px-10 py-6">Identity</th>
                                <th class="px-10 py-6">Endpoint Address</th>
                                <th class="px-10 py-6 text-right">Operations Hub</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($tenants as $tenant)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="px-10 py-8">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-2xl bg-slate-900 flex items-center justify-center text-white font-black uppercase text-xl rotate-3">{{ substr($tenant->id, 0, 1) }}</div>
                                            <span class="font-extrabold text-slate-900 text-xl tracking-tight uppercase">{{ $tenant->id }}</span>
                                        </div>
                                    </td>
                                    <td class="px-10 py-8">
                                        @foreach($tenant->domains as $domain)
                                            <a href="http://{{ $domain->domain }}:8000/admin/dashboard" target="_blank" class="block font-bold text-indigo-600 hover:underline tracking-tight text-lg mb-0.5">
                                                {{ $domain->domain }}
                                            </a>
                                            <span class="text-[10px] text-slate-400 font-black uppercase tracking-widest opacity-60">Redirect to CMS Hub</span>
                                        @endforeach
                                    </td>
                                    <td class="px-10 py-8 text-right">
                                        <div class="flex justify-end gap-3">
                                            <a href="{{ route('tenants.edit', $tenant->id) }}" class="p-3 bg-indigo-50 text-indigo-700 rounded-xl hover:bg-indigo-600 hover:text-white transition shadow-sm border border-indigo-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" /></svg>
                                            </a>
                                            <a href="http://{{ $tenant->domains->first()?->domain }}:8000" target="_blank" class="p-3 bg-emerald-50 text-emerald-700 rounded-xl hover:bg-emerald-600 hover:text-white transition shadow-sm border border-emerald-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" /></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
