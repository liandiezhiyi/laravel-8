<!-- Stored in app/views/layouts/master.blade.php -->

<html>
<body>
@section('sidebar')
This is the master sidebar.
@show

<div class="container">

   <!-- {{$test ?? ''}}-->
    {{$name ?? ''}}----------------------{{$age ?? ''}}
    {{$data['name'] ?? ''}}--------------------{{$data['age'] ?? ''}}
    @yield('content')
</div>
</body>
</html>
