<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} - Edit Dish</title>
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
        <header class="mb-10 flex items-center gap-6">
            <div class="w-20 h-20 rounded-3xl overflow-hidden border-4 border-white shadow-xl">
                 <img src="{{ $menu->image_url ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=800' }}" class="w-full h-full object-cover" alt="">
            </div>
            <div>
                <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Modify "{{ $menu->name }}"</h2>
                <p class="text-slate-500 mt-1 font-medium italic">Update the pricing, description or visuals for this dish.</p>
            </div>
        </header>

        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 md:p-12">
            <form action="{{ route('tenant.menu.update', $menu->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-medium">
                    <div class="space-y-3">
                        <label for="name" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Dish Name</label>
                        <input type="text" name="name" id="name" value="{{ $menu->name }}" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-slate-900">
                    </div>
                    <div class="space-y-3">
                        <label for="price" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Price ($)</label>
                        <input type="number" step="0.01" name="price" id="price" value="{{ $menu->price }}" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-bold text-slate-900">
                    </div>
                </div>

                <div class="space-y-3">
                    <label for="description" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Description & Ingredients</label>
                    <textarea name="description" id="description" rows="4" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-medium text-slate-700">{{ $menu->description }}</textarea>
                </div>

                <div class="space-y-3">
                    <label for="image_url" class="text-sm font-black text-slate-400 uppercase tracking-widest block">Image URL</label>
                    <input type="url" name="image_url" id="image_url" value="{{ $menu->image_url }}" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition text-lg font-medium text-slate-700">
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-indigo-600 text-white py-5 rounded-3xl font-black uppercase tracking-widest hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition hover:scale-[1.02]">Save Changes</button>
                    <a href="{{ route('tenant.dashboard') }}" class="bg-slate-100 text-slate-500 px-10 py-5 rounded-3xl font-bold flex items-center justify-center hover:bg-slate-200 transition">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
