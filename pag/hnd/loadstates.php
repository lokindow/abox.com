<?php

include_once('proto/queries.php');

if(isset($_POST['args']))
{
    $q = 'select _code,_name from States where _coun='.$_POST['args'];
    $s = oquery($q);
    if($s->num_rows)
    {
        while($t = $s->fetch_assoc())
        {?><option value='<?=$t['_code']?>' <?=($t['_code']==26?'selected':'')?>><?=utf8_encode($t['_name'])?></option><?php }
    }
}

?>