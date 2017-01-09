<?php
session_start();

function getenvvars($val)
{
    return (isset($_SESSION['eventd_'.$val]) ? $_SESSION['eventd_'.$val] : '0');
}

function setenvvars($fld, $val)
{
    $_SESSION['eventd_'.$fld] = $val;
    if($_SESSION['eventd_'.$fld] == $val)
    {
        return '1';
    }
    return '0';
}

if(isset($_POST['args']['envvars_get']))
{
    echo getenvvars($_POST['args']['val']);
}
else if(isset($_POST['args']['envvars_set']))
{
    echo setenvvars($_POST['args']['var'], $_POST['args']['val']);
}

?>