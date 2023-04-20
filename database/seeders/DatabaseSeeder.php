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
            ['name' => 'Resturant & Cafe', 'name_ar' => 'مطعم وكافيه'],
            ['name' => 'Fashion & Perfumes', 'name_ar' => 'الأزياء والعطور'],
            ['name' => 'Sweets & Flowers', 'name_ar' => 'حلويات وزهور'],
            ['name' => 'Electronics', 'name_ar' => 'إلكترونيات'],
        ]);

        \App\Models\City::insert([
            ['name' => 'Dubai', 'name_ar' => 'دبي'],
            ['name' => 'Abu Dhabi', 'name_ar' => 'أبو ظبي'],
            ['name' => 'Sharja', 'name_ar' => 'الشارقة'],
            ['name' => 'Ajman', 'name_ar' => 'عجمان'],
            ['name' => 'Ras Al-Khaimah', 'name_ar' => 'رأس الخيمة'],
            ['name' => 'Al Ain', 'name_ar' => 'العين'],
            ['name' => 'Fujairah', 'name_ar' => 'الفجيرة'],
            ['name' => 'Umm Al Quwain', 'name_ar' => 'أم القيوين'],
        ]);
        \App\Models\User::factory(10)->state(new Sequence(fn ($se) => ['email' => "shop".$se->index."@gmail.com"],
        ))->create();
        \App\Models\User::factory(10)->state(new Sequence(fn ($se) => ['email' => "rider".$se->index."@gmail.com"],
        ))->create();
        \App\Models\User::factory(10)->state(new Sequence(fn ($se) => ['email' => "user".$se->index."@gmail.com"],
        ))->create();
        \App\Models\Shop::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+1],
        ))->create()->each(function($shop){
            \App\Models\Addon::factory(rand(10,20))->state(new Sequence(fn ($se) => ['user_id' =>$shop->user_id],
            ))->create();
        });
        \App\Models\Rider::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+11],
        ))->create();
        \App\Models\Customer::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+21],
        ))->create();
        \App\Models\ProductCategory::factory(10)->create();
        \App\Models\Product::factory(100)->create()->each(function($p){
            $p->addons()->sync([rand(1,10),rand(11,20),rand(21,30), rand(31,40)]);
        });
        \App\Models\PaymentCard::factory(100)->create();
        \App\Models\Review::factory(300)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->customer()->save(new \App\Models\Customer([
            'city_id' => 1,
            'dob' => now(),
            'gender' => 'male',
        ]));
        \App\Models\Offer::factory(100)->create();
        \App\Models\Notification::factory(200)->create();
        \App\Models\Address::factory(50)->create();
        \App\Models\AppContent::factory(10)->create();
        \App\Models\Inbox::factory(100)->create();
    }
}
