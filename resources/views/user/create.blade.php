@extends('labfront.layouts.master')
@section('content')

    <div class="container"><!-- container -->

        {{--path to go--}}
        <div class="row"><!-- row -->

            {{--<div id="k-top-search" class="col-lg-12 clearfix"><!-- top search -->--}}

                {{--<form action="#" id="top-searchform" method="get" role="search">--}}
                    {{--<div class="input-group">--}}
                        {{--<input type="text" name="s" id="sitesearch" class="form-control" autocomplete="off" placeholder="Type in keyword(s) then hit Enter on keyboard" />--}}
                    {{--</div>--}}
                {{--</form>--}}

                {{--<div id="bt-toggle-search" class="search-icon text-center"><i class="s-open fa fa-search"></i><i class="s-close fa fa-times"></i></div><!-- toggle search button -->--}}

            {{--</div><!-- top search end -->--}}




            <div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                <ol class="breadcrumb">
                    <li><a href="#">SUST CSE NLP Lab</a></li>
                    <li><a href="#">Home</a></li>
                </ol>
            </div><!-- breadcrumbs end -->

        </div><!-- row end -->
        {{--path to go end--}}

    <!-- Page Content Start -->
    <!-- ================== -->
<br>


        <!-- Vertical Steps Example -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    @include('includes.alert')
                    <div class="panel-heading">
                        <h3 class="panel-title">Member Registration Form</h3>
                    </div>


                    <div class="panel-body">
                        {!! Form::open(array('route' => 'user.store', 'method' => 'post', 'id' =>'form_id', 'class' => 'form-signin', 'files'=>true)) !!}



                            <h3>Account</h3>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">Complete Name *</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('name', '', array('class' => 'form-control', 'required','placeholder' => 'Your complete name...')) !!}
                                    </div><br>
                                </div>


                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="email2">Email *</label>
                                    <div class="col-lg-10">
                                        {!! Form::email('email', '', array('id'=>'email2','class' => 'required email form-control',  'required','placeholder' => 'Your email here...')) !!}
                                    </div><br>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">Password *</label>
                                    <div class="col-lg-10">
                                        {!! Form::password('password', array('class' => 'form-control',  'required','placeholder' => 'Input Password...')) !!}
                                    </div><br>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">Confirm Password *</label>
                                    <div class="col-lg-10">
                                        {!! Form::password('password_confirmation', array('class' => 'form-control',  'required','placeholder' => 'Confirm Password...')) !!}
                                    </div><br>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-12 control-label ">(*) Mandatory</label>
                                </div>









                            <h3>Education</h3>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">Study Level *</label>
                                    <div class="col-lg-10">
                                        {!! Form::select('study_level', $level,'', array('class' => 'select2',  'required','placeholder' => 'Select your Study Level...')) !!}
                                    </div><br>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">Year* </label>
                                    <div class="col-lg-10">
                                        {!! Form::select('year', $year,'', array('class' => 'select2',  'required','placeholder' => 'Select your Education year...')) !!}
                                    </div><br>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">Semester* </label>
                                    <div class="col-lg-10">
                                        {!! Form::select('semester', $semester,'', array('class' => 'select2',  'required','placeholder' => 'Select your Education semester...')) !!}
                                    </div><br>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">Registration Number* </label>
                                    <div class="col-lg-10">
                                        {!! Form::text('reg','', array('class' => 'form-control', 'required','placeholder' => 'Enter your registration Number')) !!}
                                    </div><br>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">Working Platforms & Skills </label>
                                    <div class="col-lg-10">
                                        {!! Form::text('platform', '', array('class' => 'tags','id'=>'tags','multiple', 'required', 'autofocus')) !!}
                                    </div><br>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-12 control-label ">(*) Mandatory</label>
                                </div>






                           <h3>Contact</h3>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">Phone *</label>
                                    <div class="col-lg-10">
                                        {!! Form::text('phone', '', array('class' => 'form-control',  'required','placeholder' => 'Your phone number...')) !!}
                                    </div><br>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">GitHub </label>
                                    <div class="col-lg-10">
                                        {!! Form::text('github_user', '', array('class' => 'form-control',  'required','placeholder' => 'Your github username...')) !!}
                                    </div><br>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="address1">LinkedIn </label>
                                    <div class="col-lg-10">
                                        {!! Form::text('linkedIn_user', '', array('class' => 'form-control',  'required','placeholder' => 'Your linkedin username...')) !!}
                                    </div><br>
                                </div><br>

                                <div class="form-group clearfix">
                                    <label class="col-lg-12 control-label ">(*) Mandatory</label>
                                </div>





                             <h3>Upload Image</h3>
                                <center>
                                    <fieldset>
                                        <img class="preview" id="preview" alt=" " src="{!!asset('upload/profile/default/avatar.jpg')!!}">
                                        <br/>
                                        <input type="file" name="image" id="imgInp" onchange="loadFile(event);">
                                    </fieldset>
                                </center><br/><br/>



                        <div class="form-group">
                            {!! Form::submit('Apply For Membership', array('class' => 'btn btn-lg btn-success btn-login btn-block')) !!}
                        </div><br/><br/>


                        </div> <!-- End #wizard-vertical -->
                    </div>  <!-- End panel-body -->
                    {!! Form::close() !!}
                </div> <!-- End panel -->

            </div> <!-- end col -->

        </div> <!-- End row -->

        <!-- Page Content end -->
        <!-- ================== -->


    </div>

@stop

@section('style')
        <!-- Bootstrap core CSS -->
    {!! Html::style('css/bootstrap-reset.css') !!}

            <!--Form Wizard-->
    {!! Html::style('assets/form-wizard/jquery.steps.css') !!}
            <!--photo upload-->
    {!! Html::style('css/photo_upload.css') !!}
            <!--Tags Input-->
    {!! Html::style('assets/tagsinput/jquery.tagsinput.css') !!}
            <!--Select Input-->
    {!! Html::style('assets/select2/select2.css') !!}



@stop

@section('script')


        <!--Form Wizard-->
    {!! Html::script('assets/form-wizard/jquery.steps.min.js') !!}
    {!! Html::script('assets/jquery.validate/jquery.validate.min.js') !!}

            <!--wizard initialization-->
    {!! Html::script('assets/form-wizard/wizard-init.js') !!}
            <!--photo upload-->
    {!! Html::script('js/photo_upload.js') !!}
            <!--Tags Input-->
    {!! Html::script('assets/tagsinput/jquery.tagsinput.min.js') !!}
            <!--Select Input-->
    {!! Html::script('assets/select2/select2.min.js') !!}


    <script type="text/javascript">

        jQuery(document).ready(function() {

            // Tags Input
            jQuery('#tags').tagsInput({
                width:'auto'
               // height: 40
            });

            // Select2
            jQuery(".select2").select2({
                width: '100%'
            });

        });

    </script>

@stop
