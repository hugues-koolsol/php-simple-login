<!DOCTYPE html>
<html lang="fr">
 <head>
  <meta charset="utf8" />
  <title>basic multipage home</title>
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">  
  <style type="text/css">
html{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
*,*:before,*:after{-webkit-box-sizing:inherit;-moz-box-sizing:inherit;box-sizing:inherit;padding:0;border:0;}
body{color:navy;overflow-y:scroll;}a,a:visited{border:2px #ddd outset;border-radius:5px;}.navy{color:navy;}.green{color:green;}.black{color:#444;}
input[type=password],input[type=text],input[type=number]{padding: 2px;border:1px #ddd inset;}
input[type=submit],button{padding: 4px;border:1px #ddd outset;}
a{display:inline-block;min-height:31px;border:2px #ddd outset;padding:3px;}
#menu{display:flex;justify-content: space-evenly;}
  </style>
 </head>
 <body>
  <div id="main"></div>
  
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
  <script src="js-main-v20200416-1.js" async></script>
  <script src="monopage_ajax.js" async></script>
  <script src="monopage_ajax_svelt_examples.js" async></script>
 </body>
</html>
