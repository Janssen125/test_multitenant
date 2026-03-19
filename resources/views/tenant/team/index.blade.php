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
            <a href="{{ route('tenant.dashboard') }}" class="text-sm font-medium hover:text-indigo-200 transition text-indigo-100">Back to Dashboard</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12 md:py-16">
        <header class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Manage Your Isolated Team</h2>
                <p class="text-slate-500 mt-2 font-medium italic">These users have access specifically to the {{ ucfirst(tenant('id')) }} workspace only.</p>
            </div>
            <a href="{{ route('tenant.team.create') }}" class="bg-indigo-600 text-white px-8 py-3.5 rounded-2xl font-bold shadow-xl shadow-indigo-100 hover:scale-105 transition">Invite Member</a>
        </header>

        @if(session('status'))
            <div class="mb-8 p-4 bg-emerald-100 text-emerald-800 border border-emerald-200 rounded-2xl font-bold shadow-sm">
                {{ session('status') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8 p-4 bg-rose-100 text-rose-800 border border-rose-200 rounded-2xl font-bold shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($users as $user)
                <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-8 flex flex-col group hover:-translate-y-1 transition duration-300 relative overflow-hidden">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-16 h-16 rounded-2xl bg-indigo-500 flex items-center justify-center text-white font-black text-xl shadow-lg shadow-indigo-100 transition duration-500 group-hover:rotate-6">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                        <div class="overflow-hidden">
                            <p class="font-extrabold text-slate-900 text-xl tracking-tight truncate leading-tight">{{ $user->name }}</p>
                            <p class="text-xs text-slate-400 font-medium truncate mb-2 mt-0.5">{{ $user->email }}</p>
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-[10px] font-black uppercase tracking-widest">Active Member</span>
                        </div>
                    </div>

                    <div class="mt-auto flex gap-3 pt-6 border-t border-slate-50">
                        <a href="{{ route('tenant.team.edit', $user->id) }}" class="flex-1 bg-indigo-50 text-indigo-700 py-3 rounded-xl text-center text-sm font-bold hover:bg-indigo-600 hover:text-white transition group/btn">
                             Edit Profile
                        </a>
                        <form action="{{ route('tenant.team.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Remove this user from the workspace?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-rose-50 text-rose-600 p-3 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
