<?php

include_once('proto/queries.php');

if($_POST['args'])
{
    echo squery($_POST['args']);
}

?>  