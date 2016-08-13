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
						<a href="{!! route('welcome.edit')!!}"><button class="btn btn-success">Edit Welcome Note</button></a>
                    </span>
					</div>




					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel-body">

									<h3>{!! $welcome->welcome_title !!}</h3> <br/>
									<p>{!! $welcome->welcome_details !!}</p>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>





@stop












