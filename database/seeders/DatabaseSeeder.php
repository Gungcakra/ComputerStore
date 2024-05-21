<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'is_admin' => false
        ]);


        Category::create([
            'name' => 'Mouse'
        ]);

        Category::create([
            'name' => 'Keyboard'
        ]);
        Category::create([
            'name' => 'Laptop'
        ]);
        Category::create([
            'name' => 'Monitor'
        ]);
        Category::create([
            'name' => 'PC'
        ]);

        // Mouse
        Product::create([
            'category_id' => 1,
            'name' => 'Logitech G Pro Wireless Gaming Mouse',
            'description' => 'Wireless gaming mouse with advanced sensor technology',
            'price' => 1200000,
            'image_path' => 'logitech_g_pro.png',
            'stock' => 15
        ]);

        // Keyboard
        Product::create([
            'category_id' => 2,
            'name' => 'Corsair K95 RGB Platinum XT Mechanical Gaming Keyboard',
            'description' => 'Mechanical gaming keyboard with customizable RGB lighting',
            'price' => 2500000,
            'image_path' => 'corsair_k95_rgb.png',
            'stock' => 8
        ]);

        // Laptop
        Product::create([
            'category_id' => 3,
            'name' => 'Dell XPS 13 Laptop',
            'description' => 'Ultra-thin laptop with high-resolution InfinityEdge display',
            'price' => 18000000,
            'image_path' => 'dell_xps_13.png',
            'stock' => 5
        ]);

        // Monitor
        Product::create([
            'category_id' => 4,
            'name' => 'LG 27GL83A-B 27 Inch Ultragear QHD IPS Monitor',
            'description' => 'QHD IPS gaming monitor with ultra-fast refresh rate',
            'price' => 3500000,
            'image_path' => 'lg_ultragear.png',
            'stock' => 12
        ]);

        // PC
        Product::create([
            'category_id' => 5,
            'name' => 'CyberpowerPC Gamer Xtreme VR Gaming PC',
            'description' => 'High-performance gaming PC with VR-ready capabilities',
            'price' => 8000000,
            'image_path' => 'cyberpowerpc_gamer_xtreme.png',
            'stock' => 7
        ]);

        // Mouse
        Product::create([
            'category_id' => 1,
            'name' => 'SteelSeries Rival 600 Gaming Mouse',
            'description' => 'Dual sensor system for precision and customizable weight',
            'price' => 1500000,
            'image_path' => 'steelseries_rival_600.png',
            'stock' => 20
        ]);

        // Keyboard
        Product::create([
            'category_id' => 2,
            'name' => 'Razer BlackWidow Elite Mechanical Gaming Keyboard',
            'description' => 'Mechanical gaming keyboard with Razer mechanical switches',
            'price' => 2200000,
            'image_path' => 'razer_blackwidow_elite.png',
            'stock' => 10
        ]);

        // Laptop
        Product::create([
            'category_id' => 3,
            'name' => 'HP Spectre x360 13t Touch Laptop',
            'description' => 'Convertible laptop with 4K touch display and powerful performance',
            'price' => 16000000,
            'image_path' => 'hp_spectre_x360.png',
            'stock' => 6
        ]);

        // Monitor
        Product::create([
            'category_id' => 4,
            'name' => 'ASUS ROG Swift PG279Q 27" Gaming Monitor',
            'description' => '27-inch WQHD gaming monitor with G-SYNC technology',
            'price' => 4000000,
            'image_path' => 'asus_rog_swift.png',
            'stock' => 15
        ]);

        // PC
        Product::create([
            'category_id' => 5,
            'name' => 'Alienware Aurora R10 Gaming Desktop',
            'description' => 'AMD Ryzen Edition gaming desktop with powerful graphics options',
            'price' => 10000000,
            'image_path' => 'alienware_aurora_r10.png',
            'stock' => 8
        ]);
    }
}
