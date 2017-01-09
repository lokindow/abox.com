////////////////////////// OBJECTS ///////////////////////////////
var WIDTH   = $(window).width();
var HEIGHT  = $(window).height();
var MSGS	= $('message');
var POPS	= $('popup');
var HEAD 	= $('header');
var HOME	= $('home');
var LOAD    = $('loading');

/////////////////////////// FUNCTIONS /////////////////////////////
function setcookie(n, v, t){
    var d = new Date();
    d.setTime(d.getTime()+t);
    var e = 'expires='+ d.toUTCString();
    document.cookie = 'shimada_'+n + '=' + v + ';' + e + ';path=/';
    if(getcookie(n)){ return 1; }
    return 0;
}

function getcookie(n){
    var name = 'shimada_' + n + '=';
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++){
        var c = ca[i];
        while(c.charAt(0)==' '){
            c = c.substring(1); 
        }
        if(c.indexOf(name) == 0){
            return c.substring(name.length,c.length); 
        }
    }
    return 0;
}

function loading(tic){
    if(tic){
        LOAD.fadeIn('fast');
        setTimeout(function(){ LOAD.hide(); },5000)
    }else setTimeout(function(){ LOAD.hide(); },200);
}

// adjust menu and home containers
function adjust(){
    $('body').css({'min-height':$(window).height()});
    HOME.animate({
        'top':HEAD.height()-12,
        'left':'0px',
        'width':'100%'
    }, 'slow');
}

// carrega qualquer pagina requisitada no container informado
function std_require_page(url,target){
    loading(true);
    $.ajax({ 
        url:'pag/'+url+'.php',
        async:false,
        cache:false,
        success:function(data){ target.hide().html(data).fadeIn('slow'); },
        error:function(){ advise('error loading: '+url); }
    }).done(function(){ loading(false); });
}

// carrega as funções da pasta fn em php passando parametros via POST
function call(fn,obj){
    loading(true);
    var t = 0;
    $.ajax({
        type:'post',
        url:'pag/'+fn+'.php',
        async:false,
        cache:false,
        data: { obj:obj },
        success:function(data){ t = data; },
        error:function(){ advise('Erro ao processar: '+fn); }
    }).done(function(){ loading(false); });
    return t;
}
// CALL IMPLEMENTATIONS
function intcall(fn, obj)   { return parseInt(call(fn, obj)); }
function fltcall(fn, obj)   { return parseFloat(call(fn, obj)); }
function strcall(fn, obj)   { return call(fn, obj); }

/* UI */
function propertytile(i)    { return strcall('ui/propertytile',   {prop:i}); }
function propertyview(i)    { return strcall('ui/propertyview',   {prop:i}); }
function getproprow(i)      { return strcall('ui/propertyrow',    { prop:i }); }

/* HND */
function squery(q)          { return intcall('hnd/squery',        { sqls:q }); }
function codeof(u)          { return strcall('hnd/codeof',        { user:u }); }
function removefolder(i)    { return intcall('hnd/removefolder',  { prop:i }); }
function iquery(q,p)        { return intcall('hnd/iquery',        { sqli:q, pass:p }); }
function pswdchk(u, p)      { return intcall('hnd/pswdchk',       { user:u, pswd:p }); }
function pswdcge(u,n)       { return intcall('hnd/pswdcge',       { user:u, npwd:n }); }
function getcell(t,f,r)     { return strcall('hnd/getcell',       { tabl:t, fild:f, rest:r }); }
function signin(u,p,k)      { return intcall('hnd/signin',        { user:u, pswd:p, keep:k }); }
function useradd(n,m,p)     { return intcall('hnd/useradd',       { name:n, mail:m, pswd:p }); }
function fillselect(t,f,r,s){ return strcall('hnd/fillselect',    { tabl:t, fild:f, rest:r, selt:s }); }

/* FN */
function gethash(s)         { return strcall('hnd/fn/gethash',    { size:s }); }
function getenvvars(f)      { return strcall('hnd/fn/envvars',    { envv:0, fild:f }); }
function setenvvars(f,v)    { return intcall('hnd/fn/envvars',    { envv:1, fild:f, valr:v }); }

/* MISC */
function advise(a)          { MSGS.hide().html(call('ui/advise', {advs:a})).fadeIn(); }
function logoff()           { $.get('pag/hnd/fn/logoff.php').done(function(){ location.reload(); }); }
function err()              { advise('Ops! Desculpe, mas algo deu errado...'); }