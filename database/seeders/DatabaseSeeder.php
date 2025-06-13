<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('email', 'test@example.com')->exists()) {
            $user = new User();
            $user->name = 'Test User';
            $user->email = 'test@example.com';
            $user->password = Hash::make('test123*');
            $user->save();
        }

        Producto::factory(30)->create();
    }
}
