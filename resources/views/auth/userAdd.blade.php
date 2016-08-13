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
						   {{--<a href="{!! route('news.index')!!}"><button class="btn btn-success">All News</button></a>--}}
                        </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">


								{!! Form::open(array('route' => 'auth.userStore', 'method' => 'post', 'class' => 'form-signin')) !!}


									<div class="form-group">
										{!! Form::label('name', 'Complete Name :', array('class' => 'col-md-4 control-label')) !!}<br/>
										{!! Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Input complete name...', 'autofocus')) !!}
									</div><br>

									<div class="form-group">
										{!! Form::label('email', 'Email :', array('class' => 'col-md-4 control-label')) !!}<br/>
										{!! Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address...', 'autofocus')) !!}
									</div><br>

									<div class="form-group">
										{!!  Form::label('type', 'Select User Type :', array()) !!}<br/>
										{!!  Form::radio('type', '0')  !!} Student &nbsp;&nbsp;
										{!!  Form::radio('type', '1')  !!} Teacher &nbsp;&nbsp;
										{!!  Form::radio('type', '2')  !!} Visiting Scholar &nbsp;&nbsp;
										{!!  Form::radio('type', '3')  !!} Industry Affiliates
									</div><br>

									<div class="form-group">
										{!! Form::submit('Add User', array('class' => 'btn btn-primary')) !!}
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


@endsection


@section('style')

			<!--Select Input-->
	{!! Html::style('assets/select2/select2.css') !!}
@stop

@section('script')

{!! Html::script('assets/select2/select2.min.js') !!}


	<script type="text/javascript">

		jQuery(document).ready(function() {

			// Select2
			jQuery(".select2").select2({
				width: '100%'
			});

		});

	</script>

@stop
