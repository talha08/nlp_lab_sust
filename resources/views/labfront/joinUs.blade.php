@extends('labfront.layouts.master')
@section('content')
	<div id="k-body">
		<!-- content wrapper -->
		<div class="container">
			<!-- container -->
			{{--path to go--}}
			<div class="row">
				<!-- row -->
				<div class="k-breadcrumbs col-lg-12 clearfix">
					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="{!!  route('labfront.index') !!}">Home</a></li>
						<li class="active">Resource</li>
					</ol>
				</div>
				<!-- breadcrumbs end -->
			</div>
			<!-- row end -->
			{{--path to go--}}
			<div class="row no-gutter">
				<!-- row -->
				<div class="col-lg-12 col-md-12">
					<!-- doc body wrapper -->
					<div class="col-padded">
						<!-- inner custom column -->
						<div class="row gutter">
							<!-- row -->
							<div class="col-sm-offset-3 col-md-6 text-center">
								<h1>Why With Us?</h1>
								<hr/>
								<p>
									Our first Meetup we will discuss overview and goals of this group with potential hands on activity towards the end. Looking forward to seeing you there.
								</p>
								<br/>
								<a href="{!! route('user.create')!!}">
									<button class="btn btn-success btn-lg">
										Apply For Account
									</button>
								</a><br/><br/><br/>
								<p>If you Already a part of SUST CSE NLP Lab</p>
								<br/>
								<a href="{!! route('login')!!}">
									<button class="btn btn-danger btn-lg">
										Click for Login
									</button>
								</a><br/><br/><br/>
								<p>And Finally if you have any <b>Query</b> , feel free to contact with us.</p>
								<br/>
								<a href="{!! route('labfront.contact')!!}">
									<button class="btn btn-purple btn-lg">
										Contact
									</button>
								</a><br/><br/><br/>
							</div>
						</div>
						<!-- row end -->
					</div>
					<!-- inner custom column end -->
				</div>
				<!-- doc body wrapper end -->
			</div>
			<!-- row end -->
		</div>
		<!-- container end -->
	</div>
	<!-- content wrapper end -->
@endsection