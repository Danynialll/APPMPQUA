<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call all individual seeders
        $this->call('ExpertiseFieldSeeder');
        $this->call('QvcUniversitySeeder');
    }
}
