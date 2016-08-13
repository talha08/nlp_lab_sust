@extends('layouts.default')
@section('content')


 <!-- Page Content Start -->
<!-- ================== -->

<div class="wraper container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <div class="bg-picture" style="background-image:url('/img/bg_6.jpg')">
                <span class="bg-picture-overlay"></span><!-- overlay -->
                <!-- meta -->
                <div class="box-layout meta bottom">
                    @if(Auth::user()->is_teacher ==1)
                    <div class="col-sm-6 clearfix">
                        <span class="img-wrapper pull-left m-r-15"> {!! Html::image(Auth::user()->teachers->img_url, 'alt', array('alt'=> '', 'class' => 'img-circle','width'=> '100', 'height'=>'100')) !!}</span>
                        <div class="media-body">
                            <h3 class="text-white mb-2 m-t-10 ellipsis">{!! $user->name !!}</h3>
                            <h5 class="text-white"> {!!$user->teachers->position!!}</h5>
                        </div>
                    </div>
                     @else
                        <div class="col-sm-6 clearfix">
                            <span class="img-wrapper pull-left m-r-15"> {!! Html::image(Auth::user()->students->img_url, 'alt', array('alt'=> '', 'class' => 'img-circle','width'=> '100', 'height'=>'100')) !!}</span>
                            <div class="media-body">
                                <h3 class="text-white mb-2 m-t-10 ellipsis">{!! $user->name !!}</h3>
                                <h5 class="text-white"> {!!$user->students->position!!}</h5>
                            </div>
                        </div>
                     @endif

                </div>
                <!--/ meta -->
            </div>
        </div>
    </div>


    @if(Auth::user()->is_teacher ==1)
    <div class="row m-t-30">
        <div class="col-sm-12">
            <div class="panel panel-default p-0">
                <div class="panel-body p-0">

                    <ul class="nav nav-tabs profile-tabs">
                        <li class="active"><a data-toggle="tab" href="#aboutme">About Me</a></li>
                        <li class=""><a data-toggle="tab" href="#edit-profile">Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#photo-upload">Photos</a></li>
                        <li class=""><a data-toggle="tab" href="#projects">Blogs</a></li>
                    </ul>



                    <div class="tab-content m-0">
                        <div id="aboutme" class="tab-pane active">
                            <div class="profile-desk">

                                @include('includes.alert')

                                <h3>About Me: </h3>
                                <span class="designation">{!!$user->teachers->about_me!!} </span>

                                {{--Basic Information--}}
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th colspan="3"><h3>Basic Information</h3></th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><b>Position </b></td>
                                        <td><a href="#" class="ng-binding">{!!$user->teachers->position!!}</a></td>
                                    </tr>

                                    <tr>
                                        <td><b>Organization</b></td>
                                        <td><a href="#" class="ng-binding">{!!$user->teachers->organization!!}</a></td>
                                    </tr>
                                    </tbody>
                                </table>


                                {{--contact information--}}
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th colspan="3"><h3>Contact Information</h3></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td><b>Email</b></td>
                                        <td><a href="#" class="ng-binding">{!!$user->email!!}</a></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><b>Phone</b></td><td class="ng-binding">{!!$user->teachers->phone!!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>LinkedIn Account</b></td>
                                        <td><a href="#" class="ng-binding">{!!$user->teachers->linkedIn_user!!}</a></td>
                                    </tr>

                                    <tr>
                                        <td><b>GIthub Account</b></td>
                                        <td><a href="#" class="ng-binding">{!!$user->teachers->github_user!!}</a></td>
                                    </tr>

                                    </tbody>
                                </table>


                            </div> <!-- end profile-desk -->
                        </div> <!-- about-me -->





                {{--photo Upload--}}

                <div id="photo-upload" class="tab-pane">
                            <div class="user-profile-content">
                                <div class="photo-upload">
                                    {!! Form::open(array('route' => 'photo.store', 'method' => 'put', 'files' => true)) !!}
                                    <fieldset>
                                        <label>UPLOAD PICTURE:</label>
                                        <br/>
                                        @if(Auth::user()->is_teacher ==1)
                                             <img class="preview" id="preview" alt=" " src="{!!asset(Auth::user()->teachers->img_url)!!}">
                                        @else
                                            <img class="preview" id="preview" alt=" " src="{!!asset(Auth::user()->students->img_url)!!}">
                                        @endif
                                        <br/>
                                        <br/>
                                        <input type="file" name="image" id="imgInp" onchange="loadFile(event);">
                                    </fieldset>

                                    <fieldset>
                                        {!! Form::submit('Update Avatar', array('class' => 'btn btn-primary')) !!}
                                    </fieldset>

                                    {!! Form::close() !!}
                                </div>
                        </div>
                 </div>








                        <!-- settings -->

                   <div id="edit-profile" class="tab-pane">
                            <div class="user-profile-content">


                                {!! Form::model($teacher, array('route' => 'profile.updateTeacher', 'method' => 'put'))  !!}

                                <div class="form-group ">
                                    {!! Form::label('phone', 'Phone :', array('class' => 'col-md-4 control-label')) !!}<br/>
                                    {!! Form::text('phone',null, array('class' => 'form-control', 'placeholder' => 'Your phone Number...')) !!}
                                </div><br>


                                <div class="form-group ">
                                    {!! Form::label('position', 'Working Status * :', array('class' => 'col-md-4 control-label')) !!}<br/>
                                    {!! Form::text('position',null, array('class' => 'form-control', 'placeholder' => 'Student/job...')) !!}
                                </div><br>


                                <div class="form-group ">
                                    {!! Form::label('organization', 'Organization/Institute * :', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('organization', null, array('class' => 'form-control', 'placeholder' => 'Input organization/institute...')) !!}
                                </div><br>


                                <div class="form-group ">
                                    {!! Form::label('linkedIn_user', 'LinkedIn Account :', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('linkedIn_user', null, array('class' => 'form-control', 'placeholder' => 'www.linkedin.com/xyz...')) !!}
                                </div><br>

                                <div class="form-group ">
                                    {!! Form::label('github_user', 'Github Account :', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('github_user', null, array('class' => 'form-control', 'placeholder' => 'www.github.com/xyz...')) !!}
                                </div><br>

                                <div class="form-group ">
                                    {!! Form::label('about_me', 'About Yourself :', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::textarea('about_me', null, array('class' => 'form-control', 'placeholder' => 'Write About Yourself...')) !!}
                                </div><br>



                                <div class="form-group text-right">
                                    {!! Form::submit('Update', array('class' => 'btn btn-lg btn-login btn-block btn-purple ', 'type'=>'submit')) !!}
                                </div>

                            </div>
                        </div>





                        <!-- Blog  -->
                      <div id="projects" class="tab-pane">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div class="portlet">
                                        <div id="portlet2" class="panel-collapse collapse in">
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered" id="datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Title</th>
                                                            <th>Tag</th>
                                                            {{--<th>Image</th>--}}
                                                            {{--<th>Meta Data/ Url</th>--}}
                                                            <th>Created at</th>
                                                            <th>Action</th>
                                                        </tr>

                                                        </thead>
                                                        <tbody>
                                                        @foreach ($blog as $blogs)
                                                            <tr>
                                                                <td>{!! $blogs->id !!}</td>
                                                                <td> <a data-toggle="modal" style="color: teal;" data-target="#myModal_{{$blogs->id}}" >{!! $blogs->title !!}</a></td>
                                                                <td>{!! $blogs->tag !!}</td>
                                                                {{--<td> <img class="" src="{!! $blogs->img_thumbnail !!}" alt=""></td>--}}
                                                                {{--<td>{!! $blogs->meta_data !!}</td>--}}
                                                                <td>{!! $blogs->created_at->format('Y-m-d') !!}</td>
                                                                <td><a class="btn btn-warning btn-xs btn-archive Editbtn" href="{!!route('blog.edit',$blogs->id)!!}"  style="margin-right: 3px;"><i class="ion-compose" aria-hidden="true"></i></a></td>
                                                            </tr>

                                                            <!-- Modal -->
                                                            <div id="myModal_{!!$blogs->id!!}" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <!-- Modal content-->
                                                                    <div class="modal-content" >
                                                                        <center>
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <b>{!! $blogs->title!!}</b>
                                                                                {{--<h4 class="modal-title"><img class="img-circle" src="{!! $blogs->img_thumbnail !!}" alt="" align="left">{!! $blogs->title!!}</h4>--}}
                                                                            </div>
                                                                            <div class="modal-body" >

                                                                                <p><b>Tag: </b>{!! $blogs->tag!!}</p>
                                                                                <p><b>Details: </b>{!! $blogs->details!!}</p>
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
                        <!-- End Blog -->





                    </div>

                </div>
            </div>
        </div>
    </div>
 {{--teachers section end--}}

    @else

 {{--Student section starts--}}
        <div class="row m-t-30">
            <div class="col-sm-12">
                <div class="panel panel-default p-0">
                    <div class="panel-body p-0">
                        <ul class="nav nav-tabs profile-tabs">
                            <li class="active"><a data-toggle="tab" href="#aboutme">About Me</a></li>
                            <li class=""><a data-toggle="tab" href="#edit-profile">Settings</a></li>
                            <li class=""><a data-toggle="tab" href="#photo-upload">Photos</a></li>
                            <li class=""><a data-toggle="tab" href="#projects">Blogs</a></li>
                        </ul>




                        <div class="tab-content m-0">
                            <div id="aboutme" class="tab-pane active">
                                <div class="profile-desk">

                                    @include('includes.alert')

                                    <h3>About Me: </h3>
                                    <span class="designation">{!!$user->students->about_me!!} </span>

                                    {{--Basic Information--}}
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th colspan="3"><h3>Basic Information</h3></th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><b>Position </b></td>
                                            <td><a href="#" class="ng-binding">{!!$user->students->position!!}</a></td>
                                        </tr>

                                        <tr>
                                        <td><b>Organization</b></td><td class="ng-binding">{!!$user->students->organization!!}</td>
                                        </tr>


                                        </tbody>
                                    </table>


                                    {{--contact information--}}
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th colspan="3"><h3>Contact Information</h3></th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr>
                                            <td><b>Email</b></td>
                                            <td><a href="#" class="ng-binding">{!!$user->email!!}</a></td>
                                        </tr>

                                        <tr>
                                            <td><b>Phone</b></td><td class="ng-binding">{!!$user->students->phone!!}</td>
                                        </tr>



                                        <tr>
                                            <td><b>GIthub</b></td>
                                            <td><a href="#" class="ng-binding">{!!$user->students->github_user!!}</a></td>
                                        </tr>

                                        </tbody>
                                    </table>


                                </div> <!-- end profile-desk -->
                            </div> <!-- about-me -->





                            {{--photo Upload--}}

                            <div id="photo-upload" class="tab-pane">
                                <div class="user-profile-content">


                                    <div class="photo-upload">
                                        {!! Form::open(array('route' => 'photo.store', 'method' => 'put', 'files' => true)) !!}
                                        <fieldset>
                                            <label>UPLOAD PICTURE:</label>
                                            <br/>
                                            <img class="preview" id="preview" alt=" " src="{!!asset(Auth::user()->students->img_url)!!}">
                                            <br/>
                                            <br/>
                                            <input type="file" name="image" id="imgInp" onchange="loadFile(event);">
                                        </fieldset>

                                        <fieldset>
                                            {!! Form::submit('Update Avatar', array('class' => 'btn btn-primary')) !!}
                                        </fieldset>

                                        {!! Form::close() !!}
                                    </div>

                                </div>
                            </div>








                            <!-- settings -->

                            <div id="edit-profile" class="tab-pane">
                                <div class="user-profile-content">


                                    {!! Form::model($student, array('route' => 'profile.updateStudent', 'method' => 'put'))  !!}

                                    <div class="form-group ">
                                        {!! Form::label('phone', 'Phone :', array('class' => 'col-md-4 control-label')) !!}<br/>
                                        {!! Form::text('phone',null, array('class' => 'form-control', 'placeholder' => 'Your phone Number...')) !!}
                                    </div><br>



                                    <div class="form-group ">
                                        {!! Form::label('position', 'Working Status * :', array('class' => 'col-md-4 control-label')) !!}<br/>
                                        {!! Form::text('position',null, array('class' => 'form-control', 'placeholder' => 'Student/job...')) !!}
                                    </div><br>


                                    <div class="form-group ">
                                         {!! Form::label('organization', 'Organization/Institute * :', array('class' => 'col-md-4 control-label')) !!}
                                         {!! Form::text('organization', null, array('class' => 'form-control', 'placeholder' => 'Input organization/institute...')) !!}
                                    </div><br>


                                    <div class="form-group ">
                                        {!! Form::label('study_level', 'Select Study Level :', array('class' => 'col-md-4 control-label')) !!}
                                        {!! Form::select('study_level', $level,null, array('class' => 'select2', 'placeholder' => 'Select your Study Level...')) !!}
                                    </div><br>

                                    <div class="form-group ">
                                        {!! Form::label('year', 'Select Year : (Only for Undergraduates Students)', array('class' => 'control-label')) !!}
                                        {!! Form::select('year', $year,null, array('class' => 'select2', 'placeholder' => 'Select your Education year...')) !!}
                                    </div><br>

                                    <div class="form-group ">
                                        {!! Form::label('semester', 'Select Semester : (Only for Undergraduates Students)', array('class' => 'control-label')) !!}
                                        {!! Form::select('semester', $semester,null, array('class' => 'select2', 'placeholder' => 'Select your Education semester...')) !!}
                                    </div><br>

                                    <div class="form-group ">
                                        {!! Form::label('linkedIn_user', 'LinkedIn Account :', array('class' => 'col-md-4 control-label')) !!}
                                        {!! Form::text('linkedIn_user', null, array('class' => 'form-control', 'placeholder' => 'www.linkedin.com/xyz...')) !!}
                                    </div><br>

                                    <div class="form-group ">
                                        {!! Form::label('github_user', 'Github Account :', array('class' => 'col-md-4 control-label')) !!}
                                        {!! Form::text('github_user', null, array('class' => 'form-control', 'placeholder' => 'www.github.com/xyz...')) !!}
                                    </div><br>


                                    <div class="form-group">
                                        {!! Form::label('platform', 'Working Platform (Type and hit Enter) :', array('class' => 'control-label')) !!}<br/>
                                        {!! Form::text('platform', null ,array('class' => 'tags','id'=>'tags'))!!}
                                    </div><br/>

                                    <div class="form-group ">
                                        {!! Form::label('about_me', 'About Yourself :', array('class' => 'col-md-4 control-label')) !!}
                                        {!! Form::textarea('about_me', null, array('class' => 'form-control', 'placeholder' => 'Write About Yourself...')) !!}
                                    </div><br>



                                    <div class="form-group text-right">
                                        {!! Form::submit('Update', array('class' => 'btn btn-lg btn-login btn-block btn-purple ', 'type'=>'submit')) !!}
                                    </div>

                                </div>
                            </div>





                            <!-- Blog  -->
                            <div id="projects" class="tab-pane">
                                <div class="row m-t-10">
                                    <div class="col-md-12">
                                        <div class="portlet">
                                            <div id="portlet2" class="panel-collapse collapse in">
                                                <div class="portlet-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered" id="datatable">
                                                            <thead>
                                                            <tr>
                                                                <th>id</th>
                                                                <th>Title</th>
                                                                <th>Tag</th>
                                                                {{--<th>Image</th>--}}
                                                                {{--<th>Meta Data/ Url</th>--}}
                                                                <th>Created at</th>
                                                                <th>Action</th>
                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            @foreach ($blog as $blogs)
                                                                <tr>
                                                                    <td>{!! $blogs->id !!}</td>
                                                                    <td> <a data-toggle="modal" style="color: teal;" data-target="#myModal_{{$blogs->id}}" >{!! $blogs->title !!}</a></td>
                                                                    <td>{!! $blogs->tag !!}</td>
                                                                    {{--<td> <img class="" src="{!! $blogs->img_thumbnail !!}" alt=""></td>--}}
                                                                    {{--<td>{!! $blogs->meta_data !!}</td>--}}
                                                                    <td>{!! $blogs->created_at->format('Y-m-d') !!}</td>
                                                                    <td><a class="btn btn-warning btn-xs btn-archive Editbtn" href="{!!route('blog.edit',$blogs->id)!!}"  style="margin-right: 3px;"><i class="ion-compose" aria-hidden="true"></i></a></td>
                                                                </tr>

                                                                <!-- Modal -->
                                                                <div id="myModal_{!!$blogs->id!!}" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog">
                                                                        <!-- Modal content-->
                                                                        <div class="modal-content" >
                                                                            <center>
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    <b>{!! $blogs->title!!}</b>
                                                                                    {{--<h4 class="modal-title"><img class="img-circle" src="{!! $blogs->img_thumbnail !!}" alt="" align="left">{!! $blogs->title!!}</h4>--}}
                                                                                </div>
                                                                                <div class="modal-body" >

                                                                                    <p><b>Tag: </b>{!! $blogs->tag!!}</p>
                                                                                    <p><b>Details: </b>{!! $blogs->details!!}</p>
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
                            <!-- End Blog -->



                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endif





</div>
@stop


@section('style')


    {!! Html::style('assets/datatables/jquery.dataTables.min.css') !!}

    {!! Html::style('css/photo_upload.css') !!}
        <!--Tags Input-->
    {!! Html::style('assets/tagsinput/jquery.tagsinput.css') !!}
            <!--Select Input-->
    {!! Html::style('assets/select2/select2.css') !!}

@stop

@section('script')
    {!! Html::script('assets/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/datatables/dataTables.bootstrap.js') !!}


                <!--photo upload-->
    {!! Html::script('js/photo_upload.js') !!}
            <!--Tags Input-->
    {!! Html::script('assets/tagsinput/jquery.tagsinput.min.js') !!}
            <!--Select Input-->
    {!! Html::script('assets/select2/select2.min.js') !!}
    //for Datatable
    <script type="text/javascript">

        $(document).ready(function() {
            $('#datatable').dataTable();

        });

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
