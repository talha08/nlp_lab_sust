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
						<a href="{!! route('project.index')!!}"><button class="btn btn-success">All Project</button></a>
                    </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">


									{!!Form::model($projects,['route' => ['project.update',$projects->id], 'method' => 'put' ])!!}

									<div class="form-group">
										{!! Form::label('project_title', 'Title :', array('class' => 'control-label')) !!}<br/>
										{!! Form::text('project_title', null,array('class' => 'form-control','placeholder' =>  'Project title here'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('project_url', 'Project Url :', array('class' => 'control-label')) !!}<br/>
										{!! Form::text('project_url', null,array('class' => 'form-control','placeholder' =>  'put project url here...'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('project_supervisor', 'Select Supervisor :', array('class' => 'col-md-2 control-label')) !!}
										{!!Form::select('project_supervisor[]', $teacher, $x,array('class' => 'select2','multiple', 'autofocus'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('project_developer', 'Select Student :', array('class' => 'col-md-2 control-label')) !!}
										{!! Form::select('project_developer[]', $students, $x,array('class' => 'select2', 'multiple','autofocus'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('project_language', 'Input Uses Language (Type and hit Enter) :', array('class' => 'control-label')) !!}<br/>
										{!! Form::text('project_language[]',  null,array('class' => 'tags','id'=>'tags','multiple', 'autofocus'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('project_details', 'Details :', array('class' => 'control-label')) !!}<br/>
										{!! Form::textarea('project_details', null,array('class' => 'summernote form-control','placeholder' =>  '...................'))!!}
									</div><br/>

									{{--<div class="form-group">--}}
									{{--{!! Form::label('file', 'Choose Pdf/Doc File') !!}--}}
									{{--{!! Form::file('paper_pdf') !!}--}}
									{{--</div> <br>--}}



									<div class="form-group">
										{!! Form::submit('Submit Project', array('class' => 'btn btn-primary')) !!}
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

	{!! Html::style('assets/select2/select2.css') !!}
	{!! Html::style('assets/summernote/summernote.css') !!}
	{!! Html::style('assets/tagsinput/jquery.tagsinput.css') !!}

@stop


@section('script')


	{!! Html::script('assets/select2/select2.min.js') !!}
	{!! Html::script('assets/summernote/summernote.min.js') !!}
	{!! Html::script('assets/tagsinput/jquery.tagsinput.min.js') !!}

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

			// Tags Input
			jQuery('#tags').tagsInput({
				width:'auto',
				height: 40
			});

		});

	</script>

@stop











