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
                                               <a href="{!! route('project.create')!!}"><button class="btn btn-success">Upload Project</button></a>
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
											<th>Status</th>
											<th>Actions</th>

										</tr>
										</thead>
										<tbody>
										@foreach ($projects as $project)
											<tr>
												<td>{!! $project->id !!}</td>
												<td> <a data-toggle="modal" style="color: teal;" data-target="#myModal_{{$project->id}}" >{!!  $project->project_title !!}</a></td>
												{{--<td>{!!Str::limit($project->project_details,20) !!}</td>--}}

												@if($project->project_status == 0)
													<td><a class="btn btn-success btn-xs btn-archive " href="{!!route('project.changeStatus',$project->id)!!}"  style="margin-right: 3px;">Complete</a></td>
												 @else
													<td><a class="btn btn-info btn-xs btn-archive " href="{!!route('project.changeStatus',$project->id)!!}"  style="margin-right: 3px;">Running</a></td>
											     @endif

												<td>
													<a class="btn btn-warning btn-xs btn-archive Editbtn" href="{!!route('project.edit',$project->id)!!}"  style="margin-right: 3px;"><i class="ion-compose" aria-hidden="true"></i></a>
													<a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{!! $project->id!!}"><i class="ion-trash-a" aria-hidden="true"></i></a>
												</td>
											</tr>

											<!-- Modal -->
											<div id="myModal_{{$project->id}}" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content" >
														<center>
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<b>{{ $project->project_title}}</b>

															</div>
															<div class="modal-body" >


																<p>{{ $project->project_details}}</p><br/>
																<b>Project Link: </b><p><a class="" href="{!!$project->project_url!!}"  target="_blank" style="margin-right: 3px; color:teal;">{!!$project->project_url!!}</a></p><br/>

																<b>Supervisors: </b><br>
																@foreach($project->users as $user=> $value)
																	@if($value->is_teacher == 1)
																		{{ $value->name }}<br/>
																	@endif
																@endforeach

																<b>Students: </b><br>
																@foreach($project->users as $user=> $value)
																	@if($value->is_teacher != 1)
																		{{ $value->name }}<br/>
																	@endif
																@endforeach

																<b>Uses Language/Framework: </b><br><br>
																<?php
																$myString = $project->project_language;
																$myArray = explode(',', $myString);
																//print_r($myArray[1]);
																	for($i=0; $i<count($myArray);$i++){
																		//echo $myArray[$i]."<br/>";
																		//echo '<div class="tags"><a href="#" class="tag">'.$myArray[$i].'</a></div>';
																		echo '<a class="tag">'.$myArray[$i].'</a>';
																	}
																?>



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
					{!! Form::open(array('route' => array('project.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
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
	{!! Html::style('css/languageTag.css') !!}

	<style>
		/*.modal-dialog  {width:75%;}*/
	</style>



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
				var url = "<?php echo URL::route('project.index'); ?>";
				$(".deleteForm").attr("action", url+'/'+deleteId);
			});

		});
	</script>


@stop







