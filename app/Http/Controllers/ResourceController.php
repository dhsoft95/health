<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index()
    {
        $resources = Resource::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('resources.index', compact('resources'));
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $resource = Resource::with(['type', 'topics'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Record a view for this resource
        $resource->recordView();

        return view('resources.show', compact('resource'));
    }
}
