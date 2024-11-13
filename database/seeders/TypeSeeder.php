<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $types = ['Full-stack', 'Front-end', 'Back-end', 'Database'];
        
        foreach ($types as $type) {
            Type::create(['name' => $type]);
        }
    }
}
