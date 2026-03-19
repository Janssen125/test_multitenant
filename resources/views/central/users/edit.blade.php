<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Central User - Platform Administration</title>
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
                <a href="{{ route('central.dashboard') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition">Dashboard</a>
                <a href="{{ route('tenants.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition">Workspaces</a>
                <a href="{{ route('central.users.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-lg text-indigo-300 transition bg-indigo-700 text-white">Platform Users</a>
            </nav>
        </aside>

        <main class="flex-1 p-8 lg:p-12 text-gray-900">
            <header class="mb-12">
                <h1 class="text-4xl font-black text-gray-800 tracking-tight tracking-tight">Edit Platform Administrator</h1>
                <p class="text-gray-500 mt-1 font-medium italic italic">Update global permissions for {{ $user->name }}.</p>
            </header>

            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-12 max-w-2xl">
                <form action="{{ route('central.users.update', $user->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-3">
                        <label for="name" class="text-xs font-black text-gray-400 uppercase tracking-widest block block">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-gray-900 tracking-tight">
                    </div>

                    <div class="space-y-3">
                        <label for="email" class="text-xs font-black text-gray-400 uppercase tracking-widest block block">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-indigo-600 tracking-tight tracking-tight">
                    </div>

                    <div class="bg-indigo-50/50 p-6 rounded-2xl border border-indigo-100">
                        <h4 class="text-indigo-900 font-bold mb-4">Reset Credentials (Optional)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="password" class="text-xs font-black text-indigo-400 uppercase tracking-widest block">New Password</label>
                                <input type="password" name="password" id="password" class="w-full bg-white border border-indigo-100 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-100 transition transition">
                            </div>
                            <div class="space-y-2">
                                <label for="password_confirmation" class="text-xs font-black text-indigo-400 uppercase tracking-widest block">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full bg-white border border-indigo-100 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-100 transition transition">
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4 pt-4 pt-4">
                        <button type="submit" class="flex-1 bg-indigo-600 text-white py-5 rounded-3xl font-black uppercase tracking-widest hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition hover:scale-[1.02]">Save Administrator Profile</button>
                        <a href="{{ route('central.users.index') }}" class="bg-gray-100 text-gray-500 px-10 py-5 rounded-3xl font-bold flex items-center justify-center hover:bg-gray-200 transition transition">Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
