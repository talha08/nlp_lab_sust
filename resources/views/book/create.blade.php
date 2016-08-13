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
						<a href="{!! route('book.index')!!}"><button class="btn btn-success">All Books</button></a>
                    </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">

									{!! Form::open(array('route' => 'book.store',  'files' => true) ) !!}

									<div class="form-group">
										{!! Form::label('book_name', 'Title* :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('book_name', '',array('class' => 'form-control','placeholder' =>  'Project title here'))!!}
									</div><br/>



									<div class="form-group">
										{!! Form::label('book_link1', 'Book First Url :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('book_link1', '',array('class' => 'form-control','placeholder' =>  'put book url here...'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('book_link12', 'Book Second Url (optional):', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('book_link2', '',array('class' => 'form-control','placeholder' =>  'put book url here...'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('book_link3', 'Book Third Url (optional):', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('book_link3', '',array('class' => 'form-control','placeholder' =>  'put book url here...'))!!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('book_details', 'Details :', array('class' => 'control-label')) !!}<br/>
										{!!Form::textarea('book_details', '',array('class' => 'summernote form-control','placeholder' =>  '...................'))!!}
									</div><br/>




									<div class="form-group">
										{!! Form::submit('Submit Paper', array('class' => 'btn btn-primary')) !!}
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

@stop


@section('script')


	{!! Html::script('assets/select2/select2.min.js') !!}
	{!! Html::script('assets/summernote/summernote.min.js') !!}

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











