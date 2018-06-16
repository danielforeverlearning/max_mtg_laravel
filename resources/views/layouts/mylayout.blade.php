<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>begin from mylayout - @yield('title') - end from mylayout</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar from mylayout.
        @show

        <div class="container">
			<p>start of container inside mylayout</p>
            @yield('content')
        </div>
    </body>
</html>