@extends('labfront.layouts.master')
@section('content')
	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			{{--path to go--}}
			<div class="row"><!-- row -->
				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="{!!  route('labfront.index') !!}">Home</a></li>
						<li class="active">Award</li>
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


								@if(! empty($awards))
									@foreach($awards as $award)
										<div class="up-event-wrapper"><!-- event summary -->

											<h1 class="title-median"><a href="{!! route('labfront.award_single',$award->award_meta_data ) !!}" title="{!! $award->award_title !!}">{!! $award->award_title !!}</a></h1>

											<div class="up-event-meta clearfix">
												{{--<div class="up-event-time">Start - {!! \App\Project::fullDate($project->id,$project->created_at) !!}</div>--}}
												{{--@if($project->project_status ==0)--}}
												{{--<div class="up-event-time">End  - {!! \App\Project::fullDate($project->id,$project->updated_at) !!}</div>--}}
												{{--@endif--}}

												{{--<div class="up-event-date">--}}
												{{--@if($project->project_status ==1 )--}}
												{{--Running Project--}}
												{{--@else--}}
												{{--Complete Project--}}
												{{--@endif--}}
												{{--</div>--}}

											</div>

											<p>
												{!! Str::limit($award->award_details,200) !!}
												<a href="{!! route('labfront.award_single',$award->award_meta_data ) !!}" class="moretag" title="read more">..MORE</a>
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
									{!! $awards->render() !!}
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

	</div><!-- content wrapper end -->

@endsection