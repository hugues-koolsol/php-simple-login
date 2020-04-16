"use strict";
function _myObjDefinition1(p){
 //========================================================================== 
 console.log('the object is loaded with parameters',JSON.stringify(p));
 // global variables of the object
 this.obNam=p.objectName;
 this.main=document.getElementById('main');
 this.isLogged=false;
 this.currentPage='index';
 this.currentUser='';
 this.ajaxError=false;
 this.menusAndPage='<div id="menu">';
 this.menusAndPage+='</div>';
 this.menusAndPage+='<div id="page"></div>';
}
//========================================================================== 
//========================================================================== 
_myObjDefinition1.prototype.clearLoginAndPassword=function(){
  // chrome puts a login and a password. I do not want the feature !
  document.getElementById('login').value='';
  document.getElementById('password').value='';
  document.getElementById('login').focus();
  console.log('done');
}
 //========================================================================== 
_myObjDefinition1.prototype.setPageContent=function(){
  var t='';
  if(_myOb1.currentPage=='index'){
   history.pushState({}, "login", "monopage_ajax.php");
   t+='<h1>basic monopage ajax home</h1>';
   if(_myOb1.isLogged==false){
    t+='Hello anonymous, you can <a href="javascript:'+_myOb1.obNam+'._displayLoginForm()">log here</a>';
   }else{
    t+='<div>Hello "'+_myOb1.currentUser+'"</div> <button id="logoutButton" onclick="'+_myOb1.obNam+'._logout();">logout</button>'
   }
  }else if(_myOb1.currentPage=='login'){
   history.pushState({}, "login", "monopage_ajax.php?action=login");
   t+='<h1>basic monopage ajax login</h1>';
   if(_myOb1.isLogged==true){
    t+='Hello "'+_myOb1.currentUser+'" <button id="logoutButton" onclick="'+_myOb1.obNam+'._logout();">logout</button>'
   }else{
    t+='<div>';
    t+='login<input name="login" id="login" type="text" maxlength="32" size="32" value="" autocomplete="off"> ( try admin )<br>';
    t+='password<input name="password" id="password" type="password" maxlength="32" size="32" value="" autocomplete="off"> ( try admin )<br>';
    t+='<button id="loginButton" onclick="'+_myOb1.obNam+'._login();">login</button>';
    t+='</div>';
    setTimeout(_myOb1.clearLoginAndPassword,750);
   }
   if(_myOb1.ajaxError==true){
    t+='<div style="color:red;">wrong user or password OR server problem !</div>';
   }
   
  }
  document.getElementById('page').innerHTML=t;
  try{
   setColorMenu();
  }catch(e){
   setTimeout(setColorMenu,250);
  }
  _myOb1.ajaxError=false;
}
 //========================================================================== 
_myObjDefinition1.prototype._logout=function(){
  try{document.getElementById('logoutButton').setAttribute('disabled','disabled');}catch(e){}
  var r = new XMLHttpRequest();
  r.open("POST",'ajax.php?logout',true);
  r.timeout=6000;
  r.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
  r.onreadystatechange = function () {
   if (r.readyState != 4 || r.status != 200) return;
   try{
    var jsonRet=JSON.parse(r.responseText);
    if(jsonRet.status=='OK'){
     _myOb1.isLogged=false;
     _myOb1.currentUser='';
     _myOb1.currentPage='index';
    }else{
     display_ajax_error_in_cons(jsonRet);
     console.error(r);
    }
    _myOb1.setPageContent();
    return;
   }catch(e){
    console.error(e,r);
    return;
   }
  };
  r.onerror=function(e){console.error('e=',e);_myOb1.ajaxError=true;setPageContent();}
  r.ontimeout=function(e){console.error('e=',e);_myOb1.ajaxError=true;setPageContent();};
  var data={
   funct                     : 'logout',
  }
  r.send('data='+encodeURIComponent(JSON.stringify(data)));  
 }
 //========================================================================== 
