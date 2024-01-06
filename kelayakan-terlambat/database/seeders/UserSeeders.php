<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            //colum table db => value
            'name' => "administrator",
            'email' => "admin@gmail.com",
            'role' => "admin",
            "password" => Hash::make("admin"),
            //cara lain ekpripsi : bcyrpt


        ]);
        User::create([
            'name' => "PS",
            'email' => "PS@gmail.com",
            'role' => "PS",
            "password" => Hash::make("PS"),
        ]);
    }
}
