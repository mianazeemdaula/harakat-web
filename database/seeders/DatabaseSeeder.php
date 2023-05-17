<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Spatie\Permission\Models\Role;

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
            ['name' => 'Resturant & Cafe', 'name_ar' => 'مطاعم و كافيهات', 'image' => 'images/cat_resturent.jpg'],
            ['name' => 'Fashion & Perfumes', 'name_ar' => 'الأزياء والعطور', 'image' => 'images/cat_fashion.jpg'],
            ['name' => 'Sweets & Flowers', 'name_ar' => 'حلويات وزهور', 'image' => 'images/cat_flower.jpg'],
            ['name' => 'Electronics', 'name_ar' => 'إلكترونيات', 'image'=> 'images/cat_electronic.jpg'],
        ]);

        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'shop']);
        $role = Role::create(['name' => 'rider']);

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
        \App\Models\User::factory(1)->state(new Sequence(fn ($se) => ['email' => "admin@gmail.com"],
        ))->create();
        \App\Models\User::find(1)->assignRole('admin');
        // \App\Models\User::factory(10)->state(new Sequence(fn ($se) => ['email' => "shop".$se->index."@gmail.com"],
        // ))->create();
        // \App\Models\User::factory(10)->state(new Sequence(fn ($se) => ['email' => "rider".$se->index."@gmail.com"],
        // ))->create();
        // \App\Models\User::factory(10)->state(new Sequence(fn ($se) => ['email' => "user".$se->index."@gmail.com"],
        // ))->create();
        // \App\Models\Shop::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+2],
        // ))->create()->each(function($shop){
            
        // });
        // \App\Models\Addon::factory(rand(5,10))->create();
        // \App\Models\Rider::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+12],
        // ))->create();
        // \App\Models\Customer::factory(10)->state(new Sequence(fn ($se) => ['user_id' =>$se->index+22],
        // ))->create();
        // \App\Models\ProductCategory::factory(10)->create();
        // \App\Models\Product::factory(100)->create()->each(function($p){
        //     $p->addons()->sync([rand(1,10),rand(11,20),rand(21,30), rand(31,40)]);
        // });
        // \App\Models\PaymentCard::factory(100)->create();
        // \App\Models\Review::factory(300)->create();

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('password'),
        // ]);
        // $user->customer()->save(new \App\Models\Customer([
        //     'city_id' => 1,
        //     'dob' => now(),
        //     'gender' => 'male',
        // ]));
        // \App\Models\Offer::factory(100)->create();
        // \App\Models\Notification::factory(200)->create();
        // \App\Models\Address::factory(50)->create();
        // \App\Models\AppContent::factory(10)->create();
        // \App\Models\Inbox::factory(100)->create();
        \App\Models\LoyaltyCard::insert([
            ['name' => 'Fazaa', 'name_ar' => 'فزعة'],
            ['name' => 'Homat al watan', 'name_ar' => 'حماة الوطن'],
            ['name' => 'Issad', 'name_ar' => 'اسعاد'],
        ]);
        \App\Models\Setting::insert([
            ['key' => 'bike_base_rate', 'value' => 20, 'type' => 'float', 'category' => 'app'],
            ['key' => 'bike_base_km', 'value' => 10, 'type' => 'float', 'category' => 'app'],
            ['key' => 'bike_per_km', 'value' => 1, 'type' => 'integer', 'category' => 'app'],
            ['key' => 'bike_max_charges', 'value' => 40, 'type' => 'float', 'category' => 'app'],
            ['key' => 'car_base_rate', 'value' => 25, 'type' => 'float', 'category' => 'app'],
            ['key' => 'car_base_km', 'value' => 10, 'type' => 'integer', 'category' => 'app'],
            ['key' => 'car_per_km', 'value' => 1, 'type' => 'float', 'category' => 'app'],
            ['key' => 'car_max_charges', 'value' => 50, 'type' => 'float', 'category' => 'app'],
            ['key' => 'bike_max_weight', 'value' => 10, 'type' => 'integer', 'category' => 'app'],
        ]);
        \App\Models\ShopLoyaltyCardDiscount::factory(10)->create();
    }
}
