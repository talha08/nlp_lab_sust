@extends('labfront.layouts.master')
@section('content')
	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			{{--path to go--}}
			<div class="row"><!-- row -->
				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="{!!  route('labfront.index') !!}">Home</a></li>
						<li class="active">Projects</li>
					</ol>

				</div><!-- breadcrumbs end -->

			</div><!-- row end -->
			{{--path to go--}}







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


								@if(! empty($projects))
									@foreach($projects as $project)
										<div class="up-event-wrapper"><!-- event summary -->

											<h1 class="title-median"><a href="{!! route('labfront.project_single',$project->project_meta_data ) !!}" title="{!! $project->project_title !!}">{!! $project->project_title !!}</a></h1>

											<div class="up-event-meta clearfix">
												<div class="up-event-time">Start - {!! \App\Project::fullDate($project->id) !!}</div>
												@if($project->project_status ==0)
												<div class="up-event-time">End  - {!! \App\Project::fullEndDate($project->id) !!}</div>
												@endif

												<div class="up-event-date">
													@if($project->project_status ==1 )
														Running Project
													@else
														Complete Project
													@endif
												</div>

											</div>

											<p>
												{!! Str::limit($project->project_details,200) !!}
												<a href="{!! route('labfront.project_single',$project->project_meta_data ) !!}" class="moretag" title="read more">..MORE</a>
											</p><br/>

										</div><!-- event summary end -->
									@endforeach
								@else
									<p>No Project Found on Database</p> <br/>
								@endif

							</div>

						</div><!-- row end -->



						<div class="row gutter"><!-- row -->

							<div class="col-lg-12">
								<ul class="pagination pull-right"><!-- pagination -->
									{!! $projects->render() !!}
								</ul><!-- pagination end -->
							</div>

						</div><!-- row end -->

					</div><!-- inner custom column end -->

				</div><!-- doc body wrapper end -->




				<div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->

					<div class="col-padded col-shaded"><!-- inner custom column -->

						<ul class="list-unstyled clear-margins"><!-- widgets -->


							<li class="widget-container widget_recent_news"><!-- widgets list -->



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




									<h1 class="title-widget">Lab News</h1>
									@foreach($news as $newsList)
										<li class="recent-news-wrap news-no-summary">
											<div class="recent-news-content clearfix">
												<figure class="recent-news-thumb">
													<a href="{!! route('labfront.full_news',$newsList->news_meta_data) !!}" title="{!! Str::limit($newsList->news_title,15) !!}"><img src="{!! asset($newsList->news_image) !!}" width=100" height="100" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>
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




						</ul><!-- widgets end -->

					</div><!-- inner custom column end -->

				</div><!-- sidebar wrapper end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- content wrapper end -->

@endsection