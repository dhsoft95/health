<!-- resources/views/resources/index.blade.php -->
@extends('layouts.app')

@section('content')
<section class="blog-area ptb-100">
    <div class="container">
        <div class="row">
            @forelse($resources as $resource)
            <div class="col-lg-4 col-md-6">
                <div class="single-blog-post">
                    <div class="post-image">
                        <a href="{{ route('resources.show', $resource->slug) }}">
                            @if($resource->featured_image)
                                <img src="{{ asset('storage/' . $resource->featured_image) }}" alt="{{ $resource->title }}">
                            @else
                                <img src="{{ asset('assets/img/blog/1.jpg') }}" alt="{{ $resource->title }}">
                            @endif
                        </a>
                    </div>

                    <div class="post-content">
                        <div class="post-meta">
                            <ul>
                                <li>By: <a href="#">{{ $resource->author }}</a></li>
                                <li>{{ $resource->published_at->format('F d, Y') }}</li>
                            </ul>
                        </div>

                        <h3><a href="{{ route('resources.show', $resource->slug) }}">{{ $resource->title }}</a></h3>
                        <p>{{ Str::limit($resource->summary, 100) }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-12">
                <div class="alert alert-info">
                    No resources available at this time. Please check back later.
                </div>
            </div>
            @endforelse

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    @if ($resources->hasPages())
                        @if ($resources->onFirstPage())
                            <span class="prev page-numbers"><i class="fas fa-angle-double-left"></i></span>
                        @else
                            <a href="{{ $resources->previousPageUrl() }}" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
                        @endif

                        @foreach ($resources->getUrlRange(1, $resources->lastPage()) as $page => $url)
                            @if ($page == $resources->currentPage())
                                <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($resources->hasMorePages())
                            <a href="{{ $resources->nextPageUrl() }}" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
                        @else
                            <span class="next page-numbers"><i class="fas fa-angle-double-right"></i></span>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
