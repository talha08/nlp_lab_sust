<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        {!! Html::favicon('favicon.ico') !!}

        <title>{!! $title  or "Data Science" !!} - {!! Config::get('customConfig.names.siteName')!!}</title>




        <!-- Bootstrap core CSS -->
        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::style('css/bootstrap-reset.css') !!}


                <!--Animation css-->
        {!! Html::style('css/animate.css') !!}


                <!--Icon-fonts css-->
        {!! Html::style('assets/font-awesome/css/font-awesome.css') !!}
        {!! Html::style('assets/ionicon/css/ionicons.min.css') !!}


                <!--Morris Chart CSS -->
        {!! Html::style('assets/morris/morris.css') !!}



                <!-- Custom styles for this template -->
        {!! Html::style('css/style.css') !!}
        {!! Html::style('css/helper.css') !!}
        {{--{!! Html::style('assets/sweet-alert/sweet-alert.min.css') !!}--}}



                <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        {!! Html::script('js/html5shiv.js') !!}
        {!! Html::script('js/respond.min.js') !!}

        <![endif]-->
        @yield('style')







        <!--Start of Zopim Live Chat Script-->
        {{--<script type="text/javascript">--}}
                {{--window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=--}}
                        {{--d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.--}}
                        {{--_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");--}}
                        {{--$.src="//v2.zopim.com/?3tDg903i1sbwDdGDzhY1q8jAwB4NWka6";z.t=+new Date;$.--}}
                                {{--type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");--}}
        {{--</script>--}}
        <!--End of Zopim Live Chat Script-->

</head>