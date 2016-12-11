<!DOCTYPE html>
<html lang="en">
<body role="document">
@include('labfront.includes.header')
@include('labfront.includes.menubar')
<div id="k-body">


<div class="container">



@yield('content')
</div>

</div>
@include('labfront.includes.footer')

</body>
</html>