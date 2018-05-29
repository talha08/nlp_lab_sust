@extends('labfront.layouts.master')
@section('content')
    <div id="k-body"><!-- content wrapper -->
        <div class="container"><!-- container -->
            {{--path to go--}}
            <div class="row"><!-- row -->
                <div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                    <ol class="breadcrumb">
                        <li><a href="{!!  route('labfront.index') !!}">Home</a></li>
                        <li class="active">Publication</li>
                    </ol>
                </div><!-- breadcrumbs end -->
            </div><!-- row end -->
            {{--path to go--}}
            <div class="row no-gutter"><!-- row -->
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                    <div class="col-padded"><!-- inner custom column -->
                        <div class="row gutter"><!-- row -->
                            <div class="col-lg-12 col-md-12">
                                <h1 class="page-title">{!! $title !!}</h1><!-- category title -->
                            </div>
                        </div><!-- row end -->
                        <div class="row gutter"><!-- row -->
                            <div class="col-lg-12 col-md-12">
                                {{--Tabber start --}}
                                <div class="row k-equal-height">
                                    <!-- row -->
                                    <div class="col-lg-12">
                                        <!-- tabber -->
                                        <ul class="nav nav-tabs nav-justified">
                                            <!-- starts tab controls -->
                                            <li class="active"><a href="#k-tab-download" data-toggle="tab">Journals</a>
                                            </li>
                                            <li><a href="#k-tab-profile" data-toggle="tab">Conference Paper</a>
                                            </li>
                                            <li><a href="#k-tab-settings" data-toggle="tab">Books</a>
                                            </li>
                                        </ul>
                                        <!-- ends tab controls -->
                                        <div class="tab-content">
                                            <!-- starts tab containers -->
                                            <!-- tab 2 starts -->
                                            <div id="k-tab-download" class="tab-pane fade in active">
                                                <div class="up-event-wrapper"><!-- event summary -->
                                                    <!-- search Table start -->
                                                    <div class="tab-pane fade active in" id="papers"
                                                         style="display: none;">
                                                        <table id="pubsTable"
                                                               class="table table-striped searchHighlight">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($journals as $journal)
                                                                <tr>
                                                                    <td>
                                                                        <b><a href="{!! route('labfront.paper_single',$journal->paper_meta_data ) !!}"
                                                                              style="color: #017ebc" target="_blank"
                                                                              title="read more">{!! $journal->paper_title  !!}</a>
                                                                        </b>
                                                                        <br>
                                                                        Authors:
                                                                        @foreach($journal->users as $user)
                                                                            {!! $user->name !!}, &nbsp;
                                                                        @endforeach
                                                                        <br>
                                                                        Published at
                                                                        : {!! $journal->paper_publish_date !!}
                                                                        <br>
                                                                        <a href="{!! route('labfront.paper_single',$journal->paper_meta_data ) !!}"
                                                                           class="moretag" target="_blank"
                                                                           title="read more">.....MORE</a>
                                                                    </td>
                                                                    <td>{!! $journal->paper_title !!}</td>
                                                                    <td>
                                                                        @foreach($journal->users as $user)
                                                                            {!! $user->name !!} &nbsp;,
                                                                        @endforeach
                                                                    </td>
                                                                    <td>{!! \App\Paper::year($journal->paper_publish_date) !!}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- search Table end -->
                                                </div><!-- event summary end -->
                                            </div>
                                            <!-- tab 1 ends -->
                                            <!-- tab 2 starts -->
                                            <div id="k-tab-profile" class="tab-pane fade active">
                                                <div class="up-event-wrapper"><!-- event summary -->
                                                    <!-- search Table start -->
                                                    <div class="tab-pane fade active in" id="papers">
                                                        {{--<div>--}}
                                                        <table id="pubsTable1"
                                                               class="table table-striped searchHighlight">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($conferences as $conference)
                                                                <tr>
                                                                    <td><b>
                                                                            <a href="{!! route('labfront.paper_single',$conference->paper_meta_data ) !!}"
                                                                               class="moretag" target="_blank"
                                                                               title="read more">{!! $conference->paper_title  !!} </a></b>
                                                                        <br>
                                                                        Authors:
                                                                        @foreach($conference->users as $user)
                                                                            {!! $user->name !!} &nbsp;
                                                                        @endforeach
                                                                        <br>
                                                                        Published at
                                                                        : {!! $conference->paper_publish_date !!}
                                                                        <br>
                                                                        <a href="{!! route('labfront.paper_single',$conference->paper_meta_data ) !!}"
                                                                           style="color: #017ebc" target="_blank"
                                                                           title="read more">.....MORE</a>
                                                                    </td>
                                                                    <td class="hide">{!! $conference->paper_title !!}</td>
                                                                    <td class="hide">
                                                                        @foreach($conference->users as $user)
                                                                            {!! $user->name !!} &nbsp;,
                                                                        @endforeach
                                                                    </td>
                                                                    <td class="hide">{!! \App\Paper::year($conference->paper_publish_date) !!}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- search Table end -->
                                                </div><!-- event summary end -->
                                            </div>
                                            <!-- tab 2 ends -->
                                            <!-- tab 3 starts -->
                                            <div id="k-tab-settings" class="tab-pane fade">
                                                <!-- tab 3 starts -->
                                                <div class="up-event-wrapper"><!-- event summary -->
                                                    <!-- search Table start -->
                                                    <div class="tab-pane fade active in" id="papers">
                                                        <table id="pubsTable2"
                                                               class="table table-striped searchHighlight">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($books as $book)
                                                                <tr>
                                                                    <td><b>
                                                                            <a href="{!! route('labfront.paper_single',$book->paper_meta_data ) !!}"
                                                                               style="color: #017ebc" target="_blank"
                                                                               title="read more">{!! $book->paper_title  !!}</a></b>
                                                                        <br>
                                                                        Authors:
                                                                        @foreach($book->users as $user)
                                                                            {!! $user->name !!} &nbsp;
                                                                        @endforeach
                                                                        <br>
                                                                        Published at : {!! $book->paper_publish_date !!}
                                                                        <br>
                                                                        <a href="{!! route('labfront.paper_single',$book->paper_meta_data ) !!}"
                                                                           class="moretag" target="_blank"
                                                                           title="read more">.....MORE</a>
                                                                    </td>
                                                                    <td class="hide">{!! $book->paper_title !!}</td>
                                                                    <td class="hide">
                                                                        @foreach($book->users as $user)
                                                                            {!! $user->name !!} &nbsp;,
                                                                        @endforeach
                                                                    </td>
                                                                    <td class="hide">{!! \App\Paper::year($book->paper_publish_date) !!}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- search Table end -->
                                                </div><!-- event summary end -->
                                            </div>
                                            <!-- tab 3 ends -->
                                        </div>
                                        <!-- ends tab containers -->
                                    </div>
                                </div>
                                <!-- row end -->
                                {{--Tabber end --}}
                            </div>
                        </div><!-- row end -->
                    </div><!-- inner custom column end -->
                </div><!-- doc body wrapper end -->
                <!-- Side bar Starts -->
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                            <li class="widget-container widget_up_events"><!-- widget -->
                                <h1 class="title-widget">Search Publication</h1>
                                <!-- search box start -->
                                <div class="col-sm-12 col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Title" id="titlebox">
                                        <input type="text" class="form-control" placeholder="Author(s)" id="authorbox">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control span6" placeholder="1999"
                                               pattern="[0-9]*" maxlength="4" id="year_min">
                                        <span class="input-group-btn" style="width:0px;"></span>
                                        <input type="text" class="form-control span6" placeholder="2016"
                                               pattern="[0-9]*" maxlength="4" id="year_max">
                                    </div>
                                </div>
                                <br><br>
                                <!-- search box end -->
                            </li>
                        </ul><!-- widgets end -->
                    </div><!-- inner custom column end -->
                </div><!-- sidebar wrapper end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </div><!-- content wrapper end -->
