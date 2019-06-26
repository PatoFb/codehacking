<!DOCTYPE html>
<html lang="en">

@include('includes.front_header')

<link href="{{asset('css/libs.css')}}" rel="stylesheet">
<link href="{{asset('css/app.css')}}" rel="stylesheet">

<body>

<!-- Navigation -->
@include('includes.front_nav')

<!-- Page Content -->
<div class="container">

    @yield('content')
    <!-- /.row -->


    <!-- Footer -->
    @include('includes.front_footer')

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>