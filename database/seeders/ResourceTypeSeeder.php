<?php

namespace Database\Seeders;

use App\Models\ResourceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ResourceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $types = [
            [
                'name' => 'Guide',
                'description' => 'Comprehensive guides about mental health topics'
            ],
            [
                'name' => 'eBook',
                'description' => 'Detailed digital books for in-depth learning'
            ],
            [
                'name' => 'Article',
                'description' => 'Short-form content on specific topics'
            ],
            [
                'name' => 'Case Study',
                'description' => 'Real-world examples and analysis'
            ]
        ];

        foreach ($types as $type) {
            ResourceType::create([
                'name' => $type['name'],
                'slug' => Str::slug($type['name']),
                'description' => $type['description']
            ]);
        }
    }
}
