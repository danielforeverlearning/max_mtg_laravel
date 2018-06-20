<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <body>
        <h1>hello {{ $myviewname }} ..... this is charlie page.</h1>
        <h1>myteststr =  {{ $myteststr }} ..... proves no object persistency beyond page loads need database for state preservation </h1>
    </body>
</html>