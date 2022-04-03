<?php
date_default_timezone_set( 'Asia/Dhaka' );
$CurrentTime = time();

$DateTime = strftime( '%B-%d-%Y %H:%M:%S', $CurrentTime );
echo $DateTime;
?>
<?php
//This Is the sql format for date and time
?>
