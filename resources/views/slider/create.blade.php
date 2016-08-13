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
						   <a href="{!! route('slider.index')!!}"><button class="btn btn-success">All Slide</button></a>
                        </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">

									{!! Form::open(array('route' => 'slider.store', 'files'=>true) ) !!}

									<div class="form-group">
										{!! Form::label('slider_title', 'Title :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('slider_title', '',array('class' => 'form-control','placeholder' =>  'Slider title here'))!!}
									</div><br/>
									<div class="form-group">
										{!! Form::label('slider_position', 'Select Position :', array('class' => 'col-md-2 control-label')) !!}
										{!!Form::select('slider_position', $position, '',array('class' => 'select2', 'autofocus'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('slider_desc', 'Short Description (within 2 or 3 sentence) :', array('class' => 'control-label')) !!}<br/>
										{!!Form::textarea('slider_desc', '',array('class' => 'summernote form-control','autofocus'))!!}
									</div><br/>


									<fieldset>
										<label>UPLOAD PICTURE:</label>
										<br/>
										<img class="preview" id="preview" alt=" " src="{!!asset('/upload/default/slider/upload.png')!!}">
										<br/>
										<br/>
										<input type="file" name="image" id="imgInp" onchange="loadFile(event);">
									</fieldset>



									<div class="form-group">
										{!! Form::submit('New Slider', array('class' => 'btn btn-primary')) !!}
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

	{{--{!! Html::style('css/photo_upload.css') !!}--}}
{!! Html::style('assets/summernote/summernote.css') !!}
			<!--Select Input-->
	{!! Html::style('assets/select2/select2.css') !!}

			<style>
				fieldset {
					border:0;
					margin-bottom:20px;
				}

				input {
					display:block;
				}

				img.preview {
					width:960px;
					height:400px;
					clear:both;
					margin:10px 0;
				}
			</style>

@stop


@section('script')

	{!! Html::script('assets/summernote/summernote.min.js') !!}
					<!--photo upload-->
	{!! Html::script('js/photo_upload.js') !!}

			<!--Select Input-->
	{!! Html::script('assets/select2/select2.min.js') !!}
	//for Datatable
	<script type="text/javascript">


		jQuery(document).ready(function() {

			$('.summernote').summernote({
				height: 200,                 // set editor height

				minHeight: null,             // set minimum height of editor
				maxHeight: null,             // set maximum height of editor

				focus: true                 // set focus to editable area after initializing summernote
			});


			// Select2
			jQuery(".select2").select2({
				width: '100%'
			});

		});

	</script>

@stop











