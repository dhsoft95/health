<?php

namespace App\Models;

use App\Traits\HasResourceViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use HasFactory, SoftDeletes,HasResourceViews;

    protected $fillable = [
        'resource_type_id',
        'title',
        'slug',
        'summary',
        'content',
        'featured_image',
        'download_url',
        'author',
        'thumbnail',
        'social_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'robots',
        'og_title',
        'og_description',
        'twitter_title',
        'twitter_description',
        'reading_time',
        'is_featured',
        'is_published',
        'published_at'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function type()
    {
        return $this->belongsTo(ResourceType::class, 'resource_type_id');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function meta()
    {
        return $this->hasMany(ResourceMeta::class);
    }

    public function views()
    {
        return $this->hasMany(ResourceView::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

}
