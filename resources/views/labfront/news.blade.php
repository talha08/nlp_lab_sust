@extends('labfront.layouts.master')
@section('content')

	<div class="container"><!-- container -->




		{{--path to go--}}

		<div class="row"><!-- row -->


			<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

				<ol class="breadcrumb">
					<li><a href="{!! route('labfront.index') !!}">Home</a></li>
					<li class="active">News</li>
				</ol>

			</div><!-- breadcrumbs end -->

		</div><!-- row end -->

		{{--end of path to go--}}








		<div class="row no-gutter"><!-- row -->

			<div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

				<div class="col-padded"><!-- inner custom column -->

					<div class="row gutter"><!-- row -->

						<div class="col-lg-12 col-md-12">

							<h1 class="page-title">News</h1><!-- category title -->

							<div class="category-description"><!-- category description -->
								{{--some text here--}}
							</div>

						</div>

					</div><!-- row end -->



					<div class="row gutter k-equal-height"><!-- row -->


						@foreach($news as $newsList)
						<div class="news-mini-wrap col-lg-6 col-md-6"><!-- news mini-wrap -->

							<figure class="news-featured-image">
								<img src="{!! asset($newsList->news_image) !!}" alt="Featured image 1" class="img-responsive" />
							</figure>

							<div class="page-title-meta">
								<h1 class="page-title"><a href="{!! route('labfront.full_news',$newsList->news_meta_data ) !!}" title="{!! Str::limit($newsList->news_title, 30) !!}">{!! $newsList->news_title !!}</a></h1>
								<div class="news-meta">
									<span class="news-meta-date">{!! \App\News::fullDate($newsList->id) !!}</span>
									<span class="news-meta-category"><a href="{!! route('labfront.full_news',$newsList->news_meta_data ) !!}" title="News">News</a></span>
								</div>
							</div>

							<div class="news-summary">
								<p>
									{!! Str::limit($newsList->news_details, 200) !!} <a href="#" title="Read more" class="moretag">More</a>
								</p>
							</div>

						</div><!-- news mini-wrap end -->
						@endforeach








					</div><!-- row end -->


					<div class="row gutter"><!-- row -->

						<div class="col-lg-12">

							<ul class="pagination pull-right"><!-- pagination -->
								{!! $news->render() !!}
							</ul><!-- pagination end -->

						</div>

					</div><!-- row end -->

				</div><!-- inner custom column end -->

			</div><!-- doc body wrapper end -->





			<div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->

				<div class="col-padded col-shaded"><!-- inner custom column -->

					<ul class="list-unstyled clear-margins"><!-- widgets -->


						<li class="widget-container widget_up_events"><!-- widget -->

							<h1 class="title-widget">Upcoming Events</h1>

							<ul class="list-unstyled">


								@foreach($event as $events)
								<li class="up-event-wrap">

									<h1 class="title-median"><a href="{!! route('labfront.event_single',$events->event_meta_data ) !!}" title="{!! Str::limit($events->event_title,20) !!}">{!! Str::limit($events->event_title,20) !!}</a></h1>

									<div class="up-event-meta clearfix">
										<div class="up-event-date">{!! \App\Event::fullDate($events->event_start) !!}</div>
										<div class="up-event-time">{!! \App\Event::fullTime($events->event_time) !!}</div>
									</div>

									<p>
										{!! Str::limit($events->event_details,100) !!}
										 <a href="{!! route('labfront.event_single',$events->event_meta_data ) !!}" class="moretag" title="read more">MORE</a>
									</p>

								</li>
								@endforeach



							</ul>

						</li>


						<li class="widget-container widget_text"><!-- widget -->

							<a href="{!! route('user.create') !!}" class="custom-button cb-red" title="How to apply?">
								<i class="custom-button-icon fa fa-empire"></i>
                                    <span class="custom-button-wrap">
                                    	<span class="custom-button-title">Not a member?</span>
                                        <span class="custom-button-tagline">Become a member of our Lab!</span>
                                    </span>
								<em></em>
							</a>

						</li>



					</ul><!-- widgets end -->

				</div><!-- inner custom column end -->

			</div><!-- sidebar wrapper end -->

		</div><!-- row end -->

	</div><!-- container end -->



@endsection
