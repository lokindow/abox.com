<?php
session_start();

include_once('proto/queries.php');

if($_POST['args'])
{
    print(iquery($_POST['args']['sqli'],$_POST['args']['pswd']));
}

?>  