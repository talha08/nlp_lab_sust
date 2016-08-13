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
                                               <a href="{!! route('event.create')!!}"><button class="btn btn-success">Create Event</button></a>
                                        </span>
						</div><br>



						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">

									<table class="table table-striped table-bordered" id="datatable">
										<thead>
										<tr>
											<th>id</th>
											<th>Title</th>
											{{--<th>Details</th>--}}
											<th>Start Date</th>
											<th>End Date</th>
											<th>Start Time </th>
											<th>Actions</th>

										</tr>
										</thead>
										<tbody>
										@foreach ($event as $events)
											<tr>
												<td>{!! $events->id !!}</td>
												<td> <a data-toggle="modal" style="color: teal;" data-target="#myModal_{{$events->id}}" >{!!  Str::limit($events->event_title,30) !!}</a></td>
												{{--<td>{!!Str::limit($events->event_details,20) !!}</td>--}}
												<td>{!! $events->event_start !!}</td>
												<td>{!! $events->event_end !!}</td>
												<td>{!! $events->event_time !!}</td>
												<td>
												     <a data-toggle="modal" class="btn btn-success btn-xs btn-archive Editbtn" data-target="#myDataModal_{{$events->id}}" ><i class="ion-upload" aria-hidden="true"></i></a>
													<a class="btn btn-warning btn-xs btn-archive Editbtn" href="{!!route('event.edit',$events->id)!!}"  style="margin-right: 3px;"><i class="ion-compose" aria-hidden="true"></i></a>
													<a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn"  data-toggle="modal" data-target="#deleteConfirm" deleteId="{!! $events->id!!}"><i class="ion-trash-a" aria-hidden="true"></i></a>
												</td>
											</tr>

											<!-- Details View Modal -->
											<div id="myModal_{{$events->id}}" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content" >
														<center>
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title"><img class="" src="{!! $events->event_image !!}" alt="" align="left">
																	<br/><br/>
																	{{ $events->event_title}}
																</h4>
															</div>
															<div class="modal-body" >


																<p><b>Details: </b>{{ $events->event_details}}</p>
																<p><b>Start Date: </b>{{ $events->event_start}}</p>
																<p><b>End Date: </b>{{ $events->event_end}}</p>
																<p><b>Start Time: </b>{{ $events->event_time}}</p><br/>
																<b>Files: </b><br>
																@foreach($events->eventFile as $file)
																	{!! $file->event_file_title !!}
																	<a class="btn btn-info btn-xs btn-archive" href="{!! $file->event_file!!}" target="_blank">
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



											<!-- file upload Modal -->
											<div id="myDataModal_{{$events->id}}" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content" >
														<center>
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">
																	<br/><br/>
																	<b>{{ $events->event_title}}</b>
																</h4>
															</div>
															<div class="modal-body" >

																{!! Form::open(array('route' => 'event.singleUpload',  'files' => true) ) !!}
																<br/><br/>
																<div class="form-group">
																	{!! Form::label('event_file_title', 'File Title :', array('class' => 'control-label')) !!}<br/>
																	{!!Form::text('event_file_title', '',array('class' => 'form-control','placeholder' =>  'File title here'))!!}
																</div><br/><br/>

																{!! Form::file('file[]', array('multiple'=>true)) !!}
																<br/><br/><br/>
																{{--for pass the value of event--}}
																{!! Form::hidden('id', $events->id) !!}
																<div class="form-group">
																	{!! Form::submit('Upload File', array('class' => 'btn btn-primary')) !!}
																</div>

																{!! Form::close() !!}
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
					{!! Form::open(array('route' => array('event.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
					<button type="button" class="btn btn-info" data-dismiss="modal">No</button>
					{!! Form::submit('Yes, Delete', array('class' => 'btn btn-danger')) !!}
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
				var url = "<?php echo URL::route('event.index'); ?>";
				$(".deleteForm").attr("action", url+'/'+deleteId);
			});

		});
	</script>


@stop







