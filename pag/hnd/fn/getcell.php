<?php

include_once('conn.php');

// seleciona o valor de um campo(f) em uma tabela(t)
// com base em restrições(r)
function getcell($t, $f, $r)
{
    $r = ($r ? ' where '.$r : '');
    $r = conn()->query('select '.$f.' from '.$t.$r);
    if($r->num_rows)
    {
        return ($r->fetch_assoc())[$f];
    }
    return 0;
}

?>