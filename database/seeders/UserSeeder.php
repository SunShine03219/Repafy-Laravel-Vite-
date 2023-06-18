<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // https://github.com/mshoaibdev/laravel-country-states-city-seeds-migration
        $this->seedUsers();
    }

    private function seedUsers(): void
    {
        DB::table('users')->delete();

        $users = array(
            array('id' => 1, 'name' => 'admin', 'password' => Hash::make("123456"), 'country' => 142, 'division' => 2, 'phone' => 1234567890)
        );

        DB::table('users')->insert($users);
    }
}
