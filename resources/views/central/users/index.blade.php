<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central Users - Platform Administration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen font-['Inter']">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-indigo-900 text-white min-h-screen p-6 hidden md:block">
            <h2 class="text-2xl font-bold mb-8">SuperAdmin Hub</h2>
            <nav class="space-y-4 font-bold">
                <a href="{{ route('central.dashboard') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition {{ request()->routeIs('central.dashboard') ? 'bg-indigo-700 text-white' : '' }}">Dashboard</a>
                <a href="{{ route('tenants.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition {{ request()->routeIs('tenants.*') ? 'bg-indigo-700 text-white' : '' }}">Workspaces</a>
                <a href="{{ route('central.users.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition {{ request()->routeIs('central.users.*') ? 'bg-indigo-700 text-white' : '' }}">Platform Users</a>
            </nav>
        </aside>

        <main class="flex-1 p-8 lg:p-12">
            <header class="flex justify-between items-center mb-12">
                <div>
                    <h1 class="text-4xl font-black text-gray-800 tracking-tight">Platform Administrators</h1>
                    <p class="text-gray-500 mt-1 font-medium italic">These accounts have global access to manage all tenants and platform settings.</p>
                </div>
                <a href="{{ route('central.users.create') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-indigo-100 hover:scale-105 transition">New Admin</a>
            </header>

            @if(session('success'))
                <div class="mb-8 p-4 bg-emerald-100 text-emerald-800 border-l-4 border-emerald-500 font-bold rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-indigo-50/50 text-indigo-900 text-xs font-black uppercase tracking-widest border-b border-gray-100">
                            <th class="p-6">User Details</th>
                            <th class="p-6">Email Address</th>
                            <th class="p-6">Created</th>
                            <th class="p-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 capitalize">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-xl bg-indigo-500 flex items-center justify-center text-white font-black text-xl">{{ substr($user->name, 0, 1) }}</div>
                                        <span class="font-bold text-gray-800 text-lg tracking-tight">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="p-6 lowercase font-medium text-gray-500">{{ $user->email }}</td>
                                <td class="p-6 text-sm font-medium text-gray-400">{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="p-6 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('central.users.edit', $user->id) }}" class="bg-indigo-50 text-indigo-600 px-4 py-2 rounded-lg text-sm font-bold hover:bg-indigo-600 hover:text-white transition shadow-sm">Edit</a>
                                        <form action="{{ route('central.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Archive global admin account?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-rose-50 text-rose-600 px-4 py-2 rounded-lg text-sm font-bold hover:bg-rose-600 hover:text-white transition shadow-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-8">
                {{ $users->links() }}
            </div>
        </main>
    </div>
</body>
</html>
