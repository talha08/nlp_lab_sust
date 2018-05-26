<div id="k-head" class="container"><!-- container + head wrapper -->

    <div class="row" ><!-- row -->

        <div class="col-lg-12" >


            <div id="k-site-logo" class="pull-left"><!-- site logo -->

                <h1 class="k-logo">
                    <a href="{!! route('labfront.index') !!}" title="Home Page">
                            <br/>
                        <img src="{!! asset('logo.png') !!}" alt="Site Logo" class="img-responsive" height="80" width="80" style=" top: 10px" />

                    </a>
                </h1>

                <a id="mobile-nav-switch" href="#drop-down-left"><span class="alter-menu-icon"></span></a><!-- alternative menu button -->
            </div><!-- site logo end -->



            <nav id="k-menu" class="k-main-navig"><!-- main navig -->

                <ul id="drop-down-left" class="k-dropdown-menu">


                 <!-- Home -->
                    <li></li>
                    <li></li>

                    <li>
                        <a href="{!!  route('labfront.index') !!}" title="Home">Home</a>
                    </li>





                 <!-- People -->

                    <li>
                        <a href="#" class="Pages Collection" title="People">People</a>
                        <ul class="sub-menu">
                            <li><a href="{!! route('labfront.supervisor') !!}">Faculty</a></li>
                            {{--<li><a href="{!! route('labfront.student') !!}">Members</a></li>--}}

                            <li>
                                <a href="{!! route('labfront.student') !!}" class="Pages Collection" title="People">Members</a>
                                <ul class="sub-menu">
                                    <li><a href="{!! route('labfront.underStudent') !!}">UnderGraduate</a></li>
                                    <li><a href="{!! route('labfront.masterStudent') !!}">MS</a></li>
                                    <li><a style="text-transform:initial;" href="{!! route('labfront.student') !!}">PhD</a></li>

                                    <li><a href="{!! route('labfront.scholar') !!}">Visiting Scholar</a></li>
                                    <li><a href="{!! route('labfront.affiliates') !!}">Industry Affiliates</a></li>
                                </ul>
                            </li>

                            <li><a href="{!! route('labfront.alumni') !!}">Alumni</a></li>
                        </ul>
                    </li>






                 <!-- Research -->
                    <li>
                        <a href="#" class="Pages Collection" title="Research">Research</a>
                        <ul class="sub-menu">

                            <li>
                                <a href="#" class="Pages Collection" title="Research Area">Research Area</a>
                                <ul class="sub-menu">
                                    <li><a href="{!! route('labfront.runningProject') !!}" title="Current Projects">Current Projects</a></li>
                                    <li><a href="{!! route('labfront.completeProject') !!}" title="Previous Projects">Previous Projects</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="{!! route('labfront.publication') !!}" class="Pages Collection" title="Publication">Publication</a>
                                <ul class="sub-menu">
                                    <li><a href="{!! route('labfront.journal') !!}" title="Journal">Journal</a></li>
                                    <li><a href="{!! route('labfront.conference') !!}" title="Conference">Conference</a></li>
                                    <li><a href="{!! route('labfront.books') !!}" title="Books">Books</a></li>
                                </ul>
                            </li>


                            {{--<li><a href="{!! route('labfront.paper') !!}">Papers</a></li>--}}
                            <li><a href="{!! route('labfront.award') !!}" title="Awards">Awards</a></li>
                        </ul>
                    </li>




                    <!-- Resource -->
                    <li>
                        <a href="#" class="Pages Collection" title="Resource">Resource</a>
                        <ul class="sub-menu">
                            <li><a href="{!! route('labfront.publicationOthers') !!}" title="News">Publication</a></li>
                            {{--<li><a href="{!! route('labfront.resource') !!}" title="Events">Software</a></li>--}}
                            <li><a href="{!! route('labfront.tutorial') !!}" title="Events">Tutorial</a></li>
                            <li><a href="{!! route('labfront.presentation') !!}" title="Events">Presentation</a></li>
                            <li><a href="{!! route('labfront.book') !!}" title="Events">Books</a></li>
                        </ul>
                    </li>





                    <!-- News & Events -->
                    <li>
                        <a href="#" class="Pages Collection" title="News & event">News & Event</a>
                        <ul class="sub-menu">
                            <li><a href="{!! route('labfront.news') !!}" title="News">News</a></li>
                            <li><a href="{!! route('labfront.events') !!}" title="Events">Events</a></li>
                        </ul>
                    </li>





                <!-- Blog Section -->
                    <li>
                        <a href="{!! route('labfront.blog') !!}" title="Blog">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="{!! route('labfront.blog') !!}">Blogs</a></li>
                            <li><a href="{!! route('labfront.archive_blog') !!}">Archive</a></li>

                        </ul>
                    </li>





                <!-- Join Us -->
                    @if(Auth::user())
                        <li>
                            <a href="{!!  route('dashboard') !!}"  title="Dashboard" style=" color: salmon;">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a href="{!! route('labfront.joinUs') !!}" title="Join us">Join Us</a>
                            {{--<ul class="sub-menu">--}}
                                {{--<li><a href="{!! route('login') !!}">Login</a></li>--}}
                                {{--<li><a href="{!! route('user.create') !!}">Sign Up</a></li>--}}
                                {{--<li><a href="{!! route('labfront.contact') !!}">Contact</a></li>--}}

                            {{--</ul>--}}
                        </li>

                    @endif






                </ul>

            </nav><!-- main navig end -->

        </div>

    </div><!-- row end -->

</div><!-- container + head wrapper end -->

