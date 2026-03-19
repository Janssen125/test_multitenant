<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Workspaces - SuperAdmin</title>
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
                <a href="#" class="block px-4 py-2 bg-indigo-800 rounded-lg shadow-sm">Workspaces</a>
                <a href="/" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition mt-10">Back to Landing</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <header class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Manage Tenants</h1>
                <a href="{{ route('tenants.create') }}" class="bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-bold hover:bg-indigo-700 shadow-md">Spawn Workspace</a>
            </header>

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-100 text-emerald-800 border border-emerald-200 rounded-xl font-medium animate-bounce shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/80 text-gray-400 text-xs font-black uppercase tracking-widest border-b border-gray-100">
                        <tr>
                            <th class="p-6">Workspace ID</th>
                            <th class="p-6">Host URLs</th>
                            <th class="p-6">Creation Date</th>
                            <th class="p-6 text-right">Action Hub</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($tenants as $tenant)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="p-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center font-bold text-lg shadow-sm">{{ strtoupper(substr($tenant->id, 0, 1)) }}</div>
                                        <div>
                                            <p class="font-bold text-indigo-900 text-lg tracking-tight">{{ ucfirst($tenant->id) }}</p>
                                            <p class="text-xs text-gray-400 font-mono">{{ $tenant->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <div class="space-y-1">
                                        @foreach($tenant->domains as $domain)
                                            <a href="http://{{ $domain->domain }}:8000" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1.5 group">
                                                {{ $domain->domain }}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 opacity-0 group-hover:opacity-100 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                            </a>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="p-6 text-sm text-gray-500 font-medium">{{ $tenant->created_at->format('M d, Y') }}</td>
                                <td class="p-6 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('tenants.edit', $tenant->id) }}" class="bg-indigo-50 text-indigo-600 px-4 py-2 rounded-lg text-sm font-bold hover:bg-indigo-600 hover:text-white transition shadow-sm border border-indigo-100 flex items-center gap-1.5 focus:ring-4 focus:ring-indigo-100">
                                            Edit
                                        </a>
                                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" onsubmit="return confirm('WARNING: Destroying this workspace is permanent. Proceed?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-rose-50 text-rose-600 px-4 py-2 rounded-lg text-sm font-bold hover:bg-rose-600 hover:text-white transition shadow-sm border border-rose-100 flex items-center gap-1.5 focus:ring-4 focus:ring-rose-100">Delete</button>
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
