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
                                               <a href="{!! route('tag.create')!!}"><button class="btn btn-success">Create Tag</button></a>
                                        </span>
                        </div><br>



                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <table class="table table-striped table-bordered" id="datatable">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th> Category Name</th>
                                            <th>Created at</th>
                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($tag as $tags)
                                            <tr>
                                                <td>{!! $tags->id !!}</td>
                                                <td>{!! $tags->name !!}</td>
                                                <td>{!! $tags->created_at->format('Y-m-d') !!}</td>
                                                <td>
                                                    <a class="btn btn-info btn-xs btn-archive Editbtn" href="{!!route('tag.edit',$tags->id)!!}"  style="margin-right: 3px;"><i class="ion-compose" aria-hidden="true"></i></a>
                                                    <a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{!! $tags->id!!}"><i class="ion-trash-a" aria-hidden="true"></i></a>
                                                </td>
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
                    {!! Form::open(array('route' => array('tag.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
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
                var url = "<?php echo URL::route('tag.index'); ?>";
                $(".deleteForm").attr("action", url+'/'+deleteId);
            });

        });
    </script>


@stop







