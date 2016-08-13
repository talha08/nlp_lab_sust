@extends('labfront.layouts.master')
@section('content')
	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			<div class="row"><!-- row -->
				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li><a href="#">People</a></li>
						<li class="active">{!! $title !!}</li>
					</ol>

				</div><!-- breadcrumbs end -->

			</div><!-- row end -->

			<div class="row no-gutter"><!-- row -->

				<div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

					<div class="col-padded"><!-- inner custom column -->

						<div class="row gutter"><!-- row -->

							<div class="col-lg-12 col-md-12">

								<h1 class="page-title">{!! $title !!}</h1><!-- category title -->

							</div>

						</div><!-- row end -->

						<div class="row gutter"><!-- row -->

							<div class="col-lg-12 col-md-12">

								@if(! empty($user))
									@foreach($user as $users)
										<div class="leadership-wrapper"><!-- leadership single wrap -->

											<figure class="leadership-photo">
												<a href="{!! route('labfront.peopleProfile',$users->id ) !!}">
													<img src="{!! asset($users->teachers->img_url)!!}" alt="{!! $users->name !!}" />
												</a>
											</figure>
											<div class="leadership-meta clearfix">

												<h4 class="title-median"><a href="{!!  route('labfront.peopleProfile',$users->id ) !!}" title="Click to view full profile...">
														{!! $users->name !!}<small>Teacher</small>
													</a></h4>

												<div class="leadership-position">Member Since {!! Carbon\Carbon::now()->diffForHumans($users->created_at) !!} </div>

												<p class="leadership-bio">
													{!! $users->teachers->position !!},<small> {!! $users->teachers->organization !!}</small> <br>
													<small>Shahjalal University of Science and Technology, Sylhet</small>
												</p><br/>

											</div>
										</div><!-- leadership single wrap end -->
									@endforeach
								@else
									<p> No Teacher Found in Database</p>
								@endif
							</div>

						</div><!-- row end -->


						{{--paginate--}}
						<div class="row gutter"><!-- row -->

							<div class="col-lg-12">

								<ul class="pagination pull-right"><!-- pagination -->
									{!!$user->render() !!}
								</ul><!-- pagination end -->

							</div>

						</div><!-- row end -->
						{{--paginate--}}



					</div><!-- inner custom column end -->


				</div><!-- doc body wrapper end -->






				<div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->

					<div class="col-padded col-shaded"><!-- inner custom column -->

						<ul class="list-unstyled clear-margins"><!-- widgets -->

							<li class="widget-container widget_nav_menu"><!-- widget -->

								<h1 class="title-widget">Useful links</h1>

								<ul>
									<li><a href="{!! route('labfront.archive_blog') !!}" title="menu item">Blog Archive</a></li>
									<li><a href="{!! route('labfront.news') !!}" title="menu item">All News</a></li>
									<li><a href="{!! route('labfront.events') !!}" title="menu item">Upcoming Events</a></li>
									<li><a href="{!! route('labfront.contact') !!}" title="menu item">Contact</a></li>
									<li><a href="{!! route('user.create') !!}" title="menu item">Apply for part of this Lab?</a></li>
								</ul>

							</li>



							<li class="widget-container widget_recent_news"><!-- widgets list -->

								<h1 class="title-widget">Lab News</h1>

								<ul class="list-unstyled">

									@foreach($news as $newsList)
										<li class="recent-news-wrap news-no-summary">
											<div class="recent-news-content clearfix">
												<figure class="recent-news-thumb">
													<a href="#" title="{!! Str::limit($newsList->news_title,15) !!}"><img src="{!! asset($newsList->news_image) !!}" width=100px" height="100px" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>
												</figure>
												<div class="recent-news-text">
													<div class="recent-news-meta">
														<div class="recent-news-date">{!! \App\News::fullDate($newsList->id) !!}</div>
													</div>
													<h4 class="title-median"><a href="{!! route('labfront.full_news',$newsList->news_meta_data) !!}" title="{!! Str::limit($newsList->news_title,15) !!}">
															{!! $newsList->news_title !!}
														</a></h4>
												</div>
											</div>
										</li>
									@endforeach

								</ul>

							</li><!-- widgets list end -->

							{{--<li class="widget-container widget_newsletter"><!-- widget -->--}}

							{{--<h1 class="title-titan">School Newsletter</h1>--}}

							{{--<form role="search" method="get" class="newsletter-form" action="#">--}}
							{{--<div class="input-group">--}}
							{{--<input type="text" placeholder="Your e-mail address" autocomplete="off" class="form-control newsletter-form-input" name="email" />--}}
							{{--<span class="input-group-btn"><button type="submit" class="btn btn-default">GO!</button></span>--}}
							{{--</div>--}}
							{{--<span class="help-block">* Enter your e-mail address to subscribe.</span>--}}
							{{--</form>--}}

							{{--</li>--}}


						</ul><!-- widgets end -->

					</div><!-- inner custom column end -->

				</div><!-- sidebar wrapper end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- content wrapper end -->
@endsection

