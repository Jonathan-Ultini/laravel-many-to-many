<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Vue.js'];
        foreach ($technologies as $technology) {
            Technology::create(['name' => $technology]);
        }
    }
}
