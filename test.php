<?php
$res = "created the transaction please wait as we process your transaction";


if (ob_get_level() == 0) ob_start();
for ($i = 0; $i<10; $i++){

    echo "<br>";
    echo str_pad('',4096)."\n";    

    ob_flush();
    flush();
    sleep(1);
}

echo "Done.";

ob_end_flush();

?>