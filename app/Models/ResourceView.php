<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceView extends Model
{
    use HasFactory;

    protected $fillable = [
        'resource_id',
        'ip_address',
        'user_agent'
    ];

    public function resource(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }
}
