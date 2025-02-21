<?php

namespace Database\Seeders;

use App\Models\Resource;
use App\Models\ResourceType;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $guideType = ResourceType::where('name', 'Guide')->first();
        $articleType = ResourceType::where('name', 'Article')->first();

        // Sample resources
        $resources = [
            [
                'type_id' => $guideType->id,
                'title' => 'Understanding Anxiety: A Comprehensive Guide',
                'summary' => 'A complete guide to understanding and managing anxiety',
                'content' => 'This comprehensive guide covers everything you need to know about anxiety...',
                'author' => 'Dr. Sarah Johnson',
                'reading_time' => 15,
                'is_published' => true,
                'topics' => ['Anxiety', 'Stress Management']
            ],
            [
                'type_id' => $articleType->id,
                'title' => 'Five Daily Self-Care Practices',
                'summary' => 'Simple self-care practices for better mental health',
                'content' => 'Implementing these five daily self-care practices can significantly improve...',
                'author' => 'Dr. Michael Brown',
                'reading_time' => 8,
                'is_published' => true,
                'topics' => ['Self-Care', 'Stress Management']
            ]
        ];

        foreach ($resources as $resource) {
            $newResource = Resource::create([
                'resource_type_id' => $resource['type_id'],
                'title' => $resource['title'],
                'slug' => Str::slug($resource['title']),
                'summary' => $resource['summary'],
                'content' => $resource['content'],
                'author' => $resource['author'],
                'reading_time' => $resource['reading_time'],
                'is_published' => $resource['is_published'],
                'published_at' => now(),
            ]);

            // Attach topics
            $topics = Topic::whereIn('name', $resource['topics'])->get();
            $newResource->topics()->attach($topics);
        }
    }
}
