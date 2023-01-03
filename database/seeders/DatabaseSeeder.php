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
        \App\Models\User::factory(20)->state(new Sequence(fn ($se) => ['type' =>$se->index < 10 ? 'merchant' : 'rider'],
        ))->create();
        \App\Models\Merchant::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+1],
        ))->create();
        \App\Models\Rider::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+11],
        ))->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
