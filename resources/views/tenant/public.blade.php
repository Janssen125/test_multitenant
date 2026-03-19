<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(tenant('id')) }} - Our Menu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-amber-50 text-stone-900 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white/80 sticky top-0 backdrop-blur-md z-50 border-b border-amber-200">
        <div class="max-w-7xl mx-auto px-6 h-20 items-center justify-between flex">
            <h1 class="font-serif text-3xl font-bold italic text-amber-900">{{ ucfirst(tenant('id')) }} Kitchen</h1>
            <div class="flex items-center gap-8">
                <a href="#" class="text-amber-900 font-medium border-b-2 border-amber-900 pb-1">Menu</a>
                <a href="#" class="text-amber-700 hover:text-amber-900 transition">About</a>
                <a href="#" class="text-amber-700 hover:text-amber-900 transition">Contact</a>
                <a href="/admin/dashboard" class="px-5 py-2.5 bg-amber-900 text-white rounded-full text-sm font-bold shadow-lg shadow-amber-900/20 hover:bg-amber-800">Admin CMS</a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <header class="py-20 text-center bg-[url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center text-white relative">
        <div class="absolute inset-0 bg-stone-900/60"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <h2 class="font-serif text-5xl md:text-7xl font-bold mb-6 italic leading-tight">Authentic Flavors, <br>Crafted with Love.</h2>
            <p class="text-lg md:text-xl text-stone-200 max-w-2xl mx-auto leading-relaxed">
                Experience the finest cuisine at {{ ucfirst(tenant('id')) }} Kitchen. We use only fresh, locally sourced ingredients to create dishes that tell a story.
            </p>
        </div>
    </header>

    <!-- Menu Grid -->
    <main class="max-w-6xl mx-auto px-6 py-24">
        <div class="text-center mb-16">
            <span class="text-amber-600 font-bold tracking-widest uppercase text-sm mb-4 block underline">Today's Specials</span>
            <h3 class="font-serif text-4xl font-bold text-amber-900 italic">Explore Our Signature Menu</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($menus as $menu)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-xl shadow-stone-200/50 border border-stone-100 transition duration-500 hover:-translate-y-2">
                    <div class="relative h-64">
                        <img src="{{ $menu->image_url ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=800' }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="{{ $menu->name }}">
                        <div class="absolute top-4 right-4 bg-amber-900 text-white px-4 py-2 rounded-full font-bold shadow-lg">${{ $menu->price }}</div>
                    </div>
                    <div class="p-8">
                        <h4 class="font-serif text-2xl font-bold text-amber-900 mb-2 italic">{{ $menu->name }}</h4>
                        <p class="text-stone-500 text-sm leading-relaxed">{{ $menu->description }}</p>
                        <button class="mt-8 w-full py-4 rounded-2xl bg-amber-50 text-amber-900 font-bold border border-amber-200 hover:bg-amber-900 hover:text-white transition duration-300 uppercase tracking-widest text-xs">Order Now</button>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-stone-200 p-12 italic text-stone-400">
                    <p class="text-2xl font-serif">The kitchen is preparing... <br>Check back soon for our new menu Items!</p>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-stone-900 text-stone-400 py-16 text-center">
        <p class="font-serif text-white italic text-xl mb-6">Built with MultiSaaS Tenancy</p>
        <div class="flex justify-center gap-6 text-sm">
            <a href="#" class="hover:text-white">Privacy</a>
            <a href="#" class="hover:text-white">Terms</a>
            <a href="#" class="hover:text-white">Facebook</a>
            <a href="#" class="hover:text-white">Instagram</a>
        </div>
    </footer>
</body>
</html>
