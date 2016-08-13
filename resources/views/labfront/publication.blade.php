@extends('labfront.layouts.master')
@section('content')
	<div id="k-body"><!-- content wrapper -->

		<div class="container"><!-- container -->

			{{--path to go--}}
			<div class="row"><!-- row -->
				<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

					<ol class="breadcrumb">
						<li><a href="{!!  route('labfront.index') !!}">Home</a></li>
						<li class="active">Publication</li>
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


								@if(! empty($papers))
									@foreach($papers as $paper)
										<div class="up-event-wrapper"><!-- event summary -->

											<h1 class="title-median"><a href="{!! route('labfront.paper_single',$paper->paper_meta_data ) !!}" title="{!! $paper->paper_title !!}">{!! $paper->paper_title !!}</a></h1>

											<div class="up-event-meta clearfix">
												<div class="up-event-date">{!! $paper->paper_type !!}</div>
												<div class="up-event-date">{!! \App\Event::fullEndDate($paper->paper_publish_date) !!}</div>
											</div>

											<p>
												{!! Str::limit($paper->paper_details,200) !!}
												<a href="{!! route('labfront.paper_single',$paper->paper_meta_data ) !!}" class="moretag" title="read more">..MORE</a>
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
									{!! $papers->render() !!}
								</ul><!-- pagination end -->
							</div>

						</div><!-- row end -->

					</div><!-- inner custom column end -->

				</div><!-- doc body wrapper end -->





				<div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->

					<div class="col-padded col-shaded"><!-- inner custom column -->

						<ul class="list-unstyled clear-margins"><!-- widgets -->


							<li class="widget-container widget_up_events"><!-- widget -->

								<h1 class="title-widget">Search Publication</h1>

								<ul class="list-unstyled">


									{!! Form::open(array('route' => 'labfront.searchPublication') ) !!}
									<div class="form-group">
										{!!Form::text('paper_type', '',array('class' => 'form-control','id'=>'select2','placeholder' =>  'Paper Type'))!!}
									</div>

									<div class="form-group">
										{!!Form::text('paper_title', '',array('class' => 'form-control','placeholder' =>  'Paper Title'))!!}
									</div>

									<div class="form-group">
										{!!Form::text('paper_author', '',array('class' => 'form-control','placeholder' =>  'Paper Author Name'))!!}
									</div>



									<div class="form-group col-md-6">
										{!!Form::text('date_start', '',array('class' => 'form-control','id'=>'datepicker','placeholder' =>  'Start Date'))!!}
									</div>
									<div class="form-group col-md-6">
										{!!Form::text('date_end', '',array('class' => 'form-control','id'=>'datepicker2','placeholder' =>  'End Date'))!!}
									</div><br/>



									<div class="form-group">
										{!! Form::submit('Search', array('class' => 'btn btn-primary')) !!}
									</div>
									{!! Form::close() !!}


								</ul>

							</li>






						</ul><!-- widgets end -->

					</div><!-- inner custom column end -->

				</div><!-- sidebar wrapper end -->



			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- content wrapper end -->

@endsection


@section('style')

	{!! Html::style('assets/timepicker/bootstrap-datepicker.min.css') !!}
	{!! Html::style('assets/select2/select2.css') !!}


@stop


@section('script')

	{!! Html::script('assets/timepicker/bootstrap-datepicker.js') !!}
	{!! Html::script('assets/select2/select2.min.js') !!}


	<script type="text/javascript">

		jQuery(document).ready(function() {

			jQuery('#datepicker').datepicker();
			jQuery('#datepicker2').datepicker();

			// Select2
			jQuery(".select2").select2({
				width: '100%'
			});
		});

	</script>

@stop
