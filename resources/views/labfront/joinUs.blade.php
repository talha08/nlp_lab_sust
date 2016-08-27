@extends('labfront.layouts.master')
@section('content')
	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			{{--path to go--}}
			<div class="row"><!-- row -->
				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="{!!  route('labfront.index') !!}">Home</a></li>
						<li class="active">Resource</li>
					</ol>

				</div><!-- breadcrumbs end -->

			</div><!-- row end -->
			{{--path to go--}}







			<div class="row no-gutter"><!-- row -->
				<div class="col-lg-12 col-md-12"><!-- doc body wrapper -->
					<div class="col-padded"><!-- inner custom column -->
						<div class="row gutter"><!-- row -->
								<div class="col-sm-offset-3 col-md-6 text-center">
									<h1>Why With Us?</h1>
									<hr/>
									<p>
										For example, a lot's happened since Moz was founded in 2004,
										so they chose to share those milestones using a timeline.
										They did a great job by using a fun and clean design, clear headers,
										concise blurbs, and little graphics to break up the text. We love how humbly
										they preface the timeline, too, with a thank you to their community:
										"We owe a huge thanks to our community for joining us on this awesome
										journey, and we hope that you’ll continue to be a part of our story."
									</p>

									<br/>

									<a href="{!! route('user.create')!!}">
										<button class="btn btn-success btn-lg">
											Apply For Account
										</button>
									</a><br/><br/><br/>

									<p>If you Already a part of SUST CSE NLP Lab</p><br/>

									<a href="{!! route('login')!!}">
										<button class="btn btn-danger btn-lg">
											Click for Login
										</button>
									</a><br/><br/><br/>

									<p>And Finally if you have any <b>Query</b> , feel free to contact with us.</p><br/>

									<a href="{!! route('labfront.contact')!!}">
										<button class="btn btn-purple btn-lg">
											Contact
										</button>
									</a><br/><br/><br/>



								</div>
						</div><!-- row end -->
					</div><!-- inner custom column end -->
				</div><!-- doc body wrapper end -->






				<!-- right Panel -->

				{{--<div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->--}}

				{{--<div class="col-padded col-shaded"><!-- inner custom column -->--}}

				{{--<ul class="list-unstyled clear-margins"><!-- widgets -->--}}


				{{--<li class="widget-container widget_recent_news"><!-- widgets list -->--}}



				{{--<ul class="list-unstyled">--}}


				{{--<li class="widget-container widget_newsletter"><!-- widget -->--}}

				{{--<h1 class="title-titan">Lab Newsletter</h1>--}}
				{{--@include('includes.alert')--}}
				{{--<form role="search" method="post" class="newsletter-form" action="{!!route('subscriber.action')!!}">--}}
				{{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
				{{--<div class="input-group">--}}
				{{--<input type="text" placeholder="Your e-mail address" autocomplete="off" class="form-control newsletter-form-input" name="subscriber_email" />--}}
				{{--<span class="input-group-btn"><button type="submit" class="btn btn-default">GO!</button></span>--}}
				{{--</div>--}}
				{{--<span class="help-block">* Enter your e-mail address to subscribe.</span>--}}
				{{--</form>--}}

				{{--@include('includes.alert')--}}
				{{--<div class="input-group">--}}
				{{--{!! Form::open(array('route' => 'subscriber.action') ) !!}--}}
				{{--{!!Form::text('subscriber_email','',array('class' => 'form-control newsletter-form-input','placeholder' => 'Your email here...' ))!!}--}}
				{{--<span class="input-group-btn"><button type="submit" class="btn btn-default">GO!</button></span>--}}
				{{--</div>--}}
				{{--<span class="help-block">* Enter your e-mail address to subscribe.</span>--}}
				{{--{!! Form::close() !!}--}}

				{{--</li>--}}

				{{--<br/><br/>--}}




				{{--<h1 class="title-widget">Lab News</h1>--}}
				{{--@foreach($news as $newsList)--}}
				{{--<li class="recent-news-wrap news-no-summary">--}}
				{{--<div class="recent-news-content clearfix">--}}
				{{--<figure class="recent-news-thumb">--}}
				{{--<a href="{!! route('labfront.full_news',$newsList->news_meta_data) !!}" title="{!! Str::limit($newsList->news_title,15) !!}"><img src="{!! asset($newsList->news_image) !!}" width=100" height="100" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>--}}
				{{--</figure>--}}
				{{--<div class="recent-news-text">--}}
				{{--<div class="recent-news-meta">--}}
				{{--<div class="recent-news-date">{!! \App\News::fullDate($newsList->id) !!}</div>--}}
				{{--</div>--}}
				{{--<h4 class="title-median"><a href="{!! route('labfront.full_news',$newsList->news_meta_data) !!}" title="{!! Str::limit($newsList->news_title,15) !!}">--}}
				{{--{!! $newsList->news_title !!}--}}
				{{--</a></h4>--}}
				{{--</div>--}}
				{{--</div>--}}
				{{--</li>--}}
				{{--@endforeach--}}


				{{--</ul>--}}

				{{--</li><!-- widgets list end -->--}}
				{{----}}

				{{--</ul><!-- widgets end -->--}}

				{{--</div><!-- inner custom column end -->--}}

				{{--</div><!-- sidebar wrapper end -->--}}






			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- content wrapper end -->

@endsection