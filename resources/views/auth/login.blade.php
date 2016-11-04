@extends('labfront.layouts.master')
@section('content')
    <div class="container">
        <!-- container -->

        <div class="row">
            <div class="k-breadcrumbs col-lg-12 clearfix">
                <!-- breadcrumbs -->
                <ol class="breadcrumb">
                    <li><a href="{!! route('labfront.index') !!}">SUST CSE NLP Lab</a></li>
                    <li><a href="#">Login</a></li>
                </ol>
            </div>
            <!-- breadcrumbs end -->
        </div>




        <!-- ================== -->
        <br>
        <!-- Vertical Steps Example -->
        <div class="row">
            <div class="col-sm-offset-3 col-md-6">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="text-center"><b>LogIn into NLP LAB, SUST</b></h3>
                        @include('includes.alert')
                    </div>
                    <div class="panel-body">
                        {!! Form::open(array('route' => 'login', 'method' => 'post', 'class' => 'form-horizontal m-t-40')) !!}
                        <div class="form-group ">
                            <div class="col-xs-12">
                                {!! Form::text('email', '', array('class' => 'form-control','id' =>'text', 'placeholder' => 'Email Address', 'type'=>'text','autofocus')) !!}
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                {!! Form::password('password', array('class' => 'form-control','id' =>'pass', 'placeholder' => 'Password','type'=>'text')) !!}
                            </div>
                        </div>
                        <div class="form-group m-t-30">
                            <div class="col-sm-5">
                                <input checked="checked" name="agree" type="checkbox" value="1">Remember me
                            </div>
                            <div class="col-sm-7 text-right">
                                <a data-toggle="modal" href="#myModal"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div>
                        {{--{!!--for csrf token--!!}--}}
                        <div class="form-group text-right">
                            <br>
                            <div class="col-xs-12">
                                {!! Form::submit('Log in', array('class' => 'btn btn-lg btn-login btn-block btn-purple ', 'type'=>'submit')) !!}
                            </div>
                        </div>

                        <div class="registration">
                            <center>
                                <br>
                                Don't have an account yet? <br/>
                                <a class="" href="{!! route('user.create') !!}">
                                    Apply For Account.
                                </a>
                                Or
                                <a class="" href="{!! url('/') !!}">
                                    Back To Homepage
                                </a>
                            </center>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- End #wizard-vertical -->
                </div>
                <!-- End panel-body -->
            </div>
            <!-- End panel -->
        </div>
        <!-- end col -->
    </div>
    <!-- End row -->




    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Forgot Password ?</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    {!! Form::open(array('action' => 'RemindersController@postEmail', 'method' => 'post')) !!}
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    {!! Form::email('email', '', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Email Address', 'autocomplete'=>'off')) !!}
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    {!! Form::submit('Submit', array('class' => 'btn btn-success')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->



@stop
@section('style')
            <!-- Bootstrap core CSS -->
    {!! Html::style('css/bootstrap-reset.css') !!}

    <style>
        #text{
            font-size: medium;
        }
        #pass{
            font-size: xx-large;
        }
    </style>
@stop
@section('script')
@stop