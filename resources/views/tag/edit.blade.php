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
                           <a href="{!! route('tag.index') !!}"><button class="btn btn-success">Tag List</button></a>
                    </span>
                    </div>




                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="panel-body">



                                    {!!Form::model($tag,['route' => ['tag.update',$tag->id], 'method' => 'put' ])!!}


                                    <div class="form-group">
                                        {!! Form::label('name', "Tag Name:", array('class' => 'control-label')) !!}
                                        {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter tag name')) !!}
                                    </div>


                                    <div class="form-group">
                                        {!! Form::submit('Update Tag', array('class' => 'btn btn-primary')) !!}
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





