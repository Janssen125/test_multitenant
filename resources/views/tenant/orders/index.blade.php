<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} - Customer Orders</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">
    <nav class="bg-indigo-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <h1 class="text-xl font-bold tracking-tight">{{ ucfirst(tenant('id')) }} Orders</h1>
            <a href="{{ route('tenant.dashboard') }}" class="text-sm font-medium hover:text-indigo-200 transition">Back to Overview</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12">
        <header class="mb-12">
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Active Customer Orders</h2>
            <p class="text-slate-500 mt-2 font-medium">Real-time order tracking for your kitchen.</p>
        </header>

        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-12 text-center">
            <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 italic mb-2">The kitchen is currenty quiet...</h3>
            <p class="text-slate-500 max-w-sm mx-auto mb-8 leading-relaxed font-medium">Your restaurant is live! New orders from your customers will appear here instantly as soon as they are placed.</p>
            <a href="{{ route('tenant.public') }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">Check Public Front-end</a>
        </div>
    </main>
</body>
</html>
