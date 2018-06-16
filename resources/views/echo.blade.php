<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <body>
        <p>hello this is echo testing mysql database select</p>
        <?php
            foreach ($myrows as $myrow)
            {
                printf("<h1>%s %s</h1>", $myrow->id, $myrow->name);
            }
		?>
    </body>
</html>