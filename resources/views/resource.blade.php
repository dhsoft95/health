@extends('Layouts.app')
@section('content')
    <section class="page-title-area page-title-bg2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Mental Health Resources</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Resources</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Resource Details Area -->
    <section class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                            <img src="/api/placeholder/800/400" alt="Mental Health Resource">
                        </div>

                        <div class="article-content">
                            <div class="entry-meta">
                                <ul>
                                    <li><span>Category:</span> <a href="#">Guides</a></li>
                                    <li><span>Published:</span> <a href="#">September 2024</a></li>
                                </ul>
                            </div>

                            <!-- Example content structure -->
                            <h3>[Resource Title]</h3>
                            <p>[Introduction and Overview]</p>

                            <blockquote class="wp-block-quote">
                                <p>[Key Takeaway or Important Quote]</p>
                                <cite>Mental Health Professional</cite>
                            </blockquote>

                            <h3>Key Points:</h3>
                            <ul class="features-list">
                                <li><i class="flaticon-check-mark"></i> [Point 1]</li>
                                <li><i class="flaticon-check-mark"></i> [Point 2]</li>
                                <li><i class="flaticon-check-mark"></i> [Point 3]</li>
                                <li><i class="flaticon-check-mark"></i> [Point 4]</li>
                            </ul>

                            <div class="article-footer">
                                <div class="article-tags">
                                    <span><i class="fas fa-bookmark"></i></span>
                                    <a href="#">Mental Health</a>,
                                    <a href="#">Wellness</a>,
                                    <a href="#">Self-Care</a>
                                </div>

                                <div class="article-share">
                                    <ul class="social">
                                        <li><span>Share:</span></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <section class="widget widget_search">
                            <form class="search-form">
                                <label>
                                    <span class="screen-reader-text">Search resources:</span>
                                    <input type="search" class="search-field" placeholder="Search resources...">
                                </label>
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </section>

                        <!-- Resource Categories -->
                        <section class="widget widget_categories">
                            <h3 class="widget-title">Resource Types</h3>
                            <ul>
                                <li><a href="#">Guides</a></li>
                                <li><a href="#">eBooks</a></li>
                                <li><a href="#">Articles</a></li>
                                <li><a href="#">Case Studies</a></li>
                            </ul>
                        </section>

                        <!-- Popular Resources -->
                        <section class="widget widget_fovia_posts_thumb">
                            <h3 class="widget-title">Popular Resources</h3>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall"><a href="#">Understanding Anxiety: A Comprehensive Guide</a></h4>
                                    <span>Guide</span>
                                </div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg2" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall"><a href="#">Depression Management Techniques</a></h4>
                                    <span>eBook</span>
                                </div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg3" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall"><a href="#">Stress Relief Strategies for Modern Life</a></h4>
                                    <span>Article</span>
                                </div>
                            </article>
                        </section>

                        <!-- Topics -->
                        <section class="widget widget_tag_cloud">
                            <h3 class="widget-title">Topics</h3>
                            <div class="tagcloud">
                                <a href="#">Anxiety</a>
                                <a href="#">Depression</a>
                                <a href="#">Stress Management</a>
                                <a href="#">Self-Care</a>
                                <a href="#">Relationships</a>
                                <a href="#">Work-Life Balance</a>
                                <a href="#">Mental Wellness</a>
                                <a href="#">Personal Growth</a>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