_myObjDefinition1.prototype._login=function(a){
  try{document.getElementById('loginButton').setAttribute('disabled','disabled');}catch(e){}
  var r = new XMLHttpRequest();
  r.open("POST",'ajax.php?login',true);
  r.timeout=6000;
  r.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
  r.onreadystatechange = function () {
   if (r.readyState != 4 || r.status != 200) return;
   try{
    var jsonRet=JSON.parse(r.responseText);
    if(jsonRet.status=='OK'){
     if(jsonRet.isLogged){
      _myOb1.isLogged=true;
      _myOb1.currentUser=jsonRet.currentUser;
      _myOb1.currentPage='index';
     }else{
      _myOb1.currentUser='';
      _myOb1.isLogged=false;
      _myOb1.ajaxError=true;
     }
    }else{
//     _myOb1.display_ajax_error_in_cons(jsonRet);
//     console.error(r);
     _myOb1.ajaxError=true;
    }
    _myOb1.setPageContent();
    return;
   }catch(e){
    console.error(e,r);
    return;
   }
  };
  r.onerror=function(e){console.error('e=',e);ajaxError=true;setPageContent();}
  r.ontimeout=function(e){console.error('e=',e);ajaxError=true;setPageContent();};
  var data={
   funct                     : 'login',
   login                     : document.getElementById('login').value,
   password                  : document.getElementById('password').value,
  }
  r.send('data='+encodeURIComponent(JSON.stringify(data)));  
}
 //========================================================================== 
_myObjDefinition1.prototype.getIsLogged=function(){
  var r = new XMLHttpRequest();
  r.open("POST",'ajax.php?getIsLogged',true);
  r.timeout=6000;
  r.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
  r.onreadystatechange = function () {
   if (r.readyState != 4 || r.status != 200) return;
   try{
    var jsonRet=JSON.parse(r.responseText);
    if(jsonRet.status=='OK'){
     if(jsonRet.isLogged){
      _myOb1.isLogged=true;
      _myOb1.currentUser=jsonRet.currentUser;
     }else{
      _myOb1.isLogged=false;
     }
    }else{
     _myOb1.display_ajax_error_in_cons(jsonRet);
     console.error(r);
    }
    _myOb1.setPageContent();
    return;
   }catch(e){
    console.error(e,r);
    return;
   }
  };
  r.onerror=function(e){console.error('e=',e);ajaxError=true;setPageContent();}
  r.ontimeout=function(e){console.error('e=',e);ajaxError=true;setPageContent();};
  var data={
   funct                     : 'getIsLogged',
  }
  r.send('data='+encodeURIComponent(JSON.stringify(data)));  
 }
 //=====================================================================================================================
_myObjDefinition1.prototype.display_ajax_error_in_cons=function(jsonRet){
  var txt = '';
  if(jsonRet.hasOwnProperty('status')){ txt += 'status:' + jsonRet.status + ' '; }
  if(jsonRet.hasOwnProperty('message')){
   if(Array.isArray(jsonRet.message)){
    for(var elem in jsonRet.message){
     txt+=''+jsonRet.message[elem]+'\n';
    }
   }else{
    txt+=''+jsonRet.message+'\n';
   }
  }
  console.log(txt);
  console.log('jsonRet=', jsonRet)
}
//=====================================================================================================================
_myObjDefinition1.prototype.executeFunctionByName=function(functionName, context /*, args */) {
  var args = Array.prototype.slice.call(arguments, 2);
  var namespaces = functionName.split(".");
  var func = namespaces.pop();
  for(var i = 0; i < namespaces.length; i++) {
    context = context[namespaces[i]];
  }
  return context[func].apply(context, args);
 }
//=====================================================================================================================
_myObjDefinition1.prototype._displayLoginForm=function(a){
  history.pushState({}, "login", "monopage_ajax.php?action=login");
  _myOb1.currentPage='login';
  _myOb1.setPageContent();
}
//========================================================================== 
_myObjDefinition1.prototype.init=function(){
  console.log('init is called');
  // here I would add some dynamic javascript ( see document.createElement('script') on https://developer.mozilla.org/fr/docs/Web/API/Document/createElement )
  // to add some business logic 
  document.getElementById('main').innerHTML=_myOb1.menusAndPage;
  if(String(document.location).indexOf('?action=login')>=0){
   _myOb1.currentPage='login';
  }
  setMenus();
  _myOb1.getIsLogged();
}
_myOb1=new _myObjDefinition1({objectName:'_myOb1'});
_myOb1.init();
console.log('js is loaded');
/*
  <div id="main"></div>
*/  