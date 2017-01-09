<?php

function conn()
{
    $f = file_get_contents('/var/www/eventd.com/std/fn/proto/conn_cfg.json');
    $f = json_decode($f, true);
    $c = new mysqli($f['host'],$f['user'],$f['pswd'],$f['data']);
    if($c->connect_error) { die('Connection failed: '.$c->connect_error); }    
    return $c;
}

?>
