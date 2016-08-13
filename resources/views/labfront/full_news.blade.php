@extends('labfront.layouts.master')
@section('content')
@include('labfront.includes.disqus_comment')

<div id="k-body"><!-- content wrapper -->
	<div class="container"><!-- container -->




		<div class="row"><!-- row -->


			<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

				<ol class="breadcrumb">
					<li><a href="{!! route('labfront.index') !!}">Home</a></li>
					<li><a href="{!! route('labfront.news') !!}">News</a></li>
					<li class="active">{!! Str::limit($news->news_title ,40) !!}</li>
				</ol>

			</div><!-- breadcrumbs end -->

		</div><!-- row end -->





		<div class="row no-gutter"><!-- row -->

			<div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

				<div class="col-padded"><!-- inner custom column -->

					<div class="row gutter"><!-- row -->

						<div class="col-lg-12 col-md-12">

							<figure class="news-featured-image">
								<img src="{!! asset($news->news_image) !!}" width="720" height="300" alt="Featured image 4" class="img-responsive" />
							</figure>

							<div class="news-title-meta">
								<h1 class="page-title">{!! $news->news_title !!}</h1>
								<div class="news-meta">
									<span class="news-meta-date">{!! \App\News::fullDate($news->id) !!}</span>
									<span class="news-meta-category"><a href="#" title="News">News</a></span>

								</div>
							</div>

							<div class="news-body">
								<p>
								    {!! $news->news_details !!}
								</p>



							</div>

							{{--<div class="news-tags tagcloud">--}}
								{{--<a href="#" rel="tag">#Boston University</a>--}}
								{{--<a href="#" rel="tag">#Megan Boyle</a>--}}
								{{--<a href="#" rel="tag">#Aliquam</a>--}}
								{{--<a href="#" rel="tag">#Competition</a>--}}
							{{--</div>--}}

						</div>

					</div><!-- row end -->


					<div class="row row-splitter">

				    </div>




					<div class="row gutter"><!-- row -->

						<div class="col-lg-12 col-md-12">

							<div id="comments"><!-- comments wrap -->

								<ol class="commentlist"><!-- comments list -->
									<!-- Start Comments Section-->
									<div id="disqus_thread"></div>
									<!-- End Comments Section-->
								</ol><!-- comments list end -->

							</div><!-- comments wrap end -->

						</div>

					</div><!-- row end -->

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

						<li class="widget-container widget_up_events"><!-- widget -->

							<h1 class="title-widget">Recent News</h1>

							<ul class="list-unstyled">


								@foreach($recent as $newsList)

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

						</li>



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