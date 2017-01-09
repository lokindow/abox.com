<?php

include_once('proto/getcell.php');

if(isset($_POST['args']))
{
    echo getcell($_POST['args']['tab'],$_POST['args']['fld'],$_POST['args']['res']);
}
?>