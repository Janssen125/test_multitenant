<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only run this inside a tenant context
        if (!tenant('id')) {
            return;
        }

        $tenantId = tenant('id');

        // Sample menu data for restaurant tenants
        Menu::create([
            'name' => ucfirst($tenantId) . ' Signature Burger',
            'description' => 'A juicy, double-stacked Wagyu beef patty topped with caramelized onions, aged sharp cheddar, and our secret ' . $tenantId . ' sauce on a toasted brioche bun.',
            'price' => 18.50,
            'image_url' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&q=80&w=800',
            'is_active' => true,
        ]);

        Menu::create([
            'name' => 'Garden Fresh Pasta',
            'description' => 'Handmade fettuccine tossed with slow-roasted cherry tomatoes, extra virgin olive oil, fresh basil from our ' . $tenantId . ' garden, and shavings of Pecorino Romano.',
            'price' => 15.90,
            'image_url' => 'https://images.unsplash.com/photo-1473093226795-af9932fe5856?auto=format&fit=crop&q=80&w=800',
            'is_active' => true,
        ]);

        Menu::create([
            'name' => 'Classic Caesar Salad',
            'description' => 'Crisp organic romaine lettuce, house-made sourdough croutons, creamy Caesar dressing, and premium white anchovies. A ' . ucfirst($tenantId) . ' favorite.',
            'price' => 12.00,
            'image_url' => 'https://images.unsplash.com/photo-1550304943-4f24f54ddde9?auto=format&fit=crop&q=80&w=800',
            'is_active' => true,
        ]);
        
        Menu::create([
            'name' => 'Dark Chocolate Lava Cake',
            'description' => 'Warm, decadent Belgian chocolate cake with a molten center, served with a scoop of Madagascar vanilla bean gelato and fresh raspberry coulis.',
            'price' => 9.50,
            'image_url' => 'https://images.unsplash.com/photo-1624353365286-3f8d62daad51?auto=format&fit=crop&q=80&w=800',
            'is_active' => true,
        ]);
    }
}
