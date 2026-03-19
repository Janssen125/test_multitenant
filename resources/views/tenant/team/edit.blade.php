<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} - Edit Member</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">
    <nav class="bg-indigo-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <h1 class="text-xl font-bold tracking-tight">{{ ucfirst(tenant('id')) }} CMS Admin</h1>
            <a href="{{ route('tenant.team') }}" class="text-sm font-medium hover:text-indigo-200 transition">Back to List</a>
        </div>
    </nav>

    <main class="max-w-2xl mx-auto px-6 py-12 md:py-20">
        <header class="mb-10">
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Edit Member Profile</h2>
            <p class="text-slate-500 mt-2 font-medium italic">Update access details for {{ $user->name }}.</p>
        </header>

        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 md:p-12">
            <form action="{{ route('tenant.team.update', $user->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')
                
                <div class="space-y-3">
                    <label for="name" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-slate-900">
                </div>

                <div class="space-y-3">
                    <label for="email" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-indigo-600">
                </div>

                <div class="bg-indigo-50/50 p-6 rounded-2xl border border-indigo-100">
                    <h4 class="text-indigo-900 font-bold mb-4">Change Password (Optional)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="password" class="text-xs font-black text-indigo-400 uppercase tracking-widest block">New Password</label>
                            <input type="password" name="password" id="password" class="w-full bg-white border border-indigo-100 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-100 transition">
                        </div>
                        <div class="space-y-2">
                            <label for="password_confirmation" class="text-xs font-black text-indigo-400 uppercase tracking-widest block">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full bg-white border border-indigo-100 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-100 transition">
                        </div>
                    </div>
                    <p class="text-xs text-indigo-400 mt-4 italic">Leave blank if you don't want to change the password.</p>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-indigo-600 text-white py-5 rounded-3xl font-black uppercase tracking-widest hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition hover:scale-[1.02]">Save Member</button>
                    <a href="{{ route('tenant.team') }}" class="bg-slate-100 text-slate-500 px-10 py-5 rounded-3xl font-bold flex items-center justify-center hover:bg-slate-200 transition">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
