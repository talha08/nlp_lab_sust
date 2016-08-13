@extends('labfront.layouts.master')
@section('content')
@include('labfront.includes.disqus_comment')

	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			<div class="row"><!-- row -->

				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="{!! route('labfront.index') !!}">Home</a></li>
						<li><a href="{!! route('labfront.blog') !!}">Blog</a></li>
						<li class="active">{!! Str::limit($blog->title,35 ) !!}</li>
					</ol>

				</div><!-- breadcrumbs end -->

			</div><!-- row end -->





			<div class="row no-gutter"><!-- row -->

				<div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

					<div class="col-padded"><!-- inner custom column -->

						<div class="row gutter"><!-- row -->


							{{--blog main content--}}
							@if(!empty($blog->count()))

									<div class="k-article-summary col-lg-12 col-md-12">

										<figure class="news-featured-image">
											<a href="#" title="{!! Str::limit($blog->title,15 ) !!}"><img src="{!! asset($blog->image) !!}"  width="720" height="300"  alt="Featured image 5" class="img-responsive" /></a>
										</figure>



										<div class="news-title-meta">
											<h1 class="page-title"><a href="#" title="{!! Str::limit($blog->title,15 ) !!}">{!! $blog->title !!}</a></h1>
											<div class="news-meta">
												<span class="news-meta-date">{!! \App\Blog::fullDate($blog->id) !!}</span>| By
												<span class="news-meta-category"><a href="#" title="Author"> {!! App\User::where('id',$blog->user_id)->pluck('name') !!}</a></span>
												{{--<span class="news-meta-comments"><a href="#" title="3 comments">654 comments</a></span>--}}
											</div>
										</div>



										<div class="news-body">

											<p>{!! $blog->details,300!!}</p><br>

										</div>

									</div>
							
							@else
								<div class="k-article-summary col-lg-12 col-md-12">
									<div class="news-body">
										<h1>Whoops, No Blog Post Found With this Tag or Keyword!!</h1>
										<h5>Some Bing Results For You....</h5>
									</div>
								</div>
							@endif


							{{--blog main content--}}



							{{--comment section--}}

							<div class="row gutter"><!-- row -->

								<div class="col-lg-12 col-md-12">

									<div id="comments"><!-- comments wrap -->

											<!-- Start Comments Section-->
											<div id="disqus_thread"></div>
											<!-- End Comments Section-->


									</div><!-- comments wrap end -->

								</div>
 							{{--comment section--}}



							</div><!-- row end -->

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
								<span class="help-block">* Type and press Enter.</span>
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

@section('script')
	<script type="text/javascript">
		/*
		 Get Disqus comment counts given an array of URLs
		 Considerations
		 --------------
		 + In most cases, you should use the default comment counting script
		 + This example will make client-side API calls, which on a busy site, will exhaust your 1000 requests/hour limit quickly.
		 Consider requesting comment counts server-side and caching the results.
		 + Make sure the domain you're hosting this page on has been added to your whitelisted domains in your application: http://disqus.com/api/applications/
		 Cases where you might use this
		 ------------------------------
		 1. When you're counting comments on an element other than a <a> tag
		 2. If you're counting comments from another Disqus shortname on a page where you're using the default comment counting script
		 */
		$(document).ready(function () {
			var disqusPublicKey = "658Pi7ZStcAN5fFHkKjpmx1Ac42urEjA4eNvElpEtKgHNL4xKoJs2O57zYnMOtY6";
			var disqusShortname = "sustcse";
			var urlArray = [];
			$('.count-comments').each(function () {
				var url = $(this).attr('data-disqus-url');
				urlArray.push('link:' + url);
			});
			$('#GetCountsButton').click(function () {
				$.ajax({
					type: 'GET',
					url: "https://disqus.com/api/3.0/threads/set.jsonp",
					data: { api_key: disqusPublicKey, forum : disqusShortname, thread : urlArray }, // URL method
					cache: false,
					dataType: "jsonp",
					success: function (result) {
						for (var i in result.response) {
							var countText = " comments";
							var count = result.response[i].posts;
							if (count == 1) countText = " comment";
							$('h4[data-disqus-url="' + result.response[i].link + '"]').html(count + countText);
						}
					}
				});
			});
		});
	</script>
@stop