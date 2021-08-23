@extends('front.layout.master')

@section('content')

<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><a href="#">Mobile</a></li>
            </ol>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $key => $post)
                @if ($key === 0)
                    <div class="entity_wrapper">
                        <div class="entity_title header_purple">
                            <h1><a href="{{ url('/category') }}/{{ $post->category->id }}">{{ $post->category->name }}</a></h1>
                        </div>
                        <!-- entity_title -->

                        <div class="entity_thumb">
                            <img class="img-responsive" style="width:750px; height: 468px;" src="{{ asset('upload/post') }}/{{ $post->main_image}}"
                                alt="{{ $post->title }}">
                        </div>
                        <!-- entity_thumb -->

                        <div class="entity_title">
                            <a href="{{ url('/details') }}/{{ $post->slug }}" target="_blank">
                                <h3> {{ $post->title }}</h3>
                            </a>
                        </div>
                        <!-- entity_title -->

                        <div class="entity_meta">
                            <a href="#">{{ date('F j-Y', strtotime($post->created_at)) }}</a>, by: <a href="#">{{ $post->user->name }}</a>
                        </div>
                        <!-- entity_meta -->

                        <div class="entity_content">
                           {{ $post->short_description }}
                        </div>
                        <!-- entity_content -->

                        <div class="entity_social">
                            <span><i class="fa fa-comments-o"></i>{{ count($post->comment) }}<a href="#">Comments</a> </span>
                        </div>
                        <!-- entity_social -->

                    </div>
                <!-- entity_wrapper -->
                @else
                    @if ($key === 1)
                        <div class="row">
                    @endif
                        <div class="col-md-6">
                            <div class="category_article_body">
                                <div class="top_article_img">
                                    <img class="img-fluid" style="width:350px; height:186px" src="{{ asset('upload/post') }}/{{ $post->thumb_image}}"
                                        alt="{{ $post->title }}">
                                </div>
                                <!-- top_article_img -->

                                <div class="category_article_title">
                                    <h5><a href="{{ url('/details') }}/{{ $post->slug }}">{{ Str::limit($post->title, 50, $end='...') }}</a></h5>
                                </div>
                                <!-- category_article_title -->

                                <div class="article_date">
                                    <a href="#">{{ date('F j-Y', strtotime($post->created_at)) }}</a>, by: <a href="{{ url('author') }}/{{ $post->user->id }}">{{ $post->user->name }}</a>
                                </div>
                                <!-- article_date -->
                                <div class="category_article_content">
                                    {{ Str::limit($post->short_description, 50, $end='...') }}
                                </div>
                                <!-- category_article_content -->

                                <div class="article_social">
                                    <span><i class="fa fa-comments-o"></i><a href="#">{{ count($post->comment) }}</a> Comments</span>
                                </div>
                                <!-- article_social -->

                            </div>
                            <!-- category_article_body -->
                        </div>
                        <!-- col-md-6 -->
                    @if ($loop->last)
                        </div>
                    @endif
                @endif
                <!-- row -->
            @endforeach
            <div style="margin-left:40%">
                {{ $posts->links() }}
            </div>
        </div>
        <!-- col-md-8 -->

        <div class="col-md-4">
            <div class="widget">
                <div class="widget_title widget_black">
                    <h2><a href="#">Most Viewed</a></h2>
                </div>
                @foreach ($share_data['most_views'] as $item)
                <div class="media">
                    <div class="media-left">
                        <a href="{{ url('details') }}/{{ $item->slug }}"><img style="height: 75px;" class="media-object"
                                src="{{ asset('upload/post') }}/{{ $item->thumb_image }}" alt="{{ $item->title }}"></a>
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
         <!-- col-md-4-->
    </div>
    <!-- row -->
</div>
<!-- container -->
@endsection
