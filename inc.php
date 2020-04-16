<?php
define('CRLF',"\r\n"); // always useful
define('SESSION_KEY','myapp1');
//========================= function header =============================
function myHeader($opt=array()){
 if(!defined('BNF')){
  define('NBF','mono');
 }
 $t='<!DOCTYPE html>'.CRLF;
 $t.='<html lang="fr">'.CRLF;
 $t.=' <head>'.CRLF;
 $t.='  <meta charset="utf8" />'.CRLF;
 $t.='  <title>'.$opt['t'].'</title>'.CRLF;
 $t.='  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">'.CRLF;
 $t.='  <style type="text/css">'.CRLF;
 $t.='html{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}'.CRLF;
 $t.='*,*:before,*:after{-webkit-box-sizing:inherit;-moz-box-sizing:inherit;box-sizing:inherit;padding:0;border:0;}'.CRLF;
 $t.='body{color:navy;overflow-y:scroll;}a,a:visited{border:2px #ddd outset;border-radius:5px;}.navy{color:navy;}.green{color:green;}.black{color:#444;}'.CRLF;
 $t.='input[type=password],input[type=text]{padding: 2px;border:1px #ddd inset;}'.CRLF;
 $t.='input[type=submit]{padding: 4px;border:1px #ddd outset;}'.CRLF;
 $t.='a{display:inline-block;min-height:31px;border:2px #ddd outset;padding:3px;}'.CRLF;
 $t.='#menu{display:flex;justify-content: space-evenly;}'.CRLF;
 $t.='  </style>'.CRLF;
 $t.=' </head>'.CRLF;
 $t.=' <body>'.CRLF;
 $t.='  <div id="main">'.CRLF;
 $t.='   <div id="menu">'.CRLF;
 // ici on devrait afficher les menus en fonction du profil utilisateur.
 // Pour une question de simplicété de ce site, je ne l'ai pas fait.
 // Le menu dans ce site est géré dans le javascript plus bas qui est commun à toutes les pages
 $t.='   </div>'.CRLF;
 $t.='  <h1>'.$opt['t'].'</h1>'.CRLF;
 return $t;
}
//========================= function footer =============================
function myFooter($opt=array()){
 $t='   </div><!-- main -->'.CRLF;
 $t.='  <script src="js-main-v20200416-1.js" async></script>'.CRLF; // Mettre async , c'est bien :-)
 $t.=' </body>'.CRLF;
 $t.='</html>';
 return $t;
}
