<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spawn Workspace - SuperAdmin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">
    <div class="flex">
        <!-- Dashboard Sidebar -->
        <aside class="w-64 bg-indigo-900 text-white min-h-screen p-6 hidden md:block">
            <h2 class="text-2xl font-bold mb-8 flex items-center gap-2">SuperAdmin Hub</h2>
            <nav class="space-y-4">
                <a href="/admin/dashboard" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition">Dashboard</a>
                <a href="{{ route('tenants.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition">Workspaces</a>
                <a href="/" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition mt-10">Back to Landing</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <header class="mb-12">
                <a href="{{ route('tenants.index') }}" class="text-indigo-600 hover:text-indigo-800 font-bold mb-4 flex items-center gap-2 group tracking-tight">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:-translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Back to List
                </a>
                <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Spawn New Isolated Workspace</h1>
                <p class="text-gray-500 max-w-lg mt-2 font-medium">This will initialize a brand-new tenant entry and automatically provision its dedicated domain configuration.</p>
            </header>

            <div class="max-w-2xl bg-white rounded-3xl shadow-xl border border-gray-100 p-10">
                <form action="{{ route('tenants.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <div class="space-y-3">
                        <label for="id" class="text-sm font-black text-gray-400 uppercase tracking-widest block">Unique Workspace ID</label>
                        <input type="text" name="id" id="id" placeholder="e.g. mcdonalds" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-indigo-600 placeholder:text-gray-300">
                        @error('id') <p class="text-rose-600 text-xs font-bold mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-3">
                        <label for="domain" class="text-sm font-black text-gray-400 uppercase tracking-widest block">Root URL / Hostname</label>
                        <input type="text" name="domain" id="domain" placeholder="e.g. mcdonalds.localhost" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-medium text-gray-800 placeholder:text-gray-300">
                        @error('domain') <p class="text-rose-600 text-xs font-bold mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition hover:scale-[1.02]">Initialize Workspace Cluster</button>
                    <p class="text-center text-xs text-gray-400">Note: Database provisioning will occur automatically during the next migration cycle.</p>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
