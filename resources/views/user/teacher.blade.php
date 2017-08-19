@extends('layouts.default')
@section('content')

<style>
    .ui-sortable-helper {
        display: table;
    }
</style>
	<div class="row">
		<div class="col-lg-12">
			@include('includes.alert')


			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">


						<div class="panel-heading">

							<h3 class="panel-title" style="margin: 10px" type="button" data-toggle="modal" data-target="#sortit">
								{!!$title!!}
								<button class="btn btn-primary pull-right">Change Order</button>
							</h3>


						</div>

						<div class="panel-body">

							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">

									<table class="table table-striped table-bordered" id="datatable">
										<thead>
										<tr>
											<th>id</th>
											<th>Name</th>
											<th>Email</th>
											<th>Member Since</th>
											<th>Delete</th>
										</tr>
										</thead>
										<tbody >
										@foreach ($user as $i=> $users)
											<tr>
												<td>{!! $users->rank !!}</td>
												<td><a style="color: teal;" href="{!!route('user.profile',$users->id)!!}"  >{!! $users->name !!}</a>
												<td>{!! $users->email !!}</td>
												<td>{!! \Carbon\Carbon::parse($users->created_at)->diffForHumans(\Carbon\Carbon::now()) !!}</td>
												<td><a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{!! $users->id!!}"><i class="ion-trash-a" aria-hidden="true"></i></a></td>
											</tr>
										@endforeach

										</tbody>
									</table>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
				</div>
				<div class="modal-body">
					Are you sure to delete?
				</div>
				<div class="modal-footer">
					{!! Form::open(array('route' => array('user.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
					<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
					{!! Form::submit('Yes, Delete', array('class' => 'btn btn-success')) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>



	<!-- Sortable Modal -->
	<div id="sortit" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Change Order</h4>
				</div>
				<div class="modal-body">
					<ul class='sortable list-group' style="list-style:none;">
						@foreach($user as $key=>$u)
							<li class="list-group-item" id="id_{{ $key }}">{!! $u->name !!}</li>
						@endforeach
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" id="update">Update</button>
				</div>
			</div>

		</div>
	</div>


@stop


@section('style')

	{!! Html::style('assets/datatables/jquery.dataTables.min.css') !!}

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


@stop

@section('script')

	{!! Html::script('assets/datatables/jquery.dataTables.min.js') !!}
	{!! Html::script('assets/datatables/dataTables.bootstrap.js') !!}

	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			/* do not add datatable method/function here , its always loaded from footer -- masiur */
			$(document).on("click", ".deleteBtn", function() {
				var deleteId = $(this).attr('deleteId');
				var url = "<?php echo URL::route('user.teacher'); ?>";
				$(".deleteForm").attr("action", url+'/'+deleteId);
			});

		});
	</script>



	{{--SCRIPT ONLY FOR THIS PAGE SORTABLE + DATATABLE--}}
	{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/sortable.js"></script>
	<script >
        $(document).ready(function () {
            sortableAndDatatable('{{csrf_token()}}')
        });
    </script>
	{{--SCRIPT ONLY FOR THIS PAGE--}}


@stop







