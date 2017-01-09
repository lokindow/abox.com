<?php

include_once('proto/queries.php');

if(isset($_POST['args']))
{
    $q = 'select _code,_name from Cities where _stat='.$_POST['args'];
    $c = oquery($q);
    if($c->num_rows)
    {
        while($t = $c->fetch_assoc())
        {?><option value='<?=$t['_code']?>' <?=($t['_code']==5265 ? 'selected' : '')?>><?=utf8_encode($t['_name'])?></option><?php }
    }
}


?>