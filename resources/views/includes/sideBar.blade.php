 <!-- Aside Start-->
<aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="#" class="logo-expanded">
                    <i class="ion-social-buffer"></i>
                    <span href="{!!route('dashboard')!!}" class="nav-label">{!! Config::get('customConfig.names.siteName')!!}</span>

                </a>
            </div>
            <!-- / brand -->


            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">

                    <!-- Dashboard -->
                    <li class="{!! Menu::isActiveRoute('dashboard') !!}">
                        <a href="{!!  URL::route( 'dashboard') !!}"><i class="ion-stats-bars"></i>Dash</a>
                    </li>

                    @role('admin')
                    {{--tag--}}
                     <li class="{!! Menu::areActiveRoutes(['tag.index', 'tag.create']) !!}"><a href="#"><i class="ion-bug"></i> <span class="nav-label">Blog Tag</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('tag.index') !!}">
                                <a href="{!!  URL::route( 'tag.index') !!}">All Tag</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('tag.create') !!}">
                                <a href="{!!  URL::route( 'tag.create') !!}">Create Tag</a>
                            </li>
                        </ul>
                    </li>
                    {{--tag end--}}


                    {{--blog --}}
                    <li class="{!! Menu::areActiveRoutes(['blog.index', 'blog.create','blog.own']) !!}"><a href="#"><i
                                    class="ion-compose"></i> <span class="nav-label">Blog</span></a>
                        <ul class="list-unstyled">


                            <li class="{!! Menu::isActiveRoute('blog.index') !!}">
                                <a href="{!!  URL::route( 'blog.index') !!}">All Blog</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('blog.own') !!}">
                                <a href="{!!  URL::route( 'blog.own') !!}">My Blog</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('blog.create') !!}">
                                <a href="{!!  URL::route('blog.create') !!}">Create Blog</a>
                            </li>

                        </ul>
                    </li>
                    {{--end of blog--}}


                    {{--user--}}
                    <li class="{!! Menu::areActiveRoutes(['user.student','user.teacher','user.alumni','user.applyList','auth.userAdd']) !!}"><a href="#"><i
                                    class="ion-person-stalker"></i> <span class="nav-label">Users</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('user.student') !!}">
                                <a href="{!!  URL::route('user.student') !!}">Students</a>
                            </li>
                            <li class="{!! Menu::isActiveRoute('user.teacher') !!}">
                                <a href="{!!  URL::route('user.teacher') !!}">Teachers</a>
                            </li>
                            <li class="{!! Menu::isActiveRoute('user.alumni') !!}">
                                <a href="{!!  URL::route('user.alumni') !!}">Alumni</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('user.applyList') !!}">
                                <a href="{!!  URL::route('user.applyList') !!}">Waiting Users</a>
                            </li>
                            <li class="{!! Menu::isActiveRoute('auth.userAdd') !!}">
                                <a href="{!!  URL::route('auth.userAdd') !!}">Add User</a>
                            </li>

                        </ul>
                    </li>
                    {{--user  end--}}



                    {{--news--}}
                    <li class="{!! Menu::areActiveRoutes(['news.index', 'news.create']) !!}"><a href="#"><i class="ion-android-note"></i> <span class="nav-label">News</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('news.index') !!}">
                                <a href="{!!  URL::route( 'news.index') !!}">All News</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('news.create') !!}">
                                <a href="{!!  URL::route( 'news.create') !!}">Create News</a>
                            </li>
                        </ul>
                    </li>
                    {{--news end--}}

                    {{--event--}}
                    <li class="{!! Menu::areActiveRoutes(['event.index', 'event.create','event.eventFileUpload']) !!}"><a href="#"><i class="ion-speakerphone"></i> <span class="nav-label">Event</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('event.index') !!}">
                                <a href="{!!  URL::route( 'event.index') !!}">All Event</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('event.create') !!}">
                                <a href="{!!  URL::route( 'event.create') !!}">Create Event</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('event.eventFileUpload') !!}">
                                <a href="{!!  URL::route('event.eventFileUpload') !!}">Upload Event File</a>
                            </li>
                        </ul>
                    </li>
                    {{--event end--}}

                    {{--paper--}}
                    <li class="{!! Menu::areActiveRoutes(['paper.index', 'paper.create']) !!}"><a href="#"><i class="ion-ios7-bookmarks-outline"></i> <span class="nav-label">Paper</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('paper.index') !!}">
                                <a href="{!!  URL::route( 'paper.index') !!}">All Paper</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('paper.create') !!}">
                                <a href="{!!  URL::route( 'paper.create') !!}">Add Paper</a>
                            </li>
                        </ul>
                    </li>
                    {{--paper end--}}


                    {{--projectCat--}}
                    {{--<li class="{!! Menu::areActiveRoutes(['projectCat.index', 'projectCat.create']) !!}"><a href="#"><i class="ion-android-mixer"></i> <span class="nav-label">Categoty</span></a>--}}
                        {{--<ul class="list-unstyled">--}}

                            {{--<li class="{!! Menu::isActiveRoute('projectCat.index') !!}">--}}
                                {{--<a href="{!!  URL::route( 'projectCat.index') !!}">All project Category</a>--}}
                            {{--</li>--}}

                            {{--<li class="{!! Menu::isActiveRoute('projectCat.create') !!}">--}}
                                {{--<a href="{!!  URL::route( 'projectCat.create') !!}">Add project Category</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--projectCat end--}}



                    {{--project--}}
                    <li class="{!! Menu::areActiveRoutes(['project.index', 'project.create']) !!}"><a href="#"><i class="ion-ios7-cog"></i> <span class="nav-label">Project</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('project.index') !!}">
                                <a href="{!!  URL::route( 'project.index') !!}">All Project</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('project.create') !!}">
                                <a href="{!!  URL::route( 'project.create') !!}">Add Project</a>
                            </li>
                        </ul>
                    </li>
                    {{--project end--}}


                    {{--book--}}
                    <li class="{!! Menu::areActiveRoutes(['book.index', 'book.create']) !!}"><a href="#"><i class="fa fa-book"></i> <span class="nav-label">Book</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('book.index') !!}">
                                <a href="{!!  URL::route( 'book.index') !!}">All Book</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('book.create') !!}">
                                <a href="{!!  URL::route( 'book.create') !!}">Add Book</a>
                            </li>
                        </ul>
                    </li>
                    {{--book end--}}


                    {{--award--}}
                    <li class="{!! Menu::areActiveRoutes(['award.index', 'award.create']) !!}"><a href="#"><i class="ion-trophy"></i> <span class="nav-label">Award</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('award.index') !!}">
                                <a href="{!!  URL::route( 'award.index') !!}">All Award</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('award.create') !!}">
                                <a href="{!!  URL::route( 'award.create') !!}">Add Award</a>
                            </li>
                        </ul>
                    </li>
                    {{--event end--}}






                    {{--Slider--}}
                    <li class="{!! Menu::areActiveRoutes(['slider.index', 'slider.create']) !!}"><a href="#"><i class="ion-images"></i> <span class="nav-label">Slide Show</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('slider.index') !!}">
                                <a href="{!!  URL::route( 'slider.index') !!}">All Slide</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('slider.create') !!}">
                                <a href="{!!  URL::route( 'slider.create') !!}">Add New Slide</a>
                            </li>
                        </ul>
                    </li>
                    {{--Slider end--}}


                    {{--Welcome Note--}}
                    <li class="{!! Menu::areActiveRoutes(['welcome.index', 'welcome.edit']) !!}"><a href="#"><i class="ion-ios7-pricetag"></i> <span class="nav-label">Welcome Note</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('welcome.index') !!}">
                                <a href="{!!  URL::route( 'welcome.index') !!}">View Welcome Note</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('welcome.edit') !!}">
                                <a href="{!!  URL::route( 'welcome.edit') !!}">Edit Welcome Note</a>
                            </li>
                        </ul>
                    </li>
                    {{--Welcome Note end--}}






                    {{--<li class="{!! Menu::areActiveURLs(['https://dashboard.zopim.com/?first_login#visitor_list/state','https://sustcse.disqus.com/admin/moderate/','help']) !!}"><a href="#"><i--}}
                                    {{--class="ion-ios7-people"></i> <span class="nav-label">Support</span></a>--}}
                        {{--<ul class="list-unstyled">--}}


                            {{--<li class="{!! Menu::isActiveURL('https://dashboard.zopim.com/?first_login#visitor_list/state') !!}">--}}
                                {{--<a href="{!!  URL::to('https://dashboard.zopim.com/?first_login#visitor_list/state') !!}" target="_blank">Chat Support</a>--}}
                            {{--</li>--}}

                            {{--<li class="{!! Menu::isActiveURL('https://sustcse.disqus.com/admin/moderate') !!}" >--}}
                                {{--<a href="{!!  URL::to('https://sustcse.disqus.com/admin/moderate') !!}" target="_blank">Comment Moderate</a>--}}
                            {{--</li>--}}

                            {{--<li class="{!! Menu::isActiveURL('help') !!}" >--}}
                                {{--<a href="{!!  URL::to('help') !!}" >Account Information</a>--}}
                            {{--</li>--}}

                        {{--</ul>--}}
                    {{--</li>--}}


                    @endrole


                    @role('user')

                    <li class="{!! Menu::areActiveRoutes(['blog.create','blog.own']) !!}"><a href="#"><i
                                    class="ion-compose"></i> <span class="nav-label">Blog</span></a>
                        <ul class="list-unstyled">


                            <li class="{!! Menu::isActiveRoute('blog.create') !!}">
                                <a href="{!!  URL::route('blog.create') !!}">Create Blog</a>
                            </li>

                            <li class="{!! Menu::isActiveRoute('blog.own') !!}">
                                <a href="{!!  URL::route( 'blog.own') !!}">My Blog</a>
                            </li>


                        </ul>
                    </li>



                    @endrole


                </ul>
            </nav>
</aside>
        <!-- Aside Ends-->



