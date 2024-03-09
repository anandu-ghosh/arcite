<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitutionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Institution::create([
            'name' => 'Ins1',
            'address' => 'abcdefg',
            'email' => 'ins1@gmail.vom',
            'phone' => '5624512',
            'status' => 1
        ]);
    }
}
