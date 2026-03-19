<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} - Invite Member</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">
    <nav class="bg-indigo-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <h1 class="text-xl font-bold tracking-tight">{{ ucfirst(tenant('id')) }} CMS Admin</h1>
            <a href="{{ route('tenant.team') }}" class="text-sm font-medium hover:text-indigo-200 transition">Back to Team</a>
        </div>
    </nav>

    <main class="max-w-2xl mx-auto px-6 py-12 md:py-20">
        <header class="mb-10">
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Invite Team Member</h2>
            <p class="text-slate-500 mt-2 font-medium italic">They will have isolated access to this restaurant workspace.</p>
        </header>

        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 md:p-12">
            <form action="{{ route('tenant.team.store') }}" method="POST" class="space-y-8">
                @csrf
                
                <div class="space-y-3">
                    <label for="name" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="John Doe" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-slate-900">
                </div>

                <div class="space-y-3">
                    <label for="email" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="john@example.com" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-indigo-600">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-medium">
                    <div class="space-y-3">
                        <label for="password" class="text-sm font-black text-slate-400 uppercase tracking-widest block text-rose-600">Password</label>
                        <input type="password" name="password" id="password" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg">
                    </div>
                    <div class="space-y-3">
                        <label for="password_confirmation" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg">
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-5 rounded-3xl font-black uppercase tracking-widest hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition hover:scale-[1.02]">Invite Member</button>
            </form>
        </div>
    </main>
</body>
</html>
