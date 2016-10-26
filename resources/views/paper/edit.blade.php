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
						<a href="{!! route('paper.index')!!}"><button class="btn btn-success">All Paper</button></a>
                    </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">

									{!!Form::model($paper,['route' => ['paper.update',$paper->id], 'method' => 'put' ])!!}


									<div class="form-group">
										{!! Form::label('paper_type', 'Select Paper Type* :', array('class' => 'col-md-2 control-label')) !!}
										{!!Form::select('paper_type', $paperType, null,array('class' => 'select2', 'autofocus'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('paper_title', 'Title* :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('paper_title', null,array('class' => 'form-control','placeholder' =>  'Paper title here'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('paper_publish_date', 'Publishing Date * :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('paper_publish_date',null,array('class' => 'form-control','id'=>'datepicker','placeholder' =>  'Publishing Date here'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('paper_supervisor', 'Select Author Or Add New :', array('class' => 'control-label')) !!}<br/>
										{!!Form::select('paper_supervisor[]', $teacher, $x,array('class' => 'tag_list','multiple', 'autofocus'))!!}
									</div><br/>


									{{--<div class="form-group">--}}
										{{--{!! Form::label('paper_supervisor', 'Select Author* :', array('class' => 'col-md-2 control-label')) !!}--}}
										{{--{!!Form::select('paper_supervisor[]', $teacher, $x,array('class' => 'select2', 'multiple','autofocus'))!!}--}}
									{{--</div><br/>--}}

									{{--<div class="form-group">--}}
										{{--{!! Form::label('paper_author', 'Select Student* :', array('class' => 'col-md-2 control-label')) !!}--}}
										{{--{!!Form::select('paper_author[]', $students, $x,array('class' => 'select2','multiple', 'autofocus'))!!}--}}
									{{--</div><br/>--}}


									<div class="form-group">
										{!! Form::label('paper_url', 'Paper Url(optional) :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('paper_url', null,array('class' => 'form-control','placeholder' =>  'Paper title here'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('paper_details', 'Details(optional) :', array('class' => 'control-label')) !!}<br/>
										{!!Form::textarea('paper_details', null,array('class' => 'summernote form-control','placeholder' =>  '...................'))!!}
									</div><br/>

									{{--<div class="form-group">--}}
									{{--{!! Form::label('file', 'Choose Pdf/Doc File') !!}--}}
									{{--{!! Form::file('paper_pdf') !!}--}}
									{{--</div> <br>--}}



									<div class="form-group">
										{!! Form::submit('Update Paper', array('class' => 'btn btn-primary')) !!}
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
	{!! Html::style('assets/tagsinput/jquery.tagsinput.css') !!}
	{{--{!! Html::style('assets/select2/select2.css') !!}--}}
	{!! Html::style('assets/summernote/summernote.css') !!}
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@stop


@section('script')
	{!! Html::script('assets/timepicker/bootstrap-datepicker.js') !!}
	{!! Html::script('assets/tagsinput/jquery.tagsinput.min.js') !!}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	{{--{!! Html::script('assets/select2/select2.min.js') !!}--}}
	{!! Html::script('assets/summernote/summernote.min.js') !!}

	<script type="text/javascript">

		jQuery(document).ready(function() {

			$('.summernote').summernote({
				height: 200,                 // set editor height

				minHeight: null,             // set minimum height of editor
				maxHeight: null,             // set maximum height of editor

				focus: true                 // set focus to editable area after initializing summernote
			});
			// Tags Input
			jQuery('#tags').tagsInput({
				width:'auto',
				height: 40
			});

			jQuery('#datepicker').datepicker();

//			// Select2
//			jQuery(".select2").select2({
//				width: '100%'
//			});
//
//			jQuery(".tag_list").select2({
//				width: '100%'
//				//tags: true
//			});



		});


		$('.select2').select2({
			width: '100%',
			theme: "classic"

		});

		$('.tag_list').select2({
			tags:true,
			width: '100%',
			theme: "classic",
			placeholder: 'Select'

		});
	</script>



@stop










