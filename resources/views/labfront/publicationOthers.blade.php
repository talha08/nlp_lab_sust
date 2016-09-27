@extends('labfront.layouts.master')
@section('content')

	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			<div class="row"><!-- row -->

				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="{!! route('labfront.index') !!}">Home</a></li>
						<li class="active">Publication</li>
					</ol>

				</div><!-- breadcrumbs end -->

			</div><!-- row end -->





			<div class="row no-gutter"><!-- row -->

				<div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

					<div class="col-padded"><!-- inner custom column -->

						<div class="row gutter"><!-- row -->


							{{--blog main content--}}
							@if(!empty($resources->count()))
								@foreach($resources as $resource)
									<div class="k-article-summary col-lg-12 col-md-12">


										<div class="news-title-meta">
											<h1 class="page-title"><a href="{!! route('labfront.publicationOthetDetails',$resource->resource_meta_data) !!}" title="{!! Str::limit($resource->resource_name,15 ) !!}">{!! $resource->resource_name !!}</a></h1>
											<div class="news-meta">

												<span class="news-meta-category"><a href="#" title="Author">Uploaded By -  {!! App\User::where('id',$resource->user_id)->pluck('name') !!}</a></span>
												{{--<span class="news-meta-comments"><a href="#" title="3 comments">654 comments</a></span>--}}
											</div>
										</div>



										<div class="news-body">

											<p>{!! \Str::limit($resource->resource_details,300) !!}</p><br>
											<a href="{!! route('labfront.publicationOthetDetails',$resource->resource_meta_data) !!} " class="btn btn-danger" >Continue Reading...</a>

										</div>

									</div>
								@endforeach
							@else
								@if(!empty($bing))
									<div class="k-article-summary col-lg-12 col-md-12">
										<div class="news-body">
											<h1>Whoops, No Publication Found With this Tag or Keyword!!</h1>
											<h5>Some Bing Results For You....</h5>
											<iframe src="http://www.bing.com/search?q={!! $bing !!}" width="700" height="800"></iframe>
										</div>
									</div>
								@else
									<div class="k-article-summary col-lg-12 col-md-12">
										<div class="news-body">
											<h1>Whoops, No Publication Found !!</h1>
										</div>
									</div>
								@endif
							@endif


							{{--blog main content--}}



						</div><!-- row end -->

						<div class="row gutter"><!-- row -->

							<div class="col-lg-12">

								<ul class="pagination pull-right"><!-- pagination -->
									{!!$resources->render()!!}
								</ul><!-- pagination end -->

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