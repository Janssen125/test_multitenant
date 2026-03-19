<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaaS Multi-Tenant Platform</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-black text-white min-h-screen antialiased selection:bg-indigo-500 selection:text-white">
    <div class="absolute inset-0 bg-[url('https://laravel.com/assets/img/welcome/background.svg')] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))] opacity-20 pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 py-12">
        <nav class="flex justify-between items-center py-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center font-bold text-xl shadow-lg shadow-indigo-500/30">M</div>
                <span class="text-2xl font-extrabold tracking-tight">MultiSaaS</span>
            </div>
            <div class="flex gap-4">
                <a href="#" class="text-sm font-medium text-slate-300 hover:text-white transition mt-2">Login</a>
                <a href="#" class="text-sm font-medium bg-white/10 hover:bg-white/20 border border-white/10 px-4 py-2 rounded-full transition backdrop-blur-md">Get Started</a>
            </div>
        </nav>

        <main class="mt-20 lg:mt-32 flex flex-col items-center text-center">
            <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 mb-6">
                The Future of SaaS
            </h1>
            <p class="text-lg lg:text-xl text-slate-400 max-w-2xl mb-12">
                Launch, scale, and manage isolated tenant environments at the click of a button. Powered by Laravel, Vercel, and Neon Database.
            </p>

            <!-- Tenants Grid -->
            <div class="w-full max-w-5xl mx-auto mt-8">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-slate-200">Active Workspaces</h2>
                    <span class="px-3 py-1 bg-indigo-500/10 text-indigo-400 text-xs font-bold uppercase tracking-wider rounded-full border border-indigo-500/20">Live Environments</span>
                </div>

                @if(isset($tenants) && $tenants->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                        @foreach($tenants as $tenant)
                            <div class="group relative bg-white/5 border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition duration-300 backdrop-blur-xl overflow-hidden shadow-2xl">
                                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                                <div class="flex justify-between items-start mb-4">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-xl font-bold shadow-lg">
                                        {{ strtoupper(substr($tenant->id, 0, 1)) }}
                                    </div>
                                    <span class="px-2 py-1 bg-emerald-500/20 text-emerald-400 text-[10px] font-bold uppercase rounded-md border border-emerald-500/30">Online</span>
                                </div>
                                
                                <h3 class="text-xl font-bold mb-2">{{ ucfirst($tenant->id) }} Workspace</h3>
                                <p class="text-slate-400 text-sm mb-6">Explore the isolated environment customized exclusively for {{ ucfirst($tenant->id) }}.</p>
                                
                                <div class="space-y-2 relative z-10">
                                    @foreach($tenant->domains as $domain)
                                        <a href="http://{{ $domain->domain }}" class="flex items-center justify-between px-4 py-3 bg-black/40 hover:bg-black/60 rounded-xl text-sm text-indigo-300 hover:text-indigo-200 transition border border-transparent hover:border-indigo-500/30 group/link">
                                            <span class="font-medium font-mono text-xs">{{ $domain->domain }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover/link:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-12 backdrop-blur-xl mb-12">
                        <p class="text-slate-400">No tenants have been generated yet. Run the seeder to see the magic!</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>
