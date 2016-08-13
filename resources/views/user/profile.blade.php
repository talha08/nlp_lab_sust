@extends('layouts.default')
@section('content')
	@include('includes.alert')





		<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						@if($user->is_teacher == 1)
							{!! Html::image($user->teachers->img_url, 'alt', array('class'=>"  img-responsive")) !!}
						@else
							{!! Html::image($user->students->img_url, 'alt', array('class'=>"  img-responsive")) !!}
						@endif
					</div>



					<div class="profile-usertitle">


						<div class="profile-usertitle-job">

							@if($user->is_teacher == 1)
								<br/> <h4> &emsp;<b>{!!$user->teachers->position!!}</b></h4>
							@else
								<br/>  <h5>&emsp;  &emsp;<b>  {!! $user->students->year!!}</b>year <b>  &emsp;{!! $user->students->semester!!}</b> semester</h5>

								  <h4> &emsp;&emsp;<b>  {!! $user->students->position!!}</b></h4>
							@endif

						</div>

					</div>



					<div class="profile-usermenu">
						<ul class="nav">
							<li class="">

						</ul>
					</div>
					<!-- END MENU -->
				</div>
			</div>
			<div class="col-md-8">
				<div class="profile-content">
					<div>

						<h4><b>Basic Information</b></h4>
						<div class="product_meta">
							@if($user->is_teacher == 1)
								<span class="posted_in"> <strong>Name:</strong> {!!$user->name!!}</span><br/>
								<span class="posted_in"> <strong>Email:</strong>  {!!$user->email!!}</span><br/>
								<span class="posted_in"> <strong>Phone:</strong> {!!$user->teachers->phone!!}</span><br/>
								<span class="posted_in"><strong>Githb:</strong> {!!$user->teachers->github_user!!}</span><br/>
								<span class="posted_in"><strong>Linked In:</strong> {!!$user->teachers->linkedIn_user!!}</span><br/>
						    @else
								<span class="posted_in"> <strong>Name:</strong> {!!$user->name!!}</span><br/>
								<span class="posted_in"> <strong>Email:</strong>  {!!$user->email!!}</span><br/>
								<span class="posted_in"> <strong>Phone:</strong> {!!$user->students->phone!!}</span><br/>
								<span class="posted_in"><strong>Githb:</strong> {!!$user->students->github_user!!}</span><br/>
								<span class="posted_in"><strong>Linked In:</strong> {!!$user->students->linkedIn_user!!}</span><br/>
							@endif
                               <br/>
							@if($user->status == 0)
									<a class="btn btn-success  btn-archive" href="{!!route('user.approve',$user->id)!!}"  style="margin-right: 3px;">Approve This User</a>
							@endif

						</div>

					</div>
				</div>
			</div>
		</div>


		<br>
    </div>


@stop