@endsection
@section('style')
    {!! Html::style('assets/timepicker/bootstrap-datepicker.min.css') !!}
    {!! Html::style('assets/select2/select2.css') !!}
    <style>
        ::placeholder {
            color: #000000 !important;
            opacity: 1; /* Firefox */
        }

        input:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: red;
        }

        input:-ms-input-placeholder { /* Microsoft Edge */
            color: red;
        }

        .dataTables_filter {
            display: none;
        }

        .highlight {
            /*    text-decoration: underline;*/
            font-weight: bold;
            color: #8C1515;
        }

        table {
            border-spacing: 2px;
            border-collapse: separate;
        }

        th {
            background-color: #FAF5F5;
        }

        table td.hide {
            display: none;
        }

        /* hidden columns for sorting etc */
    </style>
@stop
@section('script')
    {!! Html::script('assets/timepicker/bootstrap-datepicker.js') !!}
    {!! Html::script('assets/select2/select2.min.js') !!}
    {!! Html::script('http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js') !!}
    {!! Html::script('http://cdn.datatables.net/plug-ins/1.10.7/features/searchHighlight/dataTables.searchHighlight.min.js') !!}
    {!! Html::script('http://bartaz.github.io/sandbox.js/jquery.highlight.js') !!}
    @include('labfront.includes.publicationSearch')
@stop
