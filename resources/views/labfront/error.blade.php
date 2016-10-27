{{--* Created by PhpStorm.--}}
{{--* User: talha--}}
{{--* Date: 10/27/2016--}}
{{--* Time: 7:43 AM--}}


@extends('labfront.layouts.master')
@section('content')


	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			<div class="row"><!-- row -->



				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="{!!  route('labfront.index') !!}">Home</a></li>
						<li class="active">404 Error</li>
					</ol>

				</div><!-- breadcrumbs end -->

			</div><!-- row end -->

			<div class="row"><!-- row -->

				<div class="col-lg-12 col-md-12"><!-- doc body wrapper -->

					<div class="col-padded"><!-- inner custom column -->

						<h1 class="page-title text-center">404 Error</h1>

						<div class="news-body">

							<div class="row"><!-- row -->

								<div class="col-lg-12">
									<figure class="thumb-404">
										<img src="{!! asset('labfront/img/404_error_image.png') !!}" alt="Error Image" class="img-responsive aligncenter" />
									</figure>
								</div>

								<div class="col-lg-12">
									<h6 class="text-center">Ooops!</h6>
									<p class="text-center">
										What an embarrassing situation, requested page can not be found or it doesn't exist.<br />

									</p>
								</div>

							</div><!-- row end -->

						</div>

					</div><!-- inner custom column end -->

				</div><!-- doc body wrapper end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- content wrapper end -->
@endsection