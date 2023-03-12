<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::insert([
            ['name' => 'Resturant & Cafe', 'name_ar' => 'Resturant & Cafe'],
            ['name' => 'Fashion & Perfumes', 'name_ar' => 'Fashion & Perfumes'],
            ['name' => 'Sweets & Flowers', 'name_ar' => 'Sweets & Flowers'],
            ['name' => 'Electronics', 'name_ar' => 'Electronics'],
        ]);

        \App\Models\City::insert([
            ['name' => 'Dubai', 'name_ar' => 'Electronics'],
            ['name' => 'Abu Dhabi', 'name_ar' => 'Resturant & Cafe'],
            ['name' => 'Sharja', 'name_ar' => 'Fashion & Perfumes'],
            ['name' => 'Ajman', 'name_ar' => 'Sweets & Flowers'],
            ['name' => 'Ras Al-Khaimah', 'name_ar' => 'Sweets & Flowers'],
            ['name' => 'Al Ain', 'name_ar' => 'Sweets & Flowers'],
            ['name' => 'Fujairah', 'name_ar' => 'Sweets & Flowers'],
            ['name' => 'Umm Al Quwain', 'name_ar' => 'Sweets & Flowers'],
        ]);
        \App\Models\User::factory(30)->create();
        \App\Models\Shop::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+1],
        ))->create();
        \App\Models\Rider::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+11],
        ))->create();
        \App\Models\Customer::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+21],
        ))->create();
        \App\Models\ProductCategory::factory(10)->create();
        \App\Models\Product::factory(100)->create();
        \App\Models\PaymentCard::factory(100)->create();
        \App\Models\Review::factory(300)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
