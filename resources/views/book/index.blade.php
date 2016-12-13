@extends('layouts.default')
@section('content')

	<div class="row">
		<div class="col-lg-12">
			@include('includes.alert')


			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">


						<div class="panel-heading">

							<h3 class="panel-title">{!!$title!!}</h3>

                                        <span class="pull-right">
                                               <a href="{!! route('book.create')!!}"><button class="btn btn-success">Add New Resource</button></a>
                                        </span>
						</div><br>



						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">

									<table class="table table-striped table-bordered" id="datatable">
										<thead>

										<tr>
											<th>id</th>
											<th>Resource Name</th>
											<th>Resource Type</th>
											<th>Added By</th>
											<th>Actions</th>

										</tr>

										</thead>
										<tbody>
										@foreach ($resources as $resource)
											<tr>
												<td>{!! $resource->id !!}</td>

												<td> <a data-toggle="modal" style="color: teal;" data-target="#myModal_{{$resource->id}}" >{!!Str::limit($resource->resource_name,50) !!}</a></td>
												{{--<td>{!!Str::limit(strip_tags($book->book_details),30) !!}</td>--}}
												<td>{!! $resource->resource_type !!}</td>
												<td>{!! $resource->user->name !!}</td>
												@if(Auth::user()->id == $resource->user->id)
												<td>
													<a class="btn btn-warning btn-xs btn-archive Editbtn" href="{!!route('book.edit',$resource->id)!!}"  style="margin-right: 3px;"><i class="ion-compose" aria-hidden="true"></i></a>
													<a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{!! $resource->id!!}"><i class="ion-trash-a" aria-hidden="true"></i></a>
												</td>
												@else
													<td>--</td>
												@endif
											</tr>

											<!-- Modal -->
											<div id="myModal_{{$resource->id}}" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content" >
														<center>
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">
																	{{--<img class="" src="" alt="" align="left">--}}
																	<br/><br/>
																	{{ $resource->resource_name}}
																</h4>
															</div>
															<div class="modal-body" >


																<p>{!! strip_tags($resource->resource_details) !!}</p>

                                                                 
																<br><br>

                                                                 @if($resource->resource_link1 != null)
                                                               		<h1>  File:: </h1><br>
																	<h4><b>Link - 1: </b><a class="" href="{!!$resource->resource_link1!!}"  target="_blank" style="margin-right: 3px; color:teal;">{!!$resource->resource_link1!!}</a></p><br/>
																 @endif
																  @if($resource->resource_link2 != null)
																 	 <h4><b>Link - 2: </b><a class="" href="{!!$resource->resource_link2!!}"  target="_blank" style="margin-right: 3px; color:teal;">{!!$resource->resource_link2!!}</a></p><br/>
																  @endif
																  @if($resource->resource_link3 != null)
																	<h4><b>Link - 3: </b><a class="" href="{!!$resource->resource_link3!!}"  target="_blank" style="margin-right: 3px; color:teal;">{!!$resource->resource_link3!!}</a></p><br/>
 																  @endif



																@foreach($resource->resourceFile as $file)
																	{!! $file->resource_file_title !!}
																	<a class="btn btn-info btn-xs btn-archive" href="{!! $file->resource_file!!}" target="_blank">
																		<i class="fa fa-download" aria-hidden="true"></i>
																	</a><br><br/>
																@endforeach


															</div>
														</center>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											<!--modal -->

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
					{!! Form::open(array('route' => array('book.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
					<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
					{!! Form::submit('Yes, Delete', array('class' => 'btn btn-success')) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>


@stop


@section('style')

	{!! Html::style('assets/datatables/jquery.dataTables.min.css') !!}

	{{--<style>--}}

		{{--.modal-dialog  {width:75%;}--}}
	{{--</style>--}}

@stop

@section('script')

	{!! Html::script('assets/datatables/jquery.dataTables.min.js') !!}
	{!! Html::script('assets/datatables/dataTables.bootstrap.js') !!}


	//for Datatable
	<script type="text/javascript">

		$(document).ready(function() {
			$('#datatable').dataTable();
		});
	</script>



	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			/* do not add datatable method/function here , its always loaded from footer -- masiur */
			$(document).on("click", ".deleteBtn", function() {
				var deleteId = $(this).attr('deleteId');
				var url = "<?php echo URL::route('book.index'); ?>";
				$(".deleteForm").attr("action", url+'/'+deleteId);
			});

		});
	</script>


@stop







