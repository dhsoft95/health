<!-- resources/views/resources/show.blade.php -->
@extends('Layouts.app')

@section('content')
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="blog-details-desc">
                    <div class="article-image">
                        @if($resource->featured_image)
                            <img src="{{ asset('storage/' . $resource->featured_image) }}" alt="{{ $resource->title }}">
                        @else
                            <img src="{{ asset('assets/img/blog/1.jpg') }}" alt="{{ $resource->title }}">
                        @endif
                    </div>

                    <div class="article-content">
                        <div class="entry-meta">
                            <ul>
                                <li><span>Posted On:</span> <a href="#">{{ $resource->published_at->format('F d, Y') }}</a></li>
                                <li><span>Posted By:</span> <a href="#">{{ $resource->author }}</a></li>
                            </ul>
                        </div>

                        <h3>{{ $resource->title }}</h3>

                        <p>{{ $resource->summary }}</p>

                        <div class="resource-content">
                            {!! $resource->content !!}
                        </div>
                    </div>

                    <div class="article-footer">
                        <div class="article-tags">
                            <span><i class="fas fa-bookmark"></i></span>
                            @foreach($resource->topics as $topic)
                                <a href="{{ route('resources.index', ['topic' => $topic->slug]) }}">{{ $topic->name }}</a>{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </div>

                        <div class="article-share">
                            <ul class="social">
                                <li><span>Share:</span></li>
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <aside class="widget-area">
                    <section class="widget widget_search">
                        <form class="search-form">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search...">
                            </label>
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </section>

                    <section class="widget widget_fovia_posts_thumb">
                        <h3 class="widget-title">Popular Resources</h3>

                        @php
                        $popularResources = \App\Models\Resource::where('is_published', true)
                            ->withCount('views')
                            ->orderByDesc('views_count')
                            ->limit(3)
                            ->get();
                        @endphp

                        @foreach($popularResources as $popularResource)
                        <article class="item">
                            <a href="{{ route('resources.show', $popularResource->slug) }}" class="thumb">
                                <span class="fullimage cover bg{{ $loop->iteration }}" role="img"></span>
                            </a>
                            <div class="info">
                                <time datetime="{{ $popularResource->published_at->format('Y-m-d') }}">{{ $popularResource->published_at->format('F d, Y') }}</time>
                                <h4 class="title usmall"><a href="{{ route('resources.show', $popularResource->slug) }}">{{ $popularResource->title }}</a></h4>
                            </div>

                            <div class="clear"></div>
                        </article>
                        @endforeach
                    </section>

                    <section class="widget widget_categories">
                        <h3 class="widget-title">Resource Types</h3>

                        <ul>
                            @foreach(\App\Models\ResourceType::withCount('resources')->get() as $type)
                            <li><a href="{{ route('resources.index', ['type' => $type->slug]) }}">{{ $type->name }}</a></li>
                            @endforeach
                        </ul>
                    </section>

                    <section class="widget widget_tag_cloud">
                        <h3 class="widget-title">Topics</h3>

                        <div class="tagcloud">
                            @foreach(\App\Models\Topic::withCount('resources')->take(10)->get() as $topic)
                            <a href="{{ route('resources.index', ['topic' => $topic->slug]) }}">{{ $topic->name }} <span class="tag-link-count"> ({{ $topic->resources_count }})</span></a>
                            @endforeach
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
