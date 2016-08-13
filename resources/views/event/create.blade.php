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

									{!! Form::open(array('route' => 'event.store',  'files' => true) ) !!}

									<div class="form-group">
										{!! Form::label('event_title', 'Title :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('event_title', '',array('class' => 'form-control','placeholder' =>  'Event title here'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('event_start', 'Start Date :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('event_start', '',array('class' => 'form-control','id'=>'datepicker','placeholder' =>  'Event Start Date here'))!!}
									</div><br/>



									<div class="form-group">
										{!! Form::label('event_end', 'End Date :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('event_end', '',array('class' => 'form-control', 'id'=>'datepicker2','placeholder' =>  'Event End Date here'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('event_time', 'Start Time :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('event_time', '',array('class' => 'form-control','id'=>'timepicker3','placeholder' =>  'Event Start Time here'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('event_details', 'Details :', array('class' => 'control-label')) !!}<br/>
										{!!Form::textarea('event_details', '',array('class' => 'summernote form-control','placeholder' =>  '...................'))!!}
									</div><br/>


									<fieldset>
										<label>UPLOAD EVENT BANNER:</label>
										<br/>
										<img class="preview" id="preview" alt=" " src="{!!asset('/upload/default/slider/upload.png')!!}">
										<br/>
										<br/>
										<input type="file" name="image" id="imgInp" onchange="loadFile(event);">
									</fieldset>

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

	<style>
		fieldset {
			border:0;
			margin-bottom:20px;
		}

		input {
			display:block;
		}

		img.preview {
			width:558px;
			height:221px;
			clear:both;
			margin:10px 0;
		}
	</style>


@stop


@section('script')


	{!! Html::script('assets/timepicker/bootstrap-timepicker.min.js') !!}
	{!! Html::script('assets/summernote/summernote.min.js') !!}
	{!! Html::script('assets/timepicker/bootstrap-datepicker.js') !!}

		<!--photo upload-->
	{!! Html::script('js/photo_upload.js') !!}


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











