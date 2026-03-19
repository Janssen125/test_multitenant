<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Workspace - SuperAdmin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen font-['Inter']">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-indigo-900 text-white min-h-screen p-6 hidden md:block">
            <h2 class="text-2xl font-bold mb-8">SuperAdmin Hub</h2>
            <nav class="space-y-4">
                <a href="/admin/dashboard" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition">Dashboard</a>
                <a href="{{ route('tenants.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition">Workspaces</a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            <header class="mb-12">
                <a href="{{ route('tenants.index') }}" class="text-indigo-600 hover:text-indigo-800 font-bold mb-4 flex items-center gap-2 group tracking-tight transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:-translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Back to List
                </a>
                <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Configure Workspace: {{ $tenant->id }}</h1>
                <p class="text-gray-500 max-w-lg mt-2 font-medium italic">Modify the domain or cluster settings for this isolated environment.</p>
            </header>

            <div class="max-w-2xl bg-white rounded-3xl shadow-xl border border-gray-100 p-10">
                <form action="{{ route('tenants.update', $tenant->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-3 opacity-50 cursor-not-allowed">
                        <label class="text-sm font-black text-gray-400 uppercase tracking-widest block">Primary Workspace ID (Immutable)</label>
                        <input type="text" value="{{ $tenant->id }}" disabled class="w-full bg-gray-100 border border-gray-200 rounded-xl px-6 py-4 text-lg font-bold text-gray-400">
                    </div>

                    <div class="space-y-3">
                        <label for="domain" class="text-sm font-black text-gray-400 uppercase tracking-widest block">Mapped Domain / Hostname</label>
                        <input type="text" name="domain" id="domain" value="{{ $tenant->domains->first()?->domain }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-medium text-gray-800">
                        @error('domain') <p class="text-rose-600 text-xs font-bold mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="flex-1 bg-indigo-600 text-white py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition hover:scale-[1.02]">Save Workspace Changes</button>
                        <a href="{{ route('tenants.index') }}" class="bg-gray-100 text-gray-500 px-10 py-5 rounded-2xl font-bold flex items-center justify-center hover:bg-gray-200 transition">Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
