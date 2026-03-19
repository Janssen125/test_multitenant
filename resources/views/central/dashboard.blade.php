<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard - Central</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">
    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 bg-indigo-900 text-white min-h-screen p-6 hidden md:block">
            <h2 class="text-2xl font-bold mb-8 flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-500 rounded flex items-center justify-center text-sm">SA</div>
                SuperAdmin
            </h2>
            <nav class="space-y-4">
                <a href="#" class="block px-4 py-2 bg-indigo-800 rounded-lg">Dashboard</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300">Tenants</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300">Users</a>
                <a href="/" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 mt-10">Landing Page</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <header class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Central Platform Overview</h1>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500">Welcome, Super Admin</span>
                    <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">A</div>
                </div>
            </header>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 text-sm font-medium">Total Tenants</p>
                    <p class="text-3xl font-bold text-indigo-600">{{ $tenants->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 text-sm font-medium">Central Users</p>
                    <p class="text-3xl font-bold text-emerald-600">{{ $users->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 text-sm font-medium">System Status</p>
                    <p class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-3 h-3 bg-green-500 rounded-full"></span> Healthy
                    </p>
                </div>
            </div>

            <!-- Tenants Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-xl font-bold">Active Tenants</h2>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700">Add New Tenant</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                            <tr>
                                <th class="p-4">ID</th>
                                <th class="p-4">Domains</th>
                                <th class="p-4">Created At</th>
                                <th class="p-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($tenants as $tenant)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 font-bold text-indigo-600 uppercase">{{ $tenant->id }}</td>
                                    <td class="p-4">
                                        @foreach($tenant->domains as $domain)
                                            <span class="block text-xs text-gray-600">{{ $domain->domain }}</span>
                                        @endforeach
                                    </td>
                                    <td class="p-4 text-sm text-gray-500">{{ $tenant->created_at->format('M d, Y') }}</td>
                                    <td class="p-4">
                                        @if($tenant->domains->first())
                                        <a href="http://{{ $tenant->domains->first()->domain }}:8000/admin/dashboard" target="_blank" class="text-indigo-600 hover:underline text-sm">View CMS</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Central Users Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold">Central Base Users</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                            <tr>
                                <th class="p-4">Name</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 font-medium">{{ $user->name }}</td>
                                    <td class="p-4 text-gray-600">{{ $user->email }}</td>
                                    <td class="p-4">
                                        <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded-md text-xs font-bold">Super Admin</span>
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
