<?php
define('BNF',basename( __FILE__ ));
session_start();
include 'inc.php';
//========================= get actions =================================
if(!ob_start("ob_gzhandler")) ob_start(); // optional

$htm1='';
$htm1.=myHeader(array('t'=>'basic multipage home'));

echo $htm1; $htm1='';
if(isset($_SESSION[SESSION_KEY]['login'])){
 $htm1.='Hello "'.$_SESSION[SESSION_KEY]['login'].'"';
 $htm1.='<form autocomplete="off" method="post" enctype="multipart/form-data" action="index_multi_login.php">';
 $htm1.='<input type="submit" name="action" value="logout">';
 $htm1.='</form>';
}else{
 if(!(isset($_GET['action']) && $_GET['action']=='login')){
  $htm1.='Hello anonymous, you can <a href="index_multi_login.php">log here</a>';
 }
}
echo $htm1; $htm1='';

?>

<div style="color:navy;">
 <h2>Il y a 3 exemples de sites web pages dans ces pages.</h2>
 <p>
 Chaque exemple de site contient une page d'accueil et une page de login.
 </p>

 <div style="color:navy;">
  <h3>Site web en multipage php</h3>
  <p>
    Ce premier exemple est le plus simple, il contient deux pages php faisant appel à une page commune "inc.php".
  </p>
  <p>
    C'est de loin l'exemple que je préfère car le plus souple, le plus simple à maintenir et à mettre en oeuvre.
  </p>
 </div>
 
 
 
 <div style="color:black;">
  <h3>Site web en mono page php</h3>
  <p>
  Ce deuxième exemple a été développé pour faire un essai.
  </p>
  <p>
  Tout est rassemblé dans une seule page php. 
  <br />
  Les frameworks php sont basés sur ce principe mais contiennent plusieurs pages php qui sont incluses en fonction de l'action requise.
  <br />
  J'ai beaucoup de mal à travailler avec ce modèle !
  </p>
 </div>



 
 
 <div style="color:green;">
  <h3>Site web en javascript</h3>
  <p>
   Ce deuxième exemple a été développé en javascript.
  </p>
  <p>
   Un "gros" javascript contient ce qui est affiché et la plupart des traitements.
   <br />
   Une partie serveur doit être toutefois implémentée pour certains traitements. Par exemple, les login/mots de passe des utilisateurs sont normalement sur le serveur ( enfin, j'espère ) et il faut aller vérifier les connexions sur le serveur.
  </p>
  <p>
   Un javascript supplémentaire contient quelques exemples trouvés dans svelte.js. 
   <br />
   J'étais curieux de voir comment implémenter des fonctions de framowork javascript et je touve que le résultat est assez simple.
  </p>
 </div>




 <div>
  <h3>Conclusion</h3>
  Pour rappel, les 5 technologies de base qui servent à développer des sites, qu'ils soient de type back office ou front office sont :
  <ul>
   <li>Coté serveur : un language, par exemple php, GO, java, node, ... </li>
   <li>Coté serveur : une base de donnée</li>
   <li>Coté client  : HTML</li>
   <li>Coté client  : javascript</li>
   <li>Coté client  : css</li>
  </ul>
  <p>
   Chacune de ces technologie prêche pour sa paroisse et résultat pratique, on peut se trouver avec des usines à gaz qui mélangent "ce qui se fait de mieux" 
   dans chacune des technomogies.
  </p>   
   
  <p>
   Ce mélange devient une catastrophe quand il faut maintenir un site un peu complexe. Je ne parle pas de sites "simples" tels que les blogs ou les vitrines.
   <br />
   Pour ces derniers, il existe des CMS ( content management system ) qui font très bien l'affaire et permettent à des utilisateurs non informaticiens de gérer
   leurs pages assez simplement.
  </p>   
   
  <p>
   Pour les sites un peu plus complexes, vous devez intégrer dans vos équipes des "spécialistes" dans chaque technologie.
   <br />
   Chaque spécialiste verra le site selon son point de vue et je ne parle pas des versions des technologies qui changent plus ou moins régulièrement.
  </p>   
   
  <p>
   Conclusion de la conclusion : 
   <ul>
    <li>Commencez par faire des sites en language serveur en multipage.</li>
    <li>Mettez vos composants métier dans les fichiers à inclure en fonction des pages</li>
    <li>Soupoudrez de javascript et de css</li>
   </ul>
  </p>   
   
   
 </div> 
 
</div>
<?php
$htm1.=myFooter(array());
echo $htm1; $htm1='';
