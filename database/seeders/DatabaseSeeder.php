<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '@Yanuar17'
        ]);

        $meal = Category::create([
            'name' => 'makanan',
        ]);

        $drink = Category::create([
            'name' => 'minuman',
        ]);

        $snack = Category::create([
            'name' => 'cemilan',
        ]);

        Item::create([
            'name' => 'Nasi Goreng',
            'path' => 'nasi_goreng.png',
            'desc' => 'Nasi goreng dengan bumbu pedas',
            'price' => 15000,
            'category_id' => $meal->id
        ]);

        Item::create([
            'name' => 'Kwetiaw Goreng',
            'path' => 'kwetiaw.png',
            'desc' => 'Kwetiaw goreng dengan bumbu pedas',
            'price' => 13000,
            'category_id' => $meal->id
        ]);

        Item::create([
            'name' => 'Ayam Geprek',
            'path' => 'ayam_geprek.png',
            'desc' => 'Ayam geprek dengan bumbu pedas',
            'price' => 15000,
            'category_id' => $meal->id
        ]);

        Item::create([
            'name' => 'Indomie Goreng',
            'path' => 'indomie_goreng2.png',
            'desc' => 'Indomie goreng dengan bumbu pedas',
            'price' => 10000,
            'category_id' => $meal->id
        ]);

        Item::create([
            'name' => 'Indomie Rebus',
            'path' => 'indomie_rebus.png',
            'desc' => 'Indomie rebus dengan bumbu pedas',
            'price' => 10000,
            'category_id' => $meal->id
        ]);

        Item::create([
            'name' => 'Es Teh Manis',
            'path' => 'esteh.png',
            'desc' => 'Es teh manis nyegerin',
            'price' => 3000,
            'category_id' => $drink->id
        ]);

        Item::create([
            'name' => 'Es Kopi',
            'path' => 'eskopi.png',
            'desc' => 'Es kopi nyegerin',
            'price' => 4000,
            'category_id' => $drink->id
        ]);

        Item::create([
            'name' => 'Gorengan',
            'path' => 'gorengan.png',
            'desc' => 'Gorengan hangat',
            'price' => 1000,
            'category_id' => $snack->id
        ]);
    }
}
