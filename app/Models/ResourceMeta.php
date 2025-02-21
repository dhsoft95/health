<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'resource_id',
        'key',
        'value'
    ];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

}
