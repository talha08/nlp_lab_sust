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
						<a href="{!! route('book.index')!!}"><button class="btn btn-success">Resource List</button></a>
                    </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">

									{!! Form::open(array('route' => 'book.store',  'files' => true) ) !!}



									<div class="form-group">
										{!! Form::label('resource_type', 'Select Paper Type* :', array('class' => 'col-md-2 control-label')) !!}
										{!!Form::select('resource_type', $resourceType, '',array('class' => 'select2', 'autofocus'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('resource_name', 'Title* :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('resource_name', '',array('class' => 'form-control','placeholder' =>  'Resource title here'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('resource_author', 'Resource Author :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('resource_author[]', '',array('class' => 'tags','id'=>'tags','multiple', 'autofocus'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('resource_link1', 'Resource First Url :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('resource_link1', '',array('class' => 'form-control','placeholder' =>  'put resource url here...'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('resource_link12', 'Resource Second Url (optional):', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('resource_link2', '',array('class' => 'form-control','placeholder' =>  'put resource url here...'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('resource_link3', 'Resource Third Url (optional):', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('resource_link3', '',array('class' => 'form-control','placeholder' =>  'put resource url here...'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('resource_details', 'Details :', array('class' => 'control-label')) !!}<br/>
										{!!Form::textarea('resource_details', '',array('class' => 'summernote form-control','placeholder' =>  '...................'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('tags_list', 'Select Tag :', array('class' => 'control-label')) !!}<br/>
										{!!Form::select('tags_list[]', $tag_lists, '',array('class' => 'tag_list','multiple', 'autofocus'))!!}
									</div><br/>




									<h4><b>File & Image  Attachment: (Optional) </b></h4><br>

									<div class="form-group">
										{!! Form::label('resource_file_title', 'File Title* :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('resource_file_title', '',array('class' => 'form-control','placeholder' =>  'Resource file title here'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('file', 'File Upload :', array('class' => 'control-label')) !!}
										{!! Form::file('file[]', array('multiple'=>true)) !!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('image', 'Resource Image (if any):', array('class' => 'control-label')) !!}
										{!! Form::file('image') !!}
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
	{!! Html::style('assets/tagsinput/jquery.tagsinput.css') !!}
	<!-- {!! Html::style('assets/select2/select2.css') !!} -->
	{!! Html::style('assets/summernote/summernote.css') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> 
@stop


@section('script')
	{!! Html::script('assets/tagsinput/jquery.tagsinput.min.js') !!}
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"></script> 
	<!-- {!! Html::script('assets/select2/select2.min.js') !!} -->
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

			// Select2
			jQuery(".select2").select2({
				width: '100%'
			});

			jQuery(".tag_list").select2({
				width: '100%'
				//tags: true
			});



		});


		// $('.select2').select2({
		// 	width: '100%',
		// 	theme: "classic"

		// });

		// $('.tag_list').select2({
		// 	tags:true,
		// 	width: '100%',
		// 	theme: "classic",
		// 	placeholder: 'Choose Tag or Insert New'

		// });
	</script>



@stop











