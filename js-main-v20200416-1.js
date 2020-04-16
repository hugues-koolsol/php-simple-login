//console.log('main js, do common stuff in main-v20200416-1.js');
//================================================================================================
var getAbsoluteUrl=(function(){ // https://davidwalsh.name/essential-javascript-functions
	var a;
	return function(url) {
		if(!a) a=document.createElement('a');
		a.href=url;
		return a.href;
	};
})();

//================================================================================================
function setMenus(){
 var menus='';
 menus+='<a href="./" class="navy">multi page home</a>';
 menus+=' <a href="index_multi_login.php"  class="navy">multi page login</a>';
 menus+=' <a href="monopage_php.php"  class="black">mono page home</a>';
 menus+=' <a href="monopage_php.php?action=login" class="black">mono page login</a>';
 menus+=' <a href="monopage_ajax.php" class="green">mono page ajax home</a>';
 menus+=' <a href="monopage_ajax.php?action=login" class="green">mono page ajax login</a>';
 menus+=' <a href="https://blog.koolsol.app/" style="background: linear-gradient(to bottom,#beedff 0%, #7eddff 100%);color:black;">blog koolsol</a>';
 try{
  document.getElementById('menu').innerHTML=menus;
 }catch(e){}
}
setMenus();

//================================================================================================
function setColorMenu(){
 var menuList=document.getElementById('menu').getElementsByTagName('a');
 
 for(var i=0;i<menuList.length;i++){
  var a=getAbsoluteUrl(menuList[i].href);
  if(String(document.location)==a){
   menuList[i].style.color='red';
   menuList[i].style.borderStyle='solid';
  }else{
   menuList[i].style.color='';
   menuList[i].style.borderStyle='outset';
  }
 }
}
setTimeout(setColorMenu,250);