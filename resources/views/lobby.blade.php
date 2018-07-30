<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <body>
        <p>Lobby</p>
        <span>
        <?php
            $secondsWait = 5;
            header("Refresh:$secondsWait");
            printf("Refreshing every 5 seconds ..... %s<br></br>", date('Y-m-d H:i:s'));
            
            var_dump($mydata);
		?>
		</span>
    </body>
</html>