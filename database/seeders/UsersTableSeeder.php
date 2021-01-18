<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Taufan',
            'email' => 'taufanfadhilahiskandar@gmail.com',
            'password' => bcrypt('secret123')
        ]);
        User::factory()->times(10)->create();
    }
}
