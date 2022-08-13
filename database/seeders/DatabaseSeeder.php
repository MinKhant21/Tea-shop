<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'user',
            'password' => Hash::make('password'),
            
        ]);

        Product::create([
            'slug' => Str::slug('လက်ဖက်ရည်ပုံမှန်'),
            'name' => 'လက်ဖက်ရည်ပုံမှန်',
            'price' => 700,
        ]);

        Product::create([
            'slug' => Str::slug('Coke'),
            'name' => 'coke',
            'price' => 900,
        ]);

        Product::create([
            'slug' => Str::slug('ထမင်းကြော်'),
            'name' => 'ထမင်းကြော်',
            'price' => 1500,
        ]);

        Product::create([
            'slug' => Str::slug('နံပြား'),
            'name' => 'နံပြား',
            'price' => 300,
        ]);

       
        
    }
}
