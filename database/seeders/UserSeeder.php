<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();

        $users = [
            ['name' => 'Admin', 'email' => 'admin@test.com', 'password' => Hash::make('secret')],
            ['name' => 'Atendente', 'email' => 'atendente@test.com', 'password' => Hash::make('secret')],
        ];

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user) {
            User::create($user);
        }

        Model::reguard();
    }
}
