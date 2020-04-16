<?php
define('BNF',basename( __FILE__ ));
session_start();
include 'inc.php';
//========================= post actions ================================
if(isset($_POST['action'])){
 $redir='./';
 if($_POST['action']=='login'){
  // en fait, il faut aussi vérifier que la requête provient de la page en cours, cela peut être fait par un captcha
  if($_POST['login']=='admin' && $_POST['password']=='admin'){ // please use password_verify function here !
   $_SESSION[SESSION_KEY]['login']='admin';
   $redir='./';
  }else{
   $_SESSION[SESSION_KEY]['message']='wrong user or password !';
   $redir='index_multi_login.php';
  }
 }else if($_POST['action']=='logout'){
  unset($_SESSION[SESSION_KEY]['login']);
 }
 header('Location: '.$redir);// always a redirect after POST
 exit(0);
}
//========================= get actions =================================
if(!ob_start("ob_gzhandler")) ob_start(); // optional
$htm1='';
$htm1.=myHeader(array('t'=>'multipage login'));
echo $htm1; $htm1='';
if(!isset($_SESSION[SESSION_KEY]['login'])){
 $htm1.='<form autocomplete="off" method="post" enctype="multipart/form-data">';
 $htm1.='login<input name="login" type="text" maxlength="32" size="32" value="" autocomplete="off" /> (admin)<br />';
 $htm1.='password<input name="password" type="password" maxlength="32" size="32"  value="" autocomplete="off" /> (admin)<br />';
 $htm1.='<input name="action" value="login" type="submit">';
 $htm1.='</form>';
}
if(isset($_SESSION[SESSION_KEY]['login'])){
 $htm1.='Hello "'.$_SESSION[SESSION_KEY]['login'].'"';
 $htm1.='<form autocomplete="off" method="post" enctype="multipart/form-data">';
 $htm1.='<input type="submit" name="action" value="logout">';
 $htm1.='</form>';
}
if(isset($_SESSION[SESSION_KEY]['message'])){
 $htm1.='<div>'.$_SESSION[SESSION_KEY]['message'].'</div>';
 unset($_SESSION[SESSION_KEY]['message']);
}
$htm1.=myFooter(array());
echo $htm1; $htm1='';
