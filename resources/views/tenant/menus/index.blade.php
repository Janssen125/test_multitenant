<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} - Menu Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">
    <nav class="bg-indigo-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <h1 class="text-xl font-bold tracking-tight">{{ ucfirst(tenant('id')) }} CMS Admin</h1>
            <a href="{{ route('tenant.dashboard') }}" class="text-sm font-medium hover:text-indigo-200 transition">Back to Overview</a>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-slate-200 min-h-[calc(100vh-64px)] p-6 hidden lg:block">
            <nav class="space-y-2">
                <a href="{{ route('tenant.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition">
                    Overview
                </a>
                <a href="{{ route('tenant.menu.index') }}" class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-700 rounded-xl font-bold transition">
                    Manage Menu
                </a>
                <a href="{{ route('tenant.orders') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition">
                    Orders
                </a>
                <a href="{{ route('tenant.team') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition">
                    Workspace Team
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-8 lg:p-12">
            <header class="mb-12 flex justify-between items-end">
                <div>
                    <h2 class="text-4xl font-black tracking-tight text-slate-900 mb-2">Restaurant Menu 🍽️</h2>
                    <p class="text-slate-500 font-medium italic">Configure your digital menu and publish dishes to your customers.</p>
                </div>
                <a href="{{ route('tenant.menu.create') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-indigo-100 hover:scale-105 transition">Add New Dish</a>
            </header>

            @if(session('status'))
                <div class="mb-8 p-4 bg-emerald-100 text-emerald-800 border border-emerald-200 rounded-2xl font-bold animate-pulse shadow-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden mb-12">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-slate-400 text-xs font-black uppercase tracking-widest border-b border-slate-100 bg-slate-50/50">
                            <th class="px-8 py-5">Dish Details</th>
                            <th class="px-8 py-5 text-center">Price</th>
                            <th class="px-8 py-5 text-center">Status</th>
                            <th class="px-8 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($menus as $menu)
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="px-8 py-7">
                                    <div class="flex items-center gap-5">
                                        <img src="{{ $menu->image_url ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=800' }}" class="w-16 h-16 rounded-2xl object-cover shadow-sm border border-slate-100" alt="">
                                        <div>
                                            <p class="font-extrabold text-xl text-slate-900 tracking-tight leading-tight">{{ $menu->name }}</p>
                                            <p class="text-xs text-slate-400 uppercase font-black tracking-widest mt-1">{{ $menu->id ?? 'DISH-ID' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-7 text-center">
                                    <span class="font-mono font-black text-indigo-600 bg-indigo-50 px-4 py-1.5 rounded-xl border border-indigo-100 tracking-tighter text-lg">${{ number_format($menu->price, 2) }}</span>
                                </td>
                                <td class="px-8 py-7 text-center">
                                    @if($menu->is_active)
                                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-black uppercase tracking-widest">
                                            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span> Active
                                        </span>
                                    @else
                                        <span class="px-4 py-1.5 bg-slate-100 text-slate-500 rounded-full text-[10px] font-black uppercase tracking-widest">Draft</span>
                                    @endif
                                </td>
                                <td class="px-8 py-7 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('tenant.menu.edit', $menu->id) }}" class="p-3 bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-xl transition shadow-sm border border-indigo-100">
                                            Edit
                                        </a>
                                        <form action="{{ route('tenant.menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Archive this dish?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="p-3 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-xl transition shadow-sm border border-rose-100">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
