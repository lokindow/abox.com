<div id='head' class = "pin wx hx bsmoke fblack fn tct">
	<img class='pin smg hid sr shadowed' src='img/splash.png' style='height:70%'>
    <nav class='rt drs spd dys hid'>
        <button class='bsmoke bt fbd sr hid'><div class='fdarkgreen sys hpd sxs lt'>A EMPRESA</div></button>
        <button class='bsmoke bt fbd sr hid'><div class='fdarkgreen sys hpd sxs lt'>CONTATO</div></button>
        <button class='bsmoke bt fbd sr hid'><div class='fdarkgreen sys hpd sxs lt'>PARCEIROS</div></button>
        <button class='bsmoke bt fbd sr hid'>
            <div class='fdarkgreen sys hpd lt'>MENU</div>
            <img class='ni smg lt'src='img/menu-black.png'>
        </button>
        <style>
            #head nav button { border:2px solid whitesmoke;}
            #head nav button:hover { border:2px solid darkgreen;}
        </style>
    </nav>
    <div class='rt spd smg hid'>
        <div class='wx fb flt forange'>SÉRGIO KIYOSHI NODA</div>
        <div class='wx fn flt fdarkgreen'>Engº civil - segurança do trabalho</div>
        <div class='wx fn flt fdarkgreen'>Avaliações e perícias técnicas</div>
        <div class='wx fn flt fgray'>CREA: 50623025-26</div>
    </div>
</div>
<script>
    $('#head img:eq(0)').css({'margin-left':($(this).width()/4)*-1});
    setTimeout(function(){ $('#head img:eq(0)').fadeIn('slow');},400);
    setTimeout(function(){
        $('#head img:eq(0)').fadeOut('fast');
        setTimeout(function(){ $('#head img:eq(0)').css({'margin-left':'-48%','height':'100px'})}   ,200);
        setTimeout(function(){ $('#head img:eq(0)').fadeIn('fast');}                                ,400);
        setTimeout(function(){ $('#head nav:eq(0)').show();}                                        ,400);
        setTimeout(function(){ $('#head nav:eq(0) .bt:eq(3)').fadeIn(1200);}                        ,600);
        setTimeout(function(){ $('#head nav:eq(0) .bt:eq(2)').fadeIn(1200);}                        ,800);
        setTimeout(function(){ $('#head nav:eq(0) .bt:eq(1)').fadeIn(1200);}                        ,1000);
        setTimeout(function(){ $('#head nav:eq(0) .bt:eq(0)').fadeIn(1200);}                        ,1200);
        setTimeout(function(){ $('#head').animate({height:'120px'});}                               ,1600);
        setTimeout(function(){ if(WIDTH>1024){ $('#head > div:eq(0)').fadeIn(); }}                  ,1800);
    }, 2000);
</script>
