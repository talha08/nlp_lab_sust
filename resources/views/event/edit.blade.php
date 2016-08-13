@extends('layouts.default')
@section('content')



	<div class="wraper container-fluid">

		@include('includes.alert')

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">

					<div class="panel-heading">

						<h3 class="panel-title">{!!$title!!}</h3>

                    <span class="pull-right">

                    </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">

									{!!Form::model($event,['route' => ['event.update',$event->id], 'method' => 'put' ])!!}

									<div class="form-group">
										{!! Form::label('event_title', 'Title :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('event_title', null,array('class' => 'form-control','placeholder' =>  'Award title here'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('event_start', 'Start Date :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('event_start', null,array('class' => 'form-control','id'=>'datepicker','placeholder' =>  'Event Start Date here'))!!}
									</div><br/>



									<div class="form-group">
										{!! Form::label('event_end', 'End Date :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('event_end', null,array('class' => 'form-control', 'id'=>'datepicker2','placeholder' =>  'Event End Date here'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('event_time', 'Start Time :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('event_time', null,array('class' => 'form-control','id'=>'timepicker3','placeholder' =>  'Event Start Time here'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('event_details', 'Details :', array('class' => 'control-label')) !!}<br/>
										{!!Form::textarea('event_details', null,array('class' => 'summernote form-control','placeholder' =>  '...................'))!!}
									</div><br/>



									<div class="form-group">
										{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
									</div>



									{!! Form::close() !!}

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>





@stop

@section('style')

	{!! Html::style('assets/timepicker/bootstrap-datepicker.min.css') !!}
	{!! Html::style('assets/summernote/summernote.css') !!}
	{!! Html::style('assets/timepicker/bootstrap-timepicker.min.css') !!}


@stop


@section('script')


	{!! Html::script('assets/timepicker/bootstrap-timepicker.min.js') !!}
	{!! Html::script('assets/summernote/summernote.min.js') !!}
	{!! Html::script('assets/timepicker/bootstrap-datepicker.js') !!}




	<script type="text/javascript">

		jQuery(document).ready(function() {




			$('.summernote').summernote({
				height: 200,                 // set editor height

				minHeight: null,             // set minimum height of editor
				maxHeight: null,             // set maximum height of editor

				focus: true                 // set focus to editable area after initializing summernote
			});


			// Date Picker
			jQuery('#datepicker').datepicker();
			jQuery('#datepicker2').datepicker();

			// Time Picker
			jQuery('#timepicker3').timepicker({minuteStep: 15});


		});

	</script>

@stop











