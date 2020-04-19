<?php
define('BNF',basename( __FILE__ ));
include 'inc.php';
//========================= get actions =================================
if(!ob_start("ob_gzhandler")) ob_start(); // optional

$htm1='';
if(isset($_GET['action']) && $_GET['action']=='login'){
 $htm1.=myHeader(array('t'=>'monopage ajax login','nomain'=>true));
}else{
 $htm1.=myHeader(array('t'=>'monopage ajax home','nomain'=>true));
}
echo $htm1; $htm1='';

?>
  <div id="main"></div>
  <style>
  h2{border-top:3px red solid;}
  h3{border-top:1px red solid;}
  </style>
  
  <div id="Exemples">
   <style>
    #sortableTodo{border:0px blue solid;display:flex;}
    #sortableTodo li{border:1px yellow outset;min-height:50px;display:flex;align-items:center;justify-content: space-between;}
    #sortableTodo ul{width:150px;min-height:52px;}
    .boxtodo{border:1px #ccc solid;}
    .delTodo{border:2px red outset;cursor:pointer;border-radius:5px;color:red;height:40px;min-width:35px;align-items: center;text-align: center;justify-content: center;line-height: 35px;}
    #foo .delTodo{display:none;}
    .smiley{border:2px plum outset;cursor:pointer;border-radius:5px;color:red;height:40px;min-width:35px;align-items: center;text-align: center;justify-content: center;line-height: 35px;}
    #bar .smiley{display:none;}
    .elt1{cursor:pointer;min-height:40px;min-width:111px;}
   </style>

   <h2>Exemples divers.</h2>
   <h3>Une todo triable</h3>
   <p>
    Attention : les todos de cette liste ne sont pas enregistrés, ce n'est qu'un exemple !
   </p>
   
   <p>
    Si vous voulez une vraie todo liste qui sera enregistrée dans votre appareil, allez sur <a target="_blank" rel="noopener" href="https://todo.koolsol.app">todo.koolsol.app</a>
   </p>
   
   
   <input id="inp5" value="nouveau todo !" type="text" size="16" maxlength="128">
   <button id="addTodo">ajouter ce todo</button>
   <div id="sortableTodo" style="">
   
    <div class="boxtodo">
     Todo :-\
     <ul id="foo" style="border:1px blue solid;">
      <li><button class="elt1">Ça c'est à faire et on peut ajouter un smiley avec le bouton ci-contre</button><button class="delTodo">✘</button><button class="smiley">🤡</button></li>
      <li><button class="elt1">On peut faire glisser ce todo dans lla colonne "Done :-)" puis le remettre dans cette colonne</button><button class="delTodo">✘</button><button class="smiley">🤡</button></li>
      <li><button class="elt1">On peut aussi déplacer ce todo dans cette colonne</button><button class="delTodo">✘</button><button class="smiley">🤡</button></li>
      <li><button class="elt1">On peut aussi modifier ce todo en cliquant dessus</button><button class="delTodo">✘</button><button class="smiley">🤡</button></li>
     </ul>
    </div>
    
    
    <div class="boxtodo">
     Done :-)
     <ul  id="bar" style="border:1px green solid;">
      <li><button class="elt1">Ca, c'est fait et on peut l'effacer avec le bouton "✘" ci-contre.</button><button class="delTodo">✘</button><button class="smiley">🤡</button></li>
     </ul>
    </div>
    
    
   </div>  
  </div>

  
  
  
  <div id="svelt">
  
   <h2>Des exemples trouvés sur Svelte.js</h2>
   
   <p>
    Une petite mise en oeuvre d'exemples trouvés sur le <a  target="_blank" rel="noopener"  href="https://svelte.dev/">framework svelte</a>
   </p>
   <h3>Click</h3>
   
   <p>
    <style>
    #click1{
     font-size:1.5em;
     touch-action: manipulation; /* prevent double click zoom on touch device */
    }
    </style>
    <button id="click1" onclick="">Please wait!</button>
   </p>
   
   <h3>Calculatrice</h3>
   <p>
   <input id="inp1" value="1" type="number">
   <input id="inp2" value="2" type="number">
   <p id="res1"></p>
   </p>

   
   <h3>Taille des caractères</h3>
   <p>
   <input id="inp3" value="16" type="range" min="1" max="64">
   <input id="inp4" value="Hello" type="text">
   <p id="res2"style="min-height:320px;"></p>
   </p>
   
  </div>


  
  <script>var _myOb1=null;</script>
  <script src="js-main.js?v=<?php echo VERSION; ?>" async></script>
  <script src="monopage_ajax.js?v=<?php echo VERSION; ?>" async></script>
  <script src="monopage_ajax_examples.js?v=<?php echo VERSION; ?>" async></script>
 </body>
</html>
