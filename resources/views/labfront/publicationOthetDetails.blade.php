@extends('labfront.layouts.master')
@section('content')


	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			<div class="row"><!-- row -->

				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="{!!  route('labfront.index') !!}">Home</a></li>
						<li class="active">{!! $resource->resource_name !!}</li>
					</ol>

				</div><!-- breadcrumbs end -->

			</div><!-- row end -->



			<div class="row no-gutter"><!-- row -->

				<div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

					<div class="col-padded"><!-- inner custom column -->

						<div class="row gutter"><!-- row -->

							<div class="col-lg-12 col-md-12">

								<div class="events-title-meta clearfix">
									<h1 class="page-title">{!! $resource->resource_name !!}</h1>

									<div class="up-event-meta clearfix">
										<div class="up-event-time">Added By - {!! $resource->user->name !!}</div>
										<div class="up-event-date">{!! $resource->resource_type !!}</div>
									</div>
								</div>


                              <b>Author:</b> <?php
								$myString = $resource->resource_author;
								$myArray = explode(',', $myString);
								//print_r($myArray[1]);
								for($i=0; $i<count($myArray);$i++){
									//echo $myArray[$i]."<br/>";
									//echo '<div class="tags"><a href="#" class="tag">'.$myArray[$i].'</a></div>';
									echo '<a class="tag">'.$myArray[$i].'</a>';
								}
								?>

								<br>Tags:
								@foreach($resource->tags as $user=> $value)

									<a href="{!!  route('labfront.publicationtag',$value->name ) !!}" title="Click to view ...">{{ $value->name }}</a>,&nbsp;
								@endforeach


								<div class="news-body clearfix">
									<p>{!! $resource->resource_details !!}</p><br/><br/>


									@if(!empty($resource->resource_link2))
									<br/><b>Paper Link-1: </b><p><a class="" href="{!!$resource->resource_link1!!}"  target="_blank" style="margin-right: 3px; color:teal;">{!!$resource->resource_link1!!}</a></p>
									@endif
									@if(!empty($resource->resource_link2))
									<br/><b>Paper Link-2: </b><p><a class="" href="{!!$resource->resource_link2!!}"  target="_blank" style="margin-right: 3px; color:teal;">{!!$resource->resource_link2!!}</a></p>
									@endif
									@if(!empty($resource->resource_link2))
									<br/><b>Paper Link-3: </b><p><a class="" href="{!!$resource->resource_link3!!}"  target="_blank" style="margin-right: 3px; color:teal;">{!!$resource->resource_link3!!}</a></p>
									@endif



									@if( $resource->resourceFile->count() != 0 && Auth::user())
									<br/><h3>Resource Attachment:</h3>
										@foreach($resource->resourceFile as $file)
											{!! $file->resource_file_title !!}
											<a class="btn btn-info btn-xs btn-archive" href="{!! $file->resource_file!!}" target="_blank">
												<i class="fa fa-download" aria-hidden="true"></i>
											</a><br><br/>
										@endforeach
									@endif




								</div><br/>

							</div>

						</div><!-- row end -->

					</div><!-- inner custom column end -->

				</div><!-- doc body wrapper end -->



				<div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->

					<div class="col-padded col-shaded"><!-- inner custom column -->

						<ul class="list-unstyled clear-margins"><!-- widgets -->



							<li class="widget-container widget_nav_menu"><!-- widget -->
								{{--tags started--}}
								<h1 class="title-widget">Publication Tags</h1>
								<div class="news-tags tagcloud">
									@foreach($tag as $new_tag)
										<a href="{!! route('labfront.publicationtag',$new_tag->name) !!}" rel="tag">{!! $new_tag->name !!}</a>
									@endforeach
								</div>
								{{--tag section end--}}
							</li>



							{{--<li class="widget-container widget_up_events"><!-- widget -->--}}
							{{--<h1 class="title-widget">Popular Blogs</h1>--}}
							{{--@foreach($recent as $new)--}}
							{{--<div class="media">--}}
							{{--<a class="pull-left" href="javascript:;">--}}
							{{--<img class=" " src="{!! asset($new->img_thumbnail) !!}" alt="">--}}
							{{--</a>--}}
							{{--<div class="media-body">--}}
							{{--<h5 class="media-heading"><a href="{!! route('labfront.blog_details',$new->meta_data) !!}">{!! \App\Blog::fullDate($new->id) !!} </a></h5>--}}
							{{--<p>--}}
							{{--{!! $new->title !!}--}}
							{{--</p>--}}
							{{--</div>--}}
							{{--</div>--}}
							{{--@endforeach--}}
							{{--</li>--}}




						</ul><!-- widgets end -->

					</div><!-- inner custom column end -->

				</div><!-- sidebar wrapper end -->











			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- content wrapper end -->
@endsection

@section('style')
	{!! Html::style('css/languageTag.css') !!}
@stop