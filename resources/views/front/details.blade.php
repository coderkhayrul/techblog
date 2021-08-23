@extends('front.layout.master')
@section('content')

<section id="entity_section" class="entity_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="entity_wrapper">
                    <div class="entity_title">
                        <h1>
                            <a href="{{ url('/details') }}/{{ $post->slug }}">{{ $post->title }}</a>
                        </h1>
                    </div>
                    <!-- entity_title -->
                    <div class="entity_meta">
                        <a href="#" target="_self">{{ date('F j-Y', strtotime($post->created_at)) }}</a>,
                        by:
                        <a href="{{ url('/author') }}/{{ $post->user->id }}">{{ $post->user->name }}</a>
                    </div>
                    <!-- entity_meta -->

                    <div class="entity_thumb">
                        <img class="img-responsive"  style="width:750px; height: 468px;" src="{{ asset('upload/post') }}/{{ $post->main_image }}"
                            alt="{{ $post->title }}">
                    </div>
                    <!-- entity_thumb -->

                    <div class="entity_content">
                        <p>
                            {{ $post->short_description }}
                        </p>

                        <p>
                            {!! $post->description !!}
                        </p>
                    </div>
                    <!-- entity_content -->

                    <div class="entity_footer">
                        <div class="entity_social">
                            <span><i class="fa fa-comments-o"></i>{{ count($post->comment) }} <a href="#">Comments</a> </span>
                        </div>
                        <!-- entity_social -->

                    </div>
                    <!-- entity_footer -->

                </div>
                <!-- entity_wrapper -->

                <div class="related_news">
                    <div class="entity_inner__title header_purple">
                        <h2><a href="#">Related News</a></h2>
                    </div>
                    <!-- entity_title -->

                    <div class="row">
                        @foreach ($related_news as $news)
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{ url('details') }}/{{ $news->slug }}"><img class="media-object"
                                            src="{{ asset('upload/post') }}/{{ $news->list_image }}" alt="{{ $news->title }}"></a>
                                </div>
                                <div class="media-body">
                                    <span class="tag purple"><a href="{{ url('/category') }}/{{ $news->category->id }}">{{ $news->category->name }}</a></span>

                                    <h3 class="media-heading">
                                        <a href="{{ url('details') }}/{{ $news->slug }}" >{{ $news->title }}</a></h3>
                                    <span class="media-date"><a href="#">{{ date('F j-Y', strtotime($news->created_at)) }}</a>
                                        , by: <a href="{{ url('/author') }}/ {{ $news->user->id }}">{{ $news->user->name }}</a></span>

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-comments-o"></i>{{ count($news->comment) }}</a> Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Related news -->

                <div class="readers_comment">
                    <div class="entity_inner__title header_purple">
                        <h2>Readers Comment</h2>
                    </div>
                    <!-- entity_title -->
                    @foreach ($post->comment as $comment)
                        @if ($comment->status == 1)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img style="width:64px; height: 64px;" alt="{{ $comment->name }}" class="media-object"
                                            data-src="{{ asset('upload/others/user.png') }}"
                                            src="{{ asset('upload/others/user.png') }}"
                                            data-holder-rendered="true">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h2 class="media-heading"><a href="#">{{ $comment->name }}</a></h2>
                                    {{ $comment->comment }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- media end -->
                </div>
                <!--Readers Comment-->

                <div class="widget_advertisement">
                    <img class="img-responsive" src="{{ asset('frontend') }}/assets/img/category_advertisement.jpg"
                        alt="feature-top">
                </div>
                <!--Advertisement-->

                <div class="entity_comments">
                    <div class="entity_inner__title header_black">
                        <h2>Add a Comment</h2>
                    </div>
                    <!--Entity Title -->

                    <div class="entity_comment_from">
                        {!! Form::open(['route' => 'comment', 'method' => 'post']) !!}
                        {!! Form::hidden('slug', $post->slug) !!}
                        {!! Form::hidden('post_id', $post->id) !!}
                            <div class="form-group">
                                {!! Form::text('name',null, ['class' => 'form-control mb-1', 'id' => 'name', 'placeholder' => 'Name']) !!}
                            </div>
                            <div class="form-group comment">
                                {!! Form::textarea('comment',null, ['class' => 'form-control mb-1', 'id' => 'comment', 'placeholder' => 'Comment']) !!}
                            </div>

                            <button type="submit" class="btn btn-submit red">Submit</button>
                        {!! Form::close() !!}
                    </div>
                    <!--Entity Comments From -->

                </div>
                <!--Entity Comments -->

            </div>
            <!--Left Section-->

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
            <!--Right Section-->

        </div>
        <!-- row -->

    </div>
    <!-- container -->
    @endsection
