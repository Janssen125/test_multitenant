<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} Admin - CMS Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-indigo-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-8 h-8 bg-white text-indigo-700 rounded-lg flex items-center justify-center font-bold">TC</div>
                <h1 class="text-xl font-bold tracking-tight">{{ ucfirst(tenant('id')) }} CMS Admin</h1>
            </div>
            <div class="flex items-center gap-6">
                <a href="/" class="text-sm font-medium hover:text-indigo-200 transition">View Public Restaurant</a>
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold uppercase tracking-widest bg-indigo-800 px-3 py-1 rounded-full">Admin Panel</span>
                    <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center text-xs font-bold ring-2 ring-indigo-400">ADM</div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Dashboard Sidebar -->
        <aside class="w-64 bg-white border-r border-slate-200 min-h-[calc(100vh-64px)] p-6 hidden lg:block">
            <nav class="space-y-2">
                <a href="{{ route('tenant.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('tenant.dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-500 hover:bg-slate-50' }} rounded-xl font-bold transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011-1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" /></svg>
                    Overview
                </a>
                <a href="#menu-list" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" /></svg>
                    Manage Menu
                </a>
                <a href="{{ route('tenant.orders') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('tenant.orders') ? 'bg-indigo-50 text-indigo-700 font-bold' : 'text-slate-500 hover:bg-slate-50' }} rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" /><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2H7a1 1 0 100-2h.01zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" /></svg>
                    Orders
                </a>
                <a href="{{ route('tenant.team') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('tenant.team') ? 'bg-indigo-50 text-indigo-700 font-bold' : 'text-slate-500 hover:bg-slate-50' }} rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3.005 3.005 0 013.75-2.906z" /></svg>
                    Workspace Team
                </a>
            </nav>
        </aside>

        <!-- CMS Content -->
        <main class="flex-1 p-8 lg:p-12">
            <header class="mb-12 flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 mb-2">Welcome Dashboard</h2>
                    <p class="text-slate-500">Manage your isolated restaurant workspace content from here.</p>
                </div>
                <a href="{{ route('tenant.menu.create') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-indigo-200 hover:scale-105 transition">Add New Dish</a>
            </header>

            <!-- Success Message -->
            @if(session('status'))
                <div class="mb-8 p-4 bg-emerald-100 text-emerald-800 border border-emerald-200 rounded-2xl font-bold animate-pulse shadow-sm">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Menu CMS List -->
            <div id="menu-list" class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden mb-12">
                <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <h3 class="text-xl font-bold text-slate-800">Restaurant Menu Items</h3>
                    <span class="px-3 py-1 bg-indigo-100 text-indigo-600 text-xs font-black uppercase rounded-lg">{{ $menus->count() }} Total</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-slate-400 text-xs font-black uppercase tracking-widest border-b border-slate-100">
                                <th class="px-8 py-5">Dish Details</th>
                                <th class="px-8 py-5 text-center">Price</th>
                                <th class="px-8 py-5 text-center">Status</th>
                                <th class="px-8 py-5 text-right">Actions Hub</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($menus as $menu)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            <img src="{{ $menu->image_url ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=800' }}" class="w-14 h-14 rounded-xl object-cover shadow-sm border border-slate-100" alt="">
                                            <div>
                                                <p class="font-bold text-lg text-slate-900 leading-tight">{{ $menu->name }}</p>
                                                <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest mt-0.5">{{ $menu->id ?? 'DISH-ID' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        <span class="font-mono font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg border border-indigo-100">${{ number_format($menu->price, 2) }}</span>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        @if($menu->is_active)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-black uppercase">
                                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span> Active
                                            </span>
                                        @else
                                            <span class="px-3 py-1 bg-slate-100 text-slate-500 rounded-full text-[10px] font-black uppercase tracking-wider">Draft</span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex justify-end gap-3">
                                            <a href="{{ route('tenant.menu.edit', $menu->id) }}" class="p-2.5 bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-xl transition shadow-sm border border-indigo-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" /></svg>
                                            </a>
                                            <form action="{{ route('tenant.menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Archive this dish?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="p-2.5 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-xl transition shadow-sm border border-rose-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Workspace Team -->
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-8">
                <h3 class="text-xl font-bold text-slate-800 mb-6">Workspace Members</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($users as $user)
                        <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                            <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold text-sm ring-4 ring-white shadow-sm">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                            <div class="overflow-hidden">
                                <p class="font-bold text-slate-800 text-sm truncate">{{ $user->name }}</p>
                                <p class="text-[10px] text-slate-400 truncate">{{ $user->email }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</body>
</html>
