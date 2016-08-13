<!-- user login dropdown start-->
<li class="dropdown text-center">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

        {{--Checking the user is teacher or student--}}
        @if(Auth::user()->is_teacher ==1 )
        <img alt="" src="{!!asset(Auth::user()->teachers->thumb_url) !!}" class="img-circle profile-img thumb-sm">
        @else
         <img alt="" src="{!!asset(Auth::user()->students->thumb_url) !!}" class="img-circle profile-img thumb-sm">
        @endif
         {{--end checking--}}

        <span class="username">{!! Auth::user()->email !!} </span> <span class="caret"></span>

    </a>

    <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
        <li><a href="{!!route('profile')!!}"><i class="fa fa-briefcase"></i>Profile</a></li>
        <li><a href="{!!route('password.change')!!}"><i class="fa fa-cog"></i> Change Password</a></li>
        <li><a href="{!! route('logout') !!}"><i class="fa fa-sign-out"></i> Log Out</a></li>
    </ul>

</li>
<!-- user login dropdown end -->