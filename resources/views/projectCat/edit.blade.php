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
                           <a href="{!! route('projectCat.index') !!}"><button class="btn btn-success">Project Category List</button></a>
                    </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">



									{!!Form::model($projectCat,['route' => ['projectCat.update',$projectCat->id], 'method' => 'put' ])!!}


									<div class="form-group">
										{!! Form::label('cat_name', "Project Category Name:", array('class' => 'control-label')) !!}
										{!! Form::text('cat_name', null, array('class' => 'form-control', 'placeholder' => 'Enter project category name')) !!}
									</div><br/>

									<div class="form-group">
										{!! Form::label('cat_details', "Project Category Details:", array('class' => 'control-label')) !!}
										{!! Form::textarea('cat_details', null, array('class' => 'summernote form-control', 'placeholder' => 'Enter project category details')) !!}
									</div><br/>

									<div class="form-group">
										{!! Form::submit('Update Project Category', array('class' => 'btn btn-primary')) !!}
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

	{!! Html::style('assets/summernote/summernote.css') !!}
@endsection

@section('script')

	{!! Html::script('assets/summernote/summernote.min.js') !!}



	<script type="text/javascript">

		jQuery(document).ready(function() {




			$('.summernote').summernote({
				height: 200,                 // set editor height

				minHeight: null,             // set minimum height of editor
				maxHeight: null,             // set maximum height of editor

				focus: true                 // set focus to editable area after initializing summernote
			});


		});

	</script>

@endsection






