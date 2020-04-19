<?php
include 'inc.php';
session_start(); // in a multipage applivation you may have some pages that don't need sessions like about-us.php.
// Here starts the specific of each page.
// The index/home page does not need the "if(isset($_POST['action'])){...}" block but the login page, surely !
//========================= post actions ================================
if(isset($_POST['action'])){
 $redir='monopage_php.php';
 if($_POST['action']=='login'){
  if($_POST['login']=='admin' && $_POST['password']=='admin'){  // please use password_verify function here !
   $_SESSION[SESSION_KEY]['login']='admin';
   $redir='monopage_php.php';
  }else{
   $_SESSION[SESSION_KEY]['message']='wrong user or password !';
   $redir='monopage_php.php?action=login';
  }
 }else if($_POST['action']=='logout'){
  unset($_SESSION[SESSION_KEY]['login']);
 }
 // is very important ! At the end of a post action, always redirect to a GET ( unless you are in ajax treatment )
 header('Location: ./'.$redir);// always a redirect after POST
 exit(0);
}
//========================= get actions =================================
if(!ob_start("ob_gzhandler")) ob_start(); // optional
$htm1='';
if(isset($_GET['action']) && $_GET['action']=='login'){
 $htm1.=myHeader(array('t'=>'monopage login'));
}else{
 $htm1.=myHeader(array('t'=>'monopage home'));
}
// the content of the page, using the session values when they are set
echo $htm1; $htm1='';
if(isset($_GET['action']) && $_GET['action']=='login'){
 if(!isset($_SESSION[SESSION_KEY]['login'])){
  $htm1.='<form autocomplete="off" method="post" enctype="multipart/form-data">';
  $htm1.='login<input name="login" type="text" maxlength="32" size="32" value="" autocomplete="off" /> ( try admin )<br />';
  $htm1.='password<input name="password" type="password" maxlength="32" size="32"  value="" autocomplete="off" /> ( try admin )<br />';
  $htm1.='<input name="action" value="login" type="submit">';
  $htm1.='</form>';
 }
}
if(isset($_SESSION[SESSION_KEY]['login'])){
 $htm1.='Hello "'.$_SESSION[SESSION_KEY]['login'].'"';
 $htm1.='<form autocomplete="off" method="post" enctype="multipart/form-data">';
 $htm1.='<input type="submit" name="action" value="logout">';
 $htm1.='</form>';
}else{
 if(!(isset($_GET['action']) && $_GET['action']=='login')){
  $htm1.='Hello anonyme, vous pouvez vous <a href="monopage_php.php?action=login">logguer ici.</a>';
 }
}
if(isset($_SESSION[SESSION_KEY]['message'])){
 $htm1.='<div>'.$_SESSION[SESSION_KEY]['message'].'</div>';
 unset($_SESSION[SESSION_KEY]['message']);
}
$htm1.=myFooter(array());
echo $htm1; $htm1='';
