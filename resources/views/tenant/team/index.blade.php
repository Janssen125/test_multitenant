<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} - Workspace Team</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">
    <nav class="bg-indigo-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <h1 class="text-xl font-bold tracking-tight">{{ ucfirst(tenant('id')) }} Hub Team</h1>
            <a href="{{ route('tenant.dashboard') }}" class="text-sm font-medium hover:text-indigo-200 transition">Back to Dashboard</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12 md:py-16">
        <header class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Manage Your Isolated Team</h2>
                <p class="text-slate-500 mt-2 font-medium">These users have access specifically to the {{ ucfirst(tenant('id')) }} workspace only.</p>
            </div>
            <button class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:scale-105 transition">Invite Member</button>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($users as $user)
                <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-8 flex items-center gap-6 group hover:translate-x-2 transition">
                    <div class="w-16 h-16 rounded-2xl bg-indigo-500 flex items-center justify-center text-white font-black text-xl shadow-lg shadow-indigo-100 group-hover:rotate-12 transition">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                    <div class="overflow-hidden">
                        <p class="font-extrabold text-slate-900 text-xl tracking-tight truncate">{{ $user->name }}</p>
                        <p class="text-xs text-slate-400 font-medium truncate mb-2">{{ $user->email }}</p>
                        <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-[10px] font-black uppercase">Active Member</span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-20 p-8 bg-indigo-900 rounded-3xl text-white flex justify-between items-center shadow-2xl">
            <div>
                <h4 class="text-2xl font-bold mb-1">Scale your restaurant team?</h4>
                <p class="text-indigo-300 opacity-80 leading-relaxed font-medium">Add more administrators or kitchen staff to help you manage the {{ ucfirst(tenant('id')) }} kitchen.</p>
            </div>
            <button class="px-8 py-4 bg-white text-indigo-900 rounded-2xl font-black uppercase tracking-widest hover:scale-105 transition">Upgrade Plan</button>
        </div>
    </main>
</body>
</html>
