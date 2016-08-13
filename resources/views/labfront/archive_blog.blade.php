@extends('labfront.layouts.master')
@section('content')

    <div id="k-body"><!-- content wrapper -->

        <div class="container"><!-- container -->

            <div class="row"><!-- row -->

                {{--<div id="k-top-search" class="col-lg-12 clearfix"><!-- top search -->--}}
                {{--<form action="#" id="top-searchform" method="get" role="search">--}}
                {{--<div class="input-group">--}}
                {{--<input type="text" name="s" id="sitesearch" class="form-control" autocomplete="off" placeholder="Type in keyword(s) then hit Enter on keyboard" />--}}
                {{--</div>--}}
                {{--</form>--}}
                {{--<div id="bt-toggle-search" class="search-icon text-center"><i class="s-open fa fa-search"></i><i class="s-close fa fa-times"></i></div><!-- toggle search button -->--}}
                {{--</div><!-- top search end -->--}}

                <div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

                    <ol class="breadcrumb">
                        <li><a href="{!! route('labfront.index') !!}">Home</a></li>
                        <li><a href="{!! route('labfront.blog') !!}">Blogs</a></li>
                        <li class="active">Archive</li>
                    </ol>

                </div><!-- breadcrumbs end -->

            </div><!-- row end -->





            <div class="row no-gutter"><!-- row -->

                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

                    <div class="col-padded"><!-- inner custom column -->

                        <div class="row gutter"><!-- row -->

                            @if(!empty($blog->count()))
                            {{--blog main content--}}
                            @foreach ($blog as $date => $posts)
                                <h1>{{ $date }}</h1>
                                @foreach ($posts as $post)

                                        <div class="news-body">

                                            <li><a href="{!! route('labfront.blog_details',$post->meta_data) !!} ">{{ $post->title }}</a></li>
                                        </div>


                                @endforeach
                            @endforeach
                            @else

                                    <div class="k-article-summary col-lg-12 col-md-12">
                                        <div class="news-body">
                                            <h1>Whoops, No Blog Post Found With this Tag or Keyword!!</h1>
                                            <h5>Some Bing Results For You....</h5>
                                            <iframe src="http://www.bing.com/search?q={!! $bing !!}" width="700" height="800"></iframe>
                                        </div>
                                    </div>

                            @endif


                            {{--blog main content--}}



                        </div><!-- row end -->

                    </div><!-- inner custom column end -->

                </div><!-- doc body wrapper end -->





                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->

                    <div class="col-padded col-shaded"><!-- inner custom column -->

                        <ul class="list-unstyled clear-margins"><!-- widgets -->


                            {{--search box--}}
                            <li class="widget-container widget_newsletter"><!-- widget -->

                                <h1 class="title-titan">Search For Blog</h1>
                                {!! Form::open(array('route' => 'search.action',  'files' => true) ) !!}
                                {!!Form::text('search_value','',array('class' => 'form-control','placeholder' => 'Search here' ))!!}
                                <span class="help-block">* Type and hit Enter.</span>
                                {!! Form::close() !!}

                            </li>
                            {{--search box--}}


                            <li class="widget-container widget_nav_menu"><!-- widget -->
                                {{--tags started--}}
                                <h1 class="title-widget">Tags</h1>

                                <div class="news-tags tagcloud">
                                    @foreach($tag as $new_tag)
                                        <a href="{!! route('labfront.tag',$new_tag->name) !!}" rel="tag">{!! $new_tag->name !!}</a>
                                    @endforeach
                                </div>
                                {{--tag section end--}}
                            </li>



                            <li class="widget-container widget_up_events"><!-- widget -->
                                <h1 class="title-widget">Popular Blogs</h1>
                                @foreach($recent as $new)
                                    <div class="media">
                                        <a class="pull-left" href="javascript:;">
                                            <img class=" " src="{!! asset($new->img_thumbnail) !!}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading"><a href="{!! route('labfront.blog_details',$new->meta_data) !!}">{!! \App\Blog::fullDate($new->id) !!} </a></h5>
                                            <p>
                                                {!! $new->title !!}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </li>







                            {{--<li class="widget-container widget_text"><!-- widget -->--}}

                            {{--<a href="#" class="custom-button cb-red" title="How to apply?">--}}
                            {{--<i class="custom-button-icon fa fa-empire"></i>--}}
                            {{--<span class="custom-button-wrap">--}}
                            {{--<span class="custom-button-title">Donate Now</span>--}}
                            {{--<span class="custom-button-tagline">Become a corporate sponsor of our schools!</span>--}}
                            {{--</span>--}}
                            {{--<em></em>--}}
                            {{--</a>--}}

                            {{--</li>--}}




                        </ul><!-- widgets end -->

                    </div><!-- inner custom column end -->

                </div><!-- sidebar wrapper end -->

            </div><!-- row end -->

        </div><!-- container end -->

    </div><!-- content wrapper end -->


@endsection