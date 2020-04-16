<?php //PLEASE, keep this comment with the EURO sign, this source MUST be in utf-8 ---- € déjà
//===========================================================================
function myErrorHandler($errno, $errstr, $errfile, $errline){
 if (!(error_reporting() & $errno)) {
  // Ce code d'erreur n'est pas inclus dans error_reporting(), donc il continue jusqu'au gestionaire d'erreur standard de PHP
  return;
 }
 $ret=array(
  'status'  => 'KO' ,
  'message' => array()
 );
 $message=array();
 switch ($errno) {
  case E_USER_ERROR:   $ret['message'][]="E_USER_ERROR [$errno] PHP "   . PHP_VERSION . " (" . PHP_OS . ")"; break;
  case E_USER_WARNING: $ret['message'][]="E_USER_WARNING [$errno] PHP " . PHP_VERSION . " (" . PHP_OS . ")"; break;
  case E_USER_NOTICE:  $ret['message'][]="E_USER_NOTICE [$errno] PHP "  . PHP_VERSION . " (" . PHP_OS . ")"; break;
  default:             $ret['message'][]="ERROR [$errno] PHP "          . PHP_VERSION . " (" . PHP_OS . ")"; break;
 }
 
 $ret['message'][]="FILE $errfile";
 $ret['message'][]="\nError line $errline of ".basename($errfile)."\n";
 $ret['message'][]="$errstr\n";
 echo json_encode($ret);
 error_log(var_export($ret,true));
 exit(1);
 return true; /* Ne pas exécuter le gestionnaire interne de PHP */
}
$old_error_handler = set_error_handler("myErrorHandler");
session_start();
sleep(0); // similate a slow server with 2 instead of 0
//==============================================================================================================
// when you want to know what arrives on the server, uncomment the line below ( a tail -f toto.log may be useful
// if($fd=fopen('ajax.log','a')){fwrite($fd,"\r\n=============================================\r\n=======".date('Y-m-d H:i:s'). ' INPUT AT LINE ' . __LINE__ ."\r\n".'$_FILES='.var_export($_FILES,true)."\r\n".'$_POST='.var_export($_POST,true)."\r\n".'$_SESSION='.var_export($_SESSION,true)."\r\n"); fclose($fd);}
//
if(isset($_POST)&&sizeof($_POST)>0&&isset($_POST['data'])){
 $ret=array('status' => 'KO','message' => array() );
 $ret['input']=json_decode($_POST['data'],true);
 if(isset($ret['input']['funct'])&&$ret['input']['funct']!=''){
  define('BNF' , 'ajax_'.$ret['input']['funct'].'.php' );
  require_once('inc.php');
  /*
  //
  // I usually put the logic in multiple files in this path : $GLOBALS['glob_incPath1'].'/ajax/ajax_'.$ret['input']['funct'].'.php' 
  // so that only the needed sources are loaded .....
  //
  if(!is_file($GLOBALS['glob_incPath1'].'/ajax/ajax_'.$ret['input']['funct'].'.php')){
   $ret['status']='KO';
   $ret['message'][]='Ajax file not founded : "' . $GLOBALS['glob_incPath1'].'/ajax/ajax_'.$ret['input']['funct'].'.php"';
  }else{
   require_once $GLOBALS['glob_incPath1'].'/ajax/ajax_'.$ret['input']['funct'].'.php';
  }
  */
  //
  // ..... but for this small example, I put it here
  //
  switch( $ret['input']['funct'] ){
   
   //===========================================================================================
   case 'getIsLogged':
    $ret['isLogged']=false;
    if(isset($_SESSION[SESSION_KEY]['login'])){
     $ret['isLogged']=true;
     $ret['currentUser']=$_SESSION[SESSION_KEY]['login'];
    }
    $ret['status']='OK';
   break;
   
   
   //===========================================================================================
   case 'login':
    $ret['isLogged']=false;
    if($ret['input']['login']=='admin' && $ret['input']['password']=='admin' ){   // please use password_verify function here !
     $_SESSION[SESSION_KEY]['login']='admin';
     $ret['isLogged']=true;
     $ret['currentUser']=$_SESSION[SESSION_KEY]['login'];
     $ret['status']='OK';
    }
   break;
   
   
   //===========================================================================================
   case 'logout':
    $ret['isLogged']=false;
    unset($_SESSION[SESSION_KEY]['login']);
    $ret['currentUser']='';
    $ret['status']='OK';
   break;
   
   
   //===========================================================================================
   default:
    $ret['message'][]='Unknown function to treat "'.$ret['input']['funct'].'"';
   break;
   
  }
 }else{
  $ret['status']='KO';
  $ret['message'][]='funct is not defined in the input parameters : "'.var_export($ret['input'],true).'"';
 }
}else{
 $ret['status']='KO';
 $ret['message'][]='post data is not defined : "'.var_export($_POST,true).'"'; 
}
//if($fd=fopen('ajax.log','a')){fwrite($fd,"=======".date('Y-m-d H:i:s'). ' OUTPUT AT LINE ' . __LINE__ ."\r\n".'$_FILES='.var_export($ret,true)."\r\n".'$_SESSION='.var_export($_SESSION,true)."\r\n===============\r\n"); fclose($fd);}
header('Content-Type: application/json');
echo json_encode($ret,JSON_FORCE_OBJECT);
exit(0);
