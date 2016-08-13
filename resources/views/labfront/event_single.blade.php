@extends('labfront.layouts.master')
@section('content')


	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			<div class="row"><!-- row -->

				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="{!!  route('labfront.index') !!}">Home</a></li>
						<li><a href="{!!  route('labfront.events') !!}">Events</a></li>
						<li class="active">{!! $events->event_title !!}</li>
					</ol>

				</div><!-- breadcrumbs end -->

			</div><!-- row end -->

			<div class="row no-gutter"><!-- row -->

				<div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

					<div class="col-padded"><!-- inner custom column -->

						<div class="row gutter"><!-- row -->

							<div class="col-lg-12 col-md-12">

								<figure class="news-featured-image">
									<img src="{!! asset($events->event_image) !!}" width="720" height="300" alt="Featured image 4" class="img-responsive" />
								</figure>

								<div class="events-title-meta clearfix">
									<h1 class="page-title">{!! $events->event_title !!}</h1>
									<div class="event-meta">
										<span class="event-from">{!! \App\Event::fullDate($events->event_start) !!}</span>
										<span class="event-divider">to</span>
										<span class="event-to">{!! \App\Event::fullDate($events->event_end) !!}</span>
										<span class="event-time">Start at - {!! \App\Event::fullTime($events->event_time) !!}</span>
									</div>
								</div>



								<div class="news-body clearfix">
									<p>{!! $events->event_details !!}</p><br/>

									<b>Files: </b><br>
									{{--@if(!empty($events->eventFile))--}}
										@foreach($events->eventFile as $file)
											{!! $file->event_file_title !!}
											<a class="btn btn-info btn-xs btn-archive" href="{!! $file->event_file!!}" target="_blank">
												<i class="fa fa-download" aria-hidden="true"></i>
											</a><br><br/>
										@endforeach
									{{--@else--}}
										{{--<p>No File Found With This Event.</p>--}}
									{{--@endif--}}

								</div><br/>

							</div>

						</div><!-- row end -->

					</div><!-- inner custom column end -->

				</div><!-- doc body wrapper end -->

				<div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->

					<div class="col-padded col-shaded"><!-- inner custom column -->

						<ul class="list-unstyled clear-margins"><!-- widgets -->


							<li class="widget-container widget_recent_news"><!-- widgets list -->

								<h1 class="title-widget">Lab News</h1>

								<ul class="list-unstyled">


								<li class="widget-container widget_newsletter"><!-- widget -->

									<h1 class="title-titan">Lab Newsletter</h1>
									@include('includes.alert')
									<form role="search" method="post" class="newsletter-form" action="{!!route('subscriber.action')!!}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="input-group">
											<input type="text" placeholder="Your e-mail address" autocomplete="off" class="form-control newsletter-form-input" name="subscriber_email" />
											<span class="input-group-btn"><button type="submit" class="btn btn-default">GO!</button></span>
										</div>
										<span class="help-block">* Enter your e-mail address to subscribe.</span>
									</form>

									{{--@include('includes.alert')--}}
									{{--<div class="input-group">--}}
									{{--{!! Form::open(array('route' => 'subscriber.action') ) !!}--}}
									{{--{!!Form::text('subscriber_email','',array('class' => 'form-control newsletter-form-input','placeholder' => 'Your email here...' ))!!}--}}
									{{--<span class="input-group-btn"><button type="submit" class="btn btn-default">GO!</button></span>--}}
									{{--</div>--}}
									{{--<span class="help-block">* Enter your e-mail address to subscribe.</span>--}}
									{{--{!! Form::close() !!}--}}

								</li>


								     <br/><br/>
									<h1 class="title-widget">Lab Top Events</h1>
									@foreach($event as $eventList)
										<li class="recent-news-wrap news-no-summary">
											<div class="recent-news-content clearfix">
												<figure class="recent-news-thumb">
													<a href="{!! route('labfront.event_single',$eventList->event_meta_data) !!}" title="{!! Str::limit($eventList->event_title,15) !!}"><img src="{!! asset($eventList->event_image) !!}" width=100" height="100" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>
												</figure>
												<div class="recent-news-text">
													<div class="recent-news-meta">
														<div class="recent-news-date">{!! \App\News::fullDate($eventList->id) !!}</div>
													</div>
													<h4 class="title-median"><a href="{!! route('labfront.event_single',$eventList->event_meta_data) !!}" title="{!! Str::limit($eventList->event_title,15) !!}">
															{!! $eventList->event_title !!}
														</a></h4>
												</div>
											</div>
										</li>
									@endforeach



						</ul><!-- widgets end -->

					</div><!-- inner custom column end -->

				</div><!-- sidebar wrapper end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- content wrapper end -->
@endsection