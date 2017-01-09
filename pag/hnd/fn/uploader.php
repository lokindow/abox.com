<?php
session_start();
include_once('queries.php');

$mxsz = 2000;
$vext = array('.jpeg', '.jpg', '.gif', '.png', '.tiff');

$ex = strtolower(strrchr($_FILES['pic']['name'], '.'));
$flsz = round($_FILES['pic']['size'] / 1024, 1);

$path = $_POST['url0'];

if(in_array($ex, $vext))
{
	if($flsz < $mxsz)
	{
		if(!is_dir($path)) { mkdir($path, 0775, true); }
		if(move_uploaded_file($_FILES['pic']['tmp_name'], $path.$_POST['name']))
        {
            echo '1';
		}
        else
        {
			echo '0';
		}
	}
    else
    {
		echo 'Tamanho máximo excedido!!! ('.$mxsz.'KB)';
	}
}
else
{
	echo 'Tipo não suportado!!! (jpg/jpeg/gif/png)';
}

?>