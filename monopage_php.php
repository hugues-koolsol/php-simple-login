<?php
define('CRLF',"\r\n"); // always useful
define('SESSION_KEY','myapp1'); // useful if you have multiple applications on the same server, each login from different application is different.
session_start(); // in a multipage applivation you may have some pages that don't need sessions like about-us.php.
//========================= function header =============================
function myHeader($opt=array()){ // The two function myHeader and myFooter are generic and should be put in the inc.php file.
 $t='<!DOCTYPE html><html lang="fr"><head><meta charset="utf8" />';
 $t.='<title>'.$opt['t'].'</title>';
 $t.='<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">';
 $t.='  <style type="text/css">'.CRLF;
 $t.='html{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}'.CRLF;
 $t.='*,*:before,*:after{-webkit-box-sizing:inherit;-moz-box-sizing:inherit;box-sizing:inherit;padding:0;border:0;}'.CRLF;
 $t.='body{color:navy;overflow-y:scroll;}a,a:visited{border:2px #ddd outset;border-radius:5px;}.navy{color:navy;}.green{color:green;}.black{color:#444;}'.CRLF;
 $t.='input[type=password],input[type=text]{padding: 2px;border:1px #ddd inset;}'.CRLF;
 $t.='input[type=submit]{padding: 4px;border:1px #ddd outset;}'.CRLF;
 $t.='a{display:inline-block;min-height:31px;border:2px #eee outset;padding:3px;}'.CRLF;
 $t.='#menu{display:flex;justify-content: space-evenly;}'.CRLF;
 $t.='  </style>'.CRLF;
 $t.='</head>';
 $t.='<body>';
 $t.='<div id="main"><div id="menu"></div>';
 $t.='<h1>'.$opt['t'].'</h1>';
 return $t;
}
//========================= function footer =============================
function myFooter($opt=array()){ // The two function myHeader and myFooter are generic and should be put in the inc.php file.
 $t='</div><!-- main --><script src="js-main-v20200416-1.js" async></script></body></html>';return $t;
}
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
