<?php
session_start();

include_once('proto/queries.php');

function signup($u)
{
    $c = md5(uniqid(rand()));
    $p = '/var/www/eventd.com/clients/'.$c.'/';
    $q = 'insert into Users(_code,_name,_mail,_user,_pswd,_stts) values
    (
	   "'.$c.'",
       "'.utf8_decode($u['name']).'",
       "'.utf8_decode($u['mail']).'",
	   "'.$u['user'].'",
       "'.hash('sha256', $c.$u['pswd']).'",1
    )';
    if(mkdir($p, 0775, true))
    {
        if(iquery($q,$_SESSION['eventd_yygdrasil']))
        {
            $_SESSION['eventd_user'] = $c;
            setcookie('eventd_user', $c, 60*60*1000, '/');
            return 1;
        }
        rmdir($p);
    }
    return 0;
}


if(isset($_POST['args']))
{
    echo signup($_POST['args']);
}

?>