@extends('front.layout.master')
@section('content')

<section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive top_static_article_img"
                            src="{{ asset('upload/post') }}/{{ $hot_news->main_image }}" alt="{{ $hot_news->title }}">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">Hot News</a></div>
                        <div class="feature_article_title">
                            <h1><a href="{{ url('details') }}/{{ $hot_news->slug }}"
                                    target="_self">{{ Str::limit($hot_news->title, 100, $end='...') }} </a></h1>
                        </div>
                        <!-- feature_article_title -->
                        <div class="feature_article_date">
                            <a href="#" target="_self">{{ $hot_news->user->name }}</a>,
                            <a href="#" target="_self">{{ date('F j,y', strtotime($hot_news->created_at)) }}</a>
                        </div>
                        <!-- feature_article_date -->
                        <div class="feature_article_content">
                            {{ $hot_news->short_description }}
                        </div>
                        <!-- feature_article_content -->
                        <div class="article_social">
                            <span><i class="fa fa-comments-o"></i><a
                                    href="#">{{ count($hot_news->comment) }}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_article_wrapper -->

            </div>
            <!-- col-md-7 -->
            @foreach ($top_view as $item)
            <div class="col-md-5">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive" style="width: 458px; height: 350px;"
                            src="{{ asset('upload/post') }}/{{ $item->main_image }}" alt="{{ $item->title }}">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="category.html">Top Viewed</a></div>
                        <div class="feature_article_title">
                            <h1><a
                                    href="{{ url('/details') }}/{{ $item->slug }}">{{ Str::limit($item->title, 50, $end='...') }}</a>
                            </h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date">
                            <a href="#" target="_self">{{ $item->user->name }}</a>,
                            <a href="#" target="_self">{{ date('F j,y', strtotime($item->created_at)) }}</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {{ Str::limit($item->short_description, 50, $end='...') }}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-comments-o"></i><a
                                    href="#">{{ count($item->comment) }}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
            <!-- col-md-5 -->
            @endforeach
        </div>
        <!-- Row -->

    </div>
    <!-- container -->

</section>
<!-- Feature News Section -->

<section id="category_section" class="category_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="category_section mobile">
                    <div class="article_title header_purple">
                        <h2><a href="category.html" target="_self">Mobile</a></h2>
                    </div>
                    <!----article_title------>
                    @foreach ($category_posts as $key => $category)
                        @foreach ($category->posts as $key => $item)
                            @if ($key === 0)
                                <div class="category_article_wrapper">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="top_article_img">
                                                <a href="single.html" target="_self">
                                                    <img class="img-responsive"
                                                        src="{{ asset('upload/post') }}/{{ $item->thumb_image }}" alt="{{ $item->title }}"
                                                        alt="feature-top">
                                                </a>
                                            </div>
                                            <!----top_article_img------>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="tag purple">Mobile</span>

                                            <div class="category_article_title">
                                                <h2>
                                                    <a href="{{ url('/details') }}/{{ $item->slug }}" target="_self">{{ $item->title }}</a>
                                                </h2>
                                            </div>
                                            <!----category_article_title------>
                                            <div class="category_article_date"><a href="#">{{ date('F j,y', strtotime($item->created_at)) }}</a>, by: <a href="#">{{ $item->user->name }}</a></div>
                                            <!----category_article_date------>
                                            <div class="category_article_content">
                                                {{ $item->short_description }}
                                            </div>
                                            <!----category_article_content------>
                                            <div class="media_social">
                                                <span><i class="fa fa-comments-o"></i><a href="#">{{ count($item->comment) }}</a> Comments</span>
                                            </div>
                                            <!----media_social------>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if ($key === 1)
                                    <div class="category_article_wrapper">
                                        <div class="row">
                                @endif
                                            <div class="col-md-6">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#"><img class="media-object"
                                                                src="{{ asset('frontend') }}/assets/img/cat-mobi-sm1.jpg"
                                                                alt="Generic placeholder image"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="tag purple">Mobile</span>

                                                        <h3 class="media-heading"><a href="single.html" target="_self">Apple launches
                                                                photo-centric
                                                                wrist watch for Android</a></h3>
                                                        <span class="media-date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric
                                                                joan</a></span>

                                                        <div class="media_social">
                                                            <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                                            <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#"><img class="media-object"
                                                                src="{{ asset('frontend') }}/assets/img/cat-mobi-sm3.jpg"
                                                                alt="Generic placeholder image"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="tag purple">Mobile</span>

                                                        <h3 class="media-heading"><a href="single.html" target="_self">The Portable
                                                                Charger or data
                                                                cable</a></h3>
                                                        <span class="media-date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric
                                                                joan</a></span>

                                                        <div class="media_social">
                                                            <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                                            <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                @if ($loop->last)
                                    </div>
                                </div>
                                @endif
                            @endif
                        @endforeach
                        <p class="divider"><a href="{{ url('/category') }}/{{ $category->id }}">More News&nbsp;&raquo;</a></p>
                    @endforeach
                </div>
                <!-- Mobile News Section -->

                <div class="category_section tablet">
                    <div class="article_title header_pink">
                        <h2><a href="category.html" target="_self">Tablet Pc</a></h2>
                    </div>
                    <!-- Mobile News Section -->

                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="category_article_body">
                                    <div class="top_article_img">
                                        <a href="single.html" target="_self"><img class="img-responsive"
                                                src="{{ asset('frontend') }}/assets/img/tab_top1.jpg" alt="feature-top">
                                        </a>
                                    </div>
                                    <!-- top_article_img -->

                                    <span class="tag pink"><a href="category.html" target="_self">Tablet</a></span>

                                    <div class="category_article_title">
                                        <h2><a href="single.html" target="_self">Sony launce a new Android tablets for
                                                new
                                                generation </a></h2>
                                    </div>
                                    <!-- category_article_title -->

                                    <div class="article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
                                    </div>
                                    <!----article_date------>
                                    <!-- article_date -->

                                    <div class="category_article_content">
                                        Collaboratively administrate empowered markets via plug-and-play networks.
                                        Dynamically
                                        procrastinate B2C users after.
                                    </div>
                                    <!-- category_article_content -->

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                        <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                    </div>
                                    <!-- media_social -->

                                </div>
                                <!-- category_article_body -->

                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6">
                                <div class="category_article_body">
                                    <div class="top_article_img">
                                        <a href="single.html" target="_self">
                                            <img class="img-responsive"
                                                src="{{ asset('frontend') }}/assets/img/tab_top2.jpg" alt="feature-top">
                                        </a>
                                    </div>
                                    <!-- top_article_img -->

                                    <span class="tag pink"><a href="category.html" target="_self">Tablet</a></span>

                                    <div class="category_article_title">
                                        <h2><a href="single.html" target="_self">Technology market see the new Android
                                                tablets </a>
                                        </h2>
                                    </div>
                                    <!-- category_article_title -->

                                    <div class="article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
                                    </div>
                                    <!----article_date------>
                                    <!-- article_date -->

                                    <div class="category_article_content">
                                        Collaboratively administrate empowered markets via plug-and-play networks.
                                        Dynamically
                                        procrastinate B2C users after.
                                    </div>
                                    <!-- category_article_content -->

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                        <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                    </div>
                                    <!-- media_social -->

                                </div>
                                <!-- category_article_body -->

                            </div>
                            <!-- col-md-6 -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- category_article_wrapper -->

                    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
                </div>
                <!-- Tablet News Section -->

                <div class="category_section gadget">
                    <div class="article_title header_black">
                        <h2><a href="category.html" target="_self">Gadgets</a></h2>
                    </div>
                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="category_article_body">
                                    <div class="top_article_img">
                                        <a href="single.html" target="_self">
                                            <img class="img-responsive"
                                                src="{{ asset('frontend') }}/assets/img/gad_top1.jpg" alt="feature-top">
                                        </a>
                                    </div>
                                    <!-- top_article_img -->

                                    <span class="tag black"><a href="category.html" target="_self">Gadgets</a></span>

                                    <div class="category_article_title">
                                        <h2><a href="single.html" target="_self">A good news for gadget users Ds tech
                                                comming soon</a>
                                        </h2>
                                    </div>
                                    <!-- category_article_title -->

                                    <div class="article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
                                    </div>
                                    <!----article_date------>
                                    <div class="category_article_content">
                                        Collaboratively administrate empowered markets via plug-and-play networks.
                                        Dynamically
                                        procrastinate B2C users after.
                                    </div>
                                    <!-- category_article_content -->

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                        <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                    </div>
                                    <!-- media_social -->

                                </div>
                                <!-- category_article_body -->

                                <div class="category_article_list">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object"
                                                    src="{{ asset('frontend') }}/assets/img/cat-mobi-sm1.jpg"
                                                    alt="Generic placeholder image"></a>
                                        </div>
                                        <div class="media-body">
                                            <h3 class="media-heading"><a href="single.html" target="_self">Apple
                                                    launches photo-centric
                                                    wrist watch for Android</a></h3>
                                            <span class="media-date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric
                                                    joan</a></span>

                                            <div class="media_social">
                                                <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                                <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object"
                                                    src="{{ asset('frontend') }}/assets/img/cat-mobi-sm3.jpg"
                                                    alt="Generic placeholder image"></a>
                                        </div>
                                        <div class="media-body">
                                            <h3 class="media-heading"><a href="single.html" target="_self">Apple
                                                    launches photo-centric
                                                    wrist watch for Android</a></h3>
                                            <span class="media-date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric
                                                    joan</a></span>

                                            <div class="media_social">
                                                <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                                <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- category_article_list -->

                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6">
                                <div class="category_article_body">
                                    <div class="top_article_img">
                                        <img class="img-responsive"
                                            src="{{ asset('frontend') }}/assets/img/gad_top2.jpg" alt="feature-top">
                                    </div>
                                    <!-- top_article_img -->

                                    <span class="tag black">Gadgets</span>

                                    <div class="category_article_title">
                                        <h2><a href="single.html" target="_self">Apple launches photo-centric app for
                                                iPads and Android
                                                tablets</a></h2>
                                    </div>
                                    <!-- category_article_title -->

                                    <div class="article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
                                    </div>
                                    <!-- article_date -->

                                    <div class="category_article_content">
                                        Collaboratively administrate empowered markets via plug-and-play networks.
                                        Dynamically
                                        procrastinate B2C users after installed base benefits. Dramatically visualize
                                        customer directed
                                        convergence without revolutionary ROI.
                                    </div>
                                    <!-- category_article_content -->

                                    <div class="article_social">
                                        <span><i class="fa fa-share-alt"></i><a href="#">424</a>Shares</span>
                                        <span><i class="fa fa-comments-o"></i><a href="#">4</a>Comments</span>
                                    </div>
                                    <!-- article_social -->

                                </div>
                                <!-- category_article_body -->
                            </div>
                        </div>
                        <!-- row -->

                    </div>
                    <!-- category_article_wrapper -->

                    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
                </div>
                <!-- Gadget News Section -->

                <div class="category_section camera">
                    <div class="article_title header_orange">
                        <h2><a href="category.html" target="_self">Camera</a></h2>
                    </div>
                    <!-- article_title -->

                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="top_article_img">
                                    <a href="single.html" target="_self">
                                        <img class="img-responsive"
                                            src="{{ asset('frontend') }}/assets/img/cam_left1.jpg" alt="feature-top">
                                    </a>
                                </div>
                                <!-- top_article_img -->

                            </div>
                            <div class="col-md-7">
                                <span class="tag orange">Camera</span>

                                <div class="category_article_title">
                                    <h2><a href="single.html" target="_self">Yasaki camera launches new generic hi-speed
                                        </a></h2>
                                </div>
                                <!-- category_article_title -->

                                <div class="article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
                                </div>
                                <!----article_date------>
                                <!-- category_article_wrapper -->

                                <div class="category_article_content">
                                    Collaboratively administrate empowered markets via plug-and-play networks.
                                    Dynamically
                                    procrastinate.
                                </div>
                                <!-- category_article_content -->

                                <div class="media_social">
                                    <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                    <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                </div>
                                <!-- media_social -->

                            </div>
                            <!-- col-md-7 -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- category_article_wrapper -->

                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="top_article_img">
                                    <a href="single.html" target="_self">
                                        <img class="img-responsive"
                                            src="{{ asset('frontend') }}/assets/img/cam_left2.jpg" alt="feature-top">
                                    </a>
                                </div>
                                <!-- top_article_img -->

                            </div>
                            <div class="col-md-7">
                                <span class="tag orange">Camera</span>

                                <div class="category_article_title">
                                    <h2><a href="single.html" target="_self">DSLR is the most old camera at this time
                                        </a></h2>
                                </div>
                                <!-- category_article_title -->

                                <div class="article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
                                </div>
                                <!----article_date------>
                                <!-- article_date -->

                                <div class="category_article_content">
                                    Collaboratively administrate empowered markets via plug-and-play networks.
                                    Dynamically
                                    procrastinate.
                                </div>
                                <!-- category_article_content -->

                                <div class="media_social">
                                    <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                    <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                </div>
                                <!-- media_social -->

                            </div>
                        </div>
                    </div>
                    <!-- category_article_wrapper -->

                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="top_article_img">
                                    <a href="single.html" target="_self">
                                        <img class="img-responsive"
                                            src="{{ asset('frontend') }}/assets/img/cam_left3.jpg" alt="feature-top">
                                    </a>
                                </div>
                                <!-- media_social -->

                            </div>
                            <div class="col-md-7">
                                <span class="tag orange"><a href="single.html" target="_self">Camera</a></span>

                                <div class="category_article_title">
                                    <h2><a href="single.html" target="_self">Canon Camera launches photo centric
                                            Android</a></h2>
                                </div>
                                <!-- category_article_title -->

                                <div class="article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
                                </div>
                                <!----article_date------>
                                <!-- article_date -->

                                <div class="category_article_content">
                                    Collaboratively administrate empowered markets via plug-and-play networks.
                                    Dynamically
                                    procrastinate.
                                </div>
                                <!-- category_article_content -->

                                <div class="media_social">
                                    <span>
                                        <a href="#">
                                            <i class="fa fa-share-alt"></i>424
                                        </a> Shares
                                    </span>
                                    <span>
                                        <a href="#">
                                            <i class="fa fa-comments-o"></i>4
                                        </a> Comments
                                    </span>
                                </div>
                                <!-- media_social -->

                            </div>
                            <!-- col-md-7 -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- category_article_wrapper -->

                    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
                </div>
                <!-- Camera News Section -->

                <div class="category_section design">
                    <div class="article_title header_blue">
                        <h2><a href="category.html" target="_self">Design</a></h2>
                    </div>
                    <!-- row -->

                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="category_article_body">
                                    <div class="top_article_img">
                                        <a href="single.html" target="_self">
                                            <img class="img-responsive"
                                                src="{{ asset('frontend') }}/assets/img/design_top1.jpg"
                                                alt="feature-top">
                                        </a>
                                    </div>
                                    <!-- top_article_img -->

                                    <span class="tag blue"><a href="category.html" target="_self">Design</a></span>

                                    <div class="category_article_title">
                                        <h2><a href="single.html" target="_self">Marketing Tranportation Fast and </a>
                                        </h2>
                                    </div>
                                    <!-- category_article_title -->

                                    <div class="category_article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric
                                            joan</a></div>
                                    <!----category_article_date------>
                                    <!-- category_article_date -->

                                    <div class="category_article_content">
                                        Collaboratively administrate empowered markets via plug-and-play networks.
                                    </div>
                                    <!-- category_article_content -->

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                        <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                    </div>
                                    <!-- media_social -->

                                </div>
                                <!-- category_article_body -->

                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6">
                                <div class="category_article_body">
                                    <div class="top_article_img">
                                        <a href="single.html" target="_self">
                                            <img class="img-responsive"
                                                src="{{ asset('frontend') }}/assets/img/design_top2.jpg"
                                                alt="feature-top">
                                        </a>
                                    </div>
                                    <!-- top_article_img -->

                                    <span class="tag blue"><a href="category.html" target="_self">Design</a></span>

                                    <div class="category_article_title">
                                        <h2><a href="single.html" target="_self">Theme Hippo launches Unship </a></h2>
                                    </div>
                                    <!-- category_article_title -->

                                    <div class="category_article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric
                                            joan</a></div>
                                    <!----category_article_date------>
                                    <!-- category_article_date -->

                                    <div class="category_article_content">
                                        Collaboratively administrate empowered markets via plug-and-play networks.
                                    </div>
                                    <!-- category_article_content -->

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                        <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                    </div>
                                    <!-- media_social -->

                                </div>
                                <!-- category_article_body -->

                            </div>
                            <!-- col-md-6 -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- category_article_wrapper -->

                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="category_article_body">
                                    <div class="top_article_img">
                                        <a href="single.html" target="_self">
                                            <img class="img-responsive"
                                                src="{{ asset('frontend') }}/assets/img/design_top3.jpg"
                                                alt="feature-top">
                                        </a>
                                    </div>
                                    <!-- top_article_img -->

                                    <span class="tag blue"><a href="category.html" target="_self">Design</a></span>

                                    <div class="category_article_title">
                                        <h2><a href="single.html" target="_self">Huge Ultimate website builder </a></h2>
                                    </div>
                                    <!-- category_article_title -->

                                    <div class="category_article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric
                                            joan</a></div>
                                    <!----category_article_date------>
                                    <!-- category_article_date -->

                                    <div class="category_article_content">
                                        Collaboratively administrate empowered markets via plug-and-play networks.
                                    </div>
                                    <!-- category_article_content -->

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                        <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                    </div>
                                    <!-- media_social -->

                                </div>
                                <!-- category_article_body -->

                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6">
                                <div class="category_article_body">
                                    <div class="top_article_img">
                                        <img class="img-responsive"
                                            src="{{ asset('frontend') }}/assets/img/design_top4.jpg" alt="feature-top">
                                    </div>
                                    <!-- top_article_img -->

                                    <span class="tag blue"><a href="category.html" target="_self">Design</a></span>

                                    <div class="category_article_title">
                                        <h2><a href="single.html" target="_self">Just another theme xdesign</a></h2>
                                    </div>
                                    <!-- category_article_title -->

                                    <div class="category_article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric
                                            joan</a></div>
                                    <!-- category_article_date -->

                                    <div class="category_article_content">
                                        Collaboratively administrate empowered markets via plug-and-play networks.
                                    </div>
                                    <!-- category_article_content -->

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                        <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                                    </div>
                                    <!-- media_social -->

                                </div>
                                <!-- category_article_body -->

                            </div>
                            <!-- top_article_img -->

                        </div>
                        <!-- top_article_img -->

                    </div>
                    <!-- top_article_img -->

                    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
                </div>
                <!-- Design News Section -->
            </div>
            <!-- Left Section -->

            <div class="col-md-4">
                <div class="widget">
                    <div class="widget_title widget_black">
                        <h2><a href="#">Most Viewed</a></h2>
                    </div>
                    @foreach ($share_data['most_views'] as $item)
                    <div class="media">
                        <div class="media-left">
                            <a href="{{ url('details') }}/{{ $item->slug }}"><img style="height: 75px;"
                                    class="media-object" src="{{ asset('upload/post') }}/{{ $item->thumb_image }}"
                                    alt="{{ $item->title }}"></a>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="{{ url('details') }}/{{ $item->slug }}" target="_self">{{ $item->title }}</a>
                            </h3> <span class="media-date"><a href="#">
                                    {{Carbon\Carbon::parse($item->created_at)->format('j F - Y'); }} </a>, by: <a
                                    href="{{ url('/author') }}/{{ $item->user->id }}">{{ $item->user->name }}</a></span>

                            <div class="widget_article_social">
                                <span>
                                    <a href="single.html" target="_self"> <i class="fa fa-share-alt"></i>424</a> Shares
                                </span>
                                <span>
                                    <a href="single.html" target="_self"><i
                                            class="fa fa-comments-o"></i>{{ count($item->comment) }}</a> Comments
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
                </div>
                <!-- Popular News -->

                <div class="widget hidden-xs m30">
                    <img class="img-responsive adv_img" src="{{ asset('frontend') }}/assets/img/right_add1.jpg"
                        alt="add_one">
                    <img class="img-responsive adv_img" src="{{ asset('frontend') }}/assets/img/right_add2.jpg"
                        alt="add_one">
                    <img class="img-responsive adv_img" src="{{ asset('frontend') }}/assets/img/right_add3.jpg"
                        alt="add_one">
                    <img class="img-responsive adv_img" src="{{ asset('frontend') }}/assets/img/right_add4.jpg"
                        alt="add_one">
                </div>
                <!-- Advertisement -->

                <div class="widget hidden-xs m30">
                    <img class="img-responsive widget_img" src="{{ asset('frontend') }}/assets/img/right_add5.jpg"
                        alt="add_one">
                </div>
                <!-- Advertisement -->

                <div class="widget hidden-xs m30">
                    <img class="img-responsive widget_img" src="{{ asset('frontend') }}/assets/img/right_add6.jpg"
                        alt="add_one">
                </div>
                <!-- Advertisement -->

                <div class="widget m30">
                    <div class="widget_title widget_black">
                        <h2><a href="#">Most Commented</a></h2>
                    </div>
                    @foreach ($share_data['most_comments'] as $item)
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img style="height: 75px;" class="media-object"
                                    src="{{ asset('upload/post') }}/{{ $item->thumb_image }}"
                                    alt="Generic placeholder image"></a>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="{{ url('details') }}/{{ $item->slug }}" target="_self">{{ $item->title }}</a>
                            </h3>

                            <div class="media_social">
                                <span><i class="fa fa-comments-o"></i><a href="#">{{ $item->comment_count }}</a>
                                    Comments</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&nbsp;&raquo; </a></p>
                </div>
                <!-- Most Commented News -->

            </div>
            <!-- Right Section -->

        </div>
        <!-- Row -->

    </div>
    <!-- Container -->
</section>
<!-- Category News Section -->

@endsection
