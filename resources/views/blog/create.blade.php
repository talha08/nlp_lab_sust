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

                    </span>
                    </div>




                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="panel-body">

                                    {!! Form::open(array('route' => 'blog.store',  'files' => true) ) !!}

                                    <div class="form-group">
                                        {!! Form::label('title', 'Title :', array('class' => 'control-label')) !!}<br/>
                                        {!!Form::text('title', '',array('class' => 'form-control','placeholder' =>  ' How to create a blog.'))!!}
                                    </div>

                                     {{--<div class="form-group"> --}}
                                      {{--{!! Form::label('meta_data', 'Url(unique) :', array('class' => 'col-md-2 control-label')) !!}--}}
                                      {{--{!! Form::text('meta_data','',array('class' => 'form-control','placeholder' => 'www.xyz.com/meta-data' )) !!}--}}
                                     {{--</div>--}}

                                    <div class="form-group">
                                        {!! Form::label('tag', 'Select Tag :', array('class' => 'col-md-2 control-label')) !!}
                                        {!!Form::select('tag', $tag, '',array('class' => 'form-control', 'autofocus','id' => 'status'))!!}
                                    </div><br>




                                    <div class="form-group">
                                    {!! Form::label('details', 'Details :', array('class' => 'col-md-2 control-label')) !!}
                                    </div><br>
                                    <div class="form-group">
                                        {!!Form::textarea('details','',array('class' => 'form-control','placeholder' => 'Enter details of blog','id' => 'editor' ))!!}
                                    </div><br>



                                    <div class="form-group">
                                        {!! Form::label('image', 'Choose an image') !!}
                                        {!! Form::file('image') !!}
                                    </div> <br>

                                    <div class="form-group">
                                        {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
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

    {!! Html::style('css/chosen_dropdown/chosen.css') !!}
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css') !!}



@stop


@section('script')
    {!! Html::script('js/chosen_dropdown/chosen.jquery.min.js') !!}
    {!! Html::script('js/ckeditor/ckeditor.js') !!}

    <script type="text/javascript">
        $(document).ready(function() {

            CKEDITOR.replace( 'editor', {
                "filebrowserImageUploadUrl": "{!!asset('js/ckeditor/plugins/imgupload.php')!!}"
            } );

            $("#status").chosen();

        });



    </script>

@stop











