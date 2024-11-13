<?php

namespace Database\Seeders;
use App\Models\Project;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'Esempio Progetto',
            'link' => 'https://example.com',
            'start_date' => '2024-01-01',
            'end_date' => '2024-06-01'
        ]);
    }
}