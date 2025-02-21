<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $topics = [
            [
                'name' => 'Anxiety',
                'description' => 'Understanding and managing anxiety'
            ],
            [
                'name' => 'Depression',
                'description' => 'Coping with depression and treatment options'
            ],
            [
                'name' => 'Stress Management',
                'description' => 'Techniques for managing stress'
            ],
            [
                'name' => 'Self-Care',
                'description' => 'Practices for maintaining mental well-being'
            ],
            [
                'name' => 'Relationships',
                'description' => 'Building and maintaining healthy relationships'
            ],
            [
                'name' => 'Work-Life Balance',
                'description' => 'Managing professional and personal life'
            ]
        ];

        foreach ($topics as $topic) {
            Topic::create([
                'name' => $topic['name'],
                'slug' => Str::slug($topic['name']),
                'description' => $topic['description']
            ]);
        }
    }
}
