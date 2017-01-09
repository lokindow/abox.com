<?php

include_once('conn.php');

// usado para inserções ao banco de dados, o código passado
// junto à instrução SQL, serve para dificultar o acesso à
// intrusões
function iquery($q,$code){
    if($code == $_SESSION['eventd_yygdrasil']){
        $_SESSION['eventd_yygdrasil'] = md5(uniqid(rand()));
        if((conn()->query($q))){
            return 1;
        }
    }
    return 0;
}

// através de instruções selects retorna o numero de registros
function squery($q){
    return (conn()->query($q))->num_rows;
}


// retorna o set de registros de acordo com o select
function oquery($q){
    $t = conn()->query($q);
    return ($t->num_rows ? $t : 0);
}

?>