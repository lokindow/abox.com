<?php

include_once('proto/getcell.php');

function codeof($u)
{
    return getcell('Users', '_code', '_user="'.$u.'"');
}

if(isset($_POST['args']))
{
    echo codeof($_POST['args']);
}

?>