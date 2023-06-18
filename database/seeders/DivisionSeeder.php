<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->delete();
        $divisions = [
            ['id' => 1,  'name' => 'Repartidor'],
            ['id' => 2,  'name' => 'Cliente']
        ];

        DB::table('divisions')->insert($divisions);
    }
}
