<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} - Add New Dish</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">
    <nav class="bg-indigo-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <h1 class="text-xl font-bold tracking-tight">{{ ucfirst(tenant('id')) }} CMS Admin</h1>
            <a href="{{ route('tenant.dashboard') }}" class="text-sm font-medium hover:text-indigo-200 transition">Back to Dashboard</a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-6 py-12 md:py-20">
        <header class="mb-10">
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Add a New Dish to the Menu</h2>
            <p class="text-slate-500 mt-2 font-medium">This item will be added instantly to your public restaurant page.</p>
        </header>

        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 md:p-12">
            <form action="{{ route('tenant.menu.store') }}" method="POST" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-medium">
                    <div class="space-y-3">
                        <label for="name" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Dish Name</label>
                        <input type="text" name="name" id="name" placeholder="e.g. Lobster Pasta" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-slate-900 placeholder:text-slate-300">
                    </div>
                    <div class="space-y-3">
                        <label for="price" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Price ($)</label>
                        <input type="number" step="0.01" name="price" id="price" placeholder="25.00" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-slate-900 placeholder:text-slate-300">
                    </div>
                </div>

                <div class="space-y-3">
                    <label for="description" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Description & Ingredients</label>
                    <textarea name="description" id="description" rows="4" placeholder="Describe your masterpiece..." class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-medium text-slate-700 placeholder:text-slate-300"></textarea>
                </div>

                <div class="space-y-3">
                    <label for="image_url" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Image URL (Optional)</label>
                    <input type="url" name="image_url" id="image_url" placeholder="Paste an unsplash URL here..." class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-medium text-slate-700 placeholder:text-slate-300">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-5 rounded-3xl font-black uppercase tracking-widest hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition hover:scale-[1.02]">Save & Publish Dish</button>
            </form>
        </div>
    </main>
</body>
</html>
