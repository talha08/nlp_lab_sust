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
                                               <a href="{!! route('paper.create')!!}"><button class="btn btn-success">Upload Paper</button></a>
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
											<th>Type</th>
											{{--<th>Details</th>--}}
											<th>Actions</th>

										</tr>
										</thead>
										<tbody>
										@foreach ($papers as $paper)
											<tr>
												<td>{!! $paper->id !!}</td>

												<td> <a data-toggle="modal" style="color: teal;" data-target="#myModal_{{$paper->id}}" >{!! $paper->paper_title !!}</a></td>
												<td>{!! $paper->paper_type !!}</td>
												{{--<td>{!!Str::limit($paper->paper_details,20) !!}</td>--}}

												<td><a class="btn btn-warning btn-xs btn-archive Editbtn" href="{!!route('paper.edit',$paper->id)!!}"  style="margin-right: 3px;"><i class="ion-compose" aria-hidden="true"></i></a>
												<a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{!! $paper->id!!}"><i class="ion-trash-a" aria-hidden="true"></i></a>
												</td>

											</tr>

											<!-- Modal -->
											<div id="myModal_{{$paper->id}}" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content" >
														<center>
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																	{{ $paper->paper_title}}

															</div>
															<div class="modal-body" >


																@if($paper->publication_name  != null)
																  <b>Publication Name:</b> {!! $paper->publication_name !!} 
																@endif
																<br><br>

																<p>{{ strip_tags($paper->paper_details)}}</p>
																<p><b>Published at : {{ $paper->paper_publish_date}} </b></p>
																<p><b>Paper Url: </b><a class="" href="{!!$paper->paper_url!!}"  target="_blank" style="margin-right: 3px; color:teal;">{!!$paper->paper_url!!}</a></p><br/>
																<b>Author: </b><br>
																@foreach($paper->users as $user=> $value)
																	{{--@if($value->is_teacher == 1)--}}
																		{{ $value->name }}<br/>
																	{{--@endif--}}
																@endforeach
																<br><br>


																{{--<b>Students: </b><br>--}}
																{{--@foreach($paper->users as $user=> $value)--}}
																	{{--@if($value->is_teacher != 1)--}}
																		{{--{{ $value->name }}<br/>--}}
																	{{--@endif--}}
																{{--@endforeach--}}



																@if($paper->paper_cite  != null)
																  <b>Cite:</b> {!! $paper->paper_cite !!} 
																@endif
																<br><br>
																
			                                                   


																<p><b>Attachment Section: </b></p>
																@if(!empty($paper->paperFile))
																	@foreach($paper->paperFile as $file)
																		{!! $file->paper_file_title !!}
																		<a class="btn btn-info btn-xs btn-archive" href="{!! $file->paper_file!!}" target="_blank">
																			<i class="fa fa-download" aria-hidden="true"></i>
																		</a><br><br/>
																	@endforeach
																@else
																	No Attachment Found
																@endif



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
					{!! Form::open(array('route' => array('paper.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
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

		{{--.modal-dialog  {width:65%;}--}}
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
				var url = "<?php echo URL::route('paper.index'); ?>";
				$(".deleteForm").attr("action", url+'/'+deleteId);
			});

		});
	</script>


@stop







