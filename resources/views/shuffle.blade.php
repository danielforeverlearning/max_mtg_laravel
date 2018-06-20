<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <body>
        <p>shuffle testing</p>
        <p><?php printf("%s", $mydata['deck_name']); ?></p>
        <span>
        <?php
            var_dump($mydata);
            
            //foreach ($mydata[0] as $row)
            //{
            //    printf("<img src='/laravel/resources/images/%s/%s' alt='i can not find this card' />", $mydata['deck_name'], $row->pic_filename);
            //}
		?>
		</span>
    </body>
</html>