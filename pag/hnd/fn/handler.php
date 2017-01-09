<?php

function mailchk($code)
{
    if(iquery('update Users set mchk=1 where code="'.$code.'"',$_SESSION['eventd_midgard']))
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

function newattrac($data){
    return ("
        <div class='attrac wx bsmoke fn fl fdark sys shadowed' data-code='".$data['code']."'>
            <div class='hmg hpd bt fb flight fred rt trt'>X</div>
            <div class='w2t spd fn fgray lt tlt'>".$data['date']." - ".$data['hour']."</div>
            <div class='w2t spd lt tlt'>".$data['name']."</div>
            <div class='w11 bwhite fdark smg hpd lt justify'>".$data['desc']."</div>
            
        </div>
    "); 
}



function create_attr($attr)
{
    $stts = 0;
    foreach($attr as $a)
    {
        $query = 'insert into Attractions(code,evnt,date,hour,name,`desc`) values('.
                 '"'.$a['code'].'",'.
                 '"'.$a['evnt'].'",'.
                 '"'.$a['date'].'",'.
                 '"'.$a['hour'].'",'.
                 '"'.$a['name'].'",'.
                 '"'.$a['desc'].'")';
        if(iquery($query,$_SESSION['eventd_midgard'])){ $stts++; }
    }
    return $stts;
}