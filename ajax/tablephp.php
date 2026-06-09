<?php

$num = (int)$_GET['num'];

for($i=1;$i<=10;$i++ ){

    $ans= $num*$i;
    echo "$num x $i = $ans<br>";
}

?>