<?php

session_start();
include_once('proto/queries.php');

function pswdchk($u, $p){
    $q = 'select * from Users where _code="'.$u.'" and _pswd="'.hash('sha256',$u.$p).'"';
    if(squery($q)){
        $_SESSION['eventd_user'] = $u;
        return 1;
    }
    return 0;
}

if(isset($_POST['args'])){
    echo pswdchk($_POST['args']['user'], $_POST['args']['pswd']);
}

?>