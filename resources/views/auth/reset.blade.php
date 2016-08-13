<!DOCTYPE Html>
<Html lang="en">



@include('includes.header')



<body>

<div class="wrapper-page animated fadeInDown">
	<div class="panel panel-color panel-primary">
		<div class="panel-heading">
			<h3 class="text-center m-t-10"> Reset Password || <strong>Data Science Lab</strong></h3>
		</div>
		<br>

		@include('includes.alert')



		{!! Form::open(['class' => 'form-signin']) !!}

		<input type='hidden' name='token' value="{!!$token!!}">
		<br/>
		{!! Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address', 'autofocus')) !!}
		<br/>
		{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'New Password')) !!}
		<br/>
		{!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm New Password')) !!}
		<br/>
		{!! Form::submit('Reset Password', array('class' => 'btn btn-lg btn-login btn-block btn-purple ')) !!}
		<br/>
		<br/>


		{!! Form::close() !!}

	</div>
</div>





</body>
<!-- js placed at the end of the document so the pages load faster -->
{!! Html::script('js/jquery.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/pace.min.js') !!}
{!! Html::script('js/wow.min.js') !!}
{!! Html::script('js/jquery.nicescroll.js') !!}

		<!--common script for all pages-->
{!! Html::script('js/jquery.app.js') !!}

</Html>
