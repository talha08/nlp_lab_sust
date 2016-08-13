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
						<a href="{!! route('welcome.index')!!}"><button class="btn btn-success">View Welcome Note</button></a>
                    </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">

									{!!Form::model($welcome,['route' => ['welcome.update'], 'method' => 'put' ])!!}

									<div class="form-group">
										{!! Form::label('welcome_title', 'Welcome Title* :', array('class' => 'control-label')) !!}<br/>
										{!!Form::text('welcome_title', null,array('class' => 'form-control'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::label('welcome_details', 'Welcome Details :', array('class' => 'control-label')) !!}<br/>
										{!!Form::textarea('welcome_details', null,array('class' => 'summernote form-control'))!!}
									</div><br/>


									<div class="form-group">
										{!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
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

@stop


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

@stop











