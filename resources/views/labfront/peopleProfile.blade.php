@extends('labfront.layouts.master')
@section('content')
	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			<div class="row"><!-- row -->


				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li><a href="#">People</a></li>
						<li class="active">{!! $title !!}- {!! $user->name !!}</li>
					</ol>

				</div><!-- breadcrumbs end -->

			</div><!-- row end -->

			<div class="row no-gutter"><!-- row -->




				<div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

					<div class="col-padded"><!-- inner custom column -->

						<div class="row gutter"><!-- row -->

							<div class="col-lg-12 col-md-12">

								<h1 class="page-title">{!! $title !!} || {!! $user->name !!}</h1><!-- category title -->

							</div>

						</div><!-- row end -->

    @if($user->is_teacher == 1)
						<div class="row gutter"><!-- row -->

							<div class="col-lg-12 col-md-12">


										<div class="leadership-wrapper"><!-- leadership single wrap -->

											 <figure class="leadership-photo">
												 <br/>
												<img src="{!! asset($user->teachers->img_url)!!}" height="150" width="150"  alt="{!! $user->name !!}" />
												 <br/><br/>
												 <b><p style="text-indent: 2em;">Teacher</p></b>


											</figure>
											<br/>




											{{--collapse start--}}
											<div class="col-sm-offset-3 "><!-- accordion -->
												<div id="accordion" class="panel-group">

													<div class="panel panel-default"><!-- accordion panel four -->
														<div class="panel-heading actives">
															<h4 class="panel-title actives">
																<a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																	Basic Information
																</a>
															</h4>
														</div>
														<div class="panel-collapse collapse in" id="collapseOne">
															<div class="panel-body">

																<p>{!! $user->teachers->position !!}</p>
																{!! $user->teachers->organization !!},<br/>
																Shahjalal University of Science and Technology, Sylhet.

															</div>
														</div>
													</div>

													<div class="panel panel-default"><!-- accordion panel four -->
														<div class="panel-heading">
															<h4 class="panel-title">
																<a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																	About Me
																</a>
															</h4>
														</div>
														<div class="panel-collapse collapse" id="collapseTwo">
															<div class="panel-body">
																<p>
																	{!! $user->teachers->about_me !!}
																</p>
															</div>
														</div>
													</div>


													<div class="panel panel-default"><!-- accordion panel two -->
														<div class="panel-heading">
															<h4 class="panel-title">
																<a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																	Contact
																</a>
															</h4>
														</div>
														<div class="panel-collapse collapse" id="collapseThree">
															<div class="panel-body">
															<b>Email: </b>{!! $user->teachers->email !!}<br/>
															<b>Phone :</b>{!! $user->teachers->phone !!}<br/>
															<b>Linked In: </b>{!! $user->teachers->linkedIn_user !!}<br/>
															<b>Github :</b>{!! $user->teachers->github_user !!}<br/>
														     </div>
														</div>
													</div>


													<div class="panel panel-default"><!-- accordion panel three -->
														<div class="panel-heading">
															<h4 class="panel-title">
																<a href="#collapseFour" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																	Projects
																</a>
															</h4>
														</div>
														<div class="panel-collapse collapse" id="collapseFour">
															<div class="panel-body">
																<p>
																	@foreach($projects as $pro)
																		<a href="{!!  route('labfront.project_single',App\Project::where('id',$pro->project_id)->pluck('project_meta_data') ) !!}" title="Click to view full profile...">
																			{!! App\Project::where('id',$pro->project_id)->pluck('project_title') !!}</a>
																		 <br/>
																	@endforeach
																</p>
															</div>
														</div>
													</div>



													<div class="panel panel-default"><!-- accordion panel four -->
														<div class="panel-heading">
															<h4 class="panel-title">
																<a href="#collapseFive" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																	Paper
																</a>
															</h4>
														</div>
														<div class="panel-collapse collapse" id="collapseFive">
															<div class="panel-body">
																<p>
																	@foreach($papers as $pro)
																		<a href="{!!  route('labfront.paper_single',App\Paper::where('id',$pro->paper_id)->pluck('paper_meta_data') ) !!}" title="Click to view full profile...">
																			{!! App\Paper::where('id',$pro->paper_id)->pluck('paper_title') !!} </a>
																		<br/>

																	@endforeach
																</p>
															</div>
														</div>
													</div>



												</div>
											</div><!-- row end -->
										</div><!-- leadership single wrap end -->
								{{--collapse end--}}


							</div>

						</div><!-- row end -->
				@else
							<div class="row gutter"><!-- row -->

								<div class="col-lg-12 col-md-12">


									<div class="leadership-wrapper"><!-- leadership single wrap -->

										<figure class="leadership-photo">
											<br/>
											<img src="{!! asset($user->students->img_url)!!}" height="150" width="150"  alt="{!! $user->name !!}" />
											<br/><br/>
											@if($user->is_teacher == 0)
												<b><p style="text-indent: 2em;">Student</p></b>
											@else
												<b><p style="text-indent: 2em;">Alumni</p></b>
											@endif


										</figure>
										<br/>




										{{--collapse start--}}
										<div class="col-sm-offset-3 "><!-- accordion -->
											<div id="accordion" class="panel-group">

												<div class="panel panel-default"><!-- accordion panel four -->
													<div class="panel-heading actives">
														<h4 class="panel-title actives">
															<a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																Basic Information
															</a>
														</h4>
													</div>
													<div class="panel-collapse collapse in" id="collapseOne">
														<div class="panel-body">
															@if($user->is_teacher == 2)
																<p>{!! $user->students->position !!} <b>(Alumni)</b> </p>
															@else
																<p>{!! $user->students->position !!} <b>(Running)</b> </p>
															@endif
															{!! $user->students->organization !!},<br/>
															Shahjalal University of Science and Technology, Sylhet.

														</div>
													</div>
												</div>

												<div class="panel panel-default"><!-- accordion panel four -->
													<div class="panel-heading">
														<h4 class="panel-title">
															<a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																About Me
															</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="collapseTwo">
														<div class="panel-body">
															<p>
																{!! $user->students->about_me !!}
															</p>
														</div>
													</div>
												</div>


												<div class="panel panel-default"><!-- accordion panel two -->
													<div class="panel-heading">
														<h4 class="panel-title">
															<a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																Contact
															</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="collapseThree">
														<div class="panel-body">
															<b>Email: </b>{!! $user->students->email !!}<br/>
															<b>Phone :</b>{!! $user->students->phone !!}<br/>
															<b>Linked In: </b>{!! $user->students->linkedIn_user !!}<br/>
															<b>Github :</b>{!! $user->students->github_user !!}<br/>
														</div>
													</div>
												</div>


												<div class="panel panel-default"><!-- accordion panel three -->
													<div class="panel-heading">
														<h4 class="panel-title">
															<a href="#collapseFour" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																Projects
															</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="collapseFour">
														<div class="panel-body">
															<p>
																@foreach($projects as $pro)
																	{!! App\Project::where('id',$pro->project_id)->pluck('project_title') !!} <br/>
																@endforeach
															</p>
														</div>
													</div>
												</div>



												<div class="panel panel-default"><!-- accordion panel four -->
													<div class="panel-heading">
														<h4 class="panel-title">
															<a href="#collapseFive" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
																Paper
															</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="collapseFive">
														<div class="panel-body">
															<p>
																@foreach($papers as $pro)
																	{!! App\Paper::where('id',$pro->paper_id)->pluck('paper_title') !!} <br/>
																@endforeach
															</p>
														</div>
													</div>
												</div>



											</div>
										</div><!-- row end -->
									</div><!-- leadership single wrap end -->
									{{--collapse end--}}


								</div>

							</div><!-- row end -->
				@endif


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
													<h4 class="title-median"><a href="{!! route('labfront.full_news') !!}" title="{!! Str::limit($newsList->news_title,15) !!}">
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


@section('style')
	<style>
		.leadership-wrapper { margin-top: 40px; }
		.leadership-photo { float: left; }
		.leadership-photo img { max-width: 140px; }
	</style>
@endsection

@section('script')
	 <script>
		 $('.panel-heading a').click(function() {
			 $('.panel-heading').removeClass('actives');
			 $(this).parents('.panel-heading').addClass('actives');

			 $('.panel-title').removeClass('actives'); //just to make a visual sense
			 $(this).parent().addClass('actives'); //just to make a visual sense

			// alert($(this).parents('.panel-heading').attr('class'));
		 });
	</script>
@endsection

