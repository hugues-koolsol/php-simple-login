"use strict";
function _myObjSvelt1(p){
 this.obNam=p.objectName;
 this.countClick=0;
}
// input
//========================================================================== 
_myObjSvelt1.prototype.addClickInput=function(){
 this.countClick++;
 this.setClickInput();
}
//========================================================================== 
_myObjSvelt1.prototype.setClickInput=function(){
 
 document.getElementById('click1').innerHTML='Clicked '+_myObSv1.countClick+' time'+(_myObSv1.countClick>1?'s':'');
 document.getElementById('click1').style.background='hsla('+_myObSv1.countClick*10+', 100%, 93%, 1)';
 try{
  localStorage.setItem('countClick', _myObSv1.countClick);
 }catch(e){
  console.log(e);
 }
 
}

// calculator
//========================================================================== 
_myObjSvelt1.prototype.computeCalculator=function(){
 var res1=document.getElementById('inp1').value*1+document.getElementById('inp2').value*1;
 document.getElementById('res1').innerHTML=(document.getElementById('inp1').value==''?'nothing':document.getElementById('inp1').value) + ' + ' + document.getElementById('inp2').value + ' = ' + res1 ;
}


// font size
//========================================================================== 
_myObjSvelt1.prototype.setFontSize=function(){
 document.getElementById('res2').innerHTML=document.getElementById('inp4').value + ' in ' + document.getElementById('inp3').value+ ' px ' ;
 document.getElementById('res2').style.fontSize=document.getElementById('inp3').value+'px';
}


// init
//========================================================================== 
_myObjSvelt1.prototype.init=function(){
  
  // input
  document.getElementById('click1').setAttribute('onclick','_myObSv1.addClickInput()');
  document.getElementById('click1').innerHTML='Clicked 0 times';
  try{
   var tmp=localStorage.getItem('countClick');
   if(!(tmp===null)){
    console.log('ixi',tmp);
    _myObSv1.countClick=tmp;
   }
  }catch(e){
   console.log(e);
  }
  _myObSv1.setClickInput();



  // calcutator
  var tabEventInputs=['change','click','keyup','input','paste'];
  for(var item in tabEventInputs){
   document.getElementById('inp1').setAttribute('on'+tabEventInputs[item],'_myObSv1.computeCalculator()');
   document.getElementById('inp2').setAttribute('on'+tabEventInputs[item],'_myObSv1.computeCalculator()');
  }
  _myObSv1.computeCalculator();
  


  // font size
  var tabEventInputs=['change','click','keyup','input','paste'];
  for(var item in tabEventInputs){
   document.getElementById('inp3').setAttribute('on'+tabEventInputs[item],'_myObSv1.setFontSize()');
   document.getElementById('inp4').setAttribute('on'+tabEventInputs[item],'_myObSv1.setFontSize()');
  }
  _myObSv1.setFontSize();
  



  
}

var _myObSv1=new _myObjSvelt1({objectName:'_myObSv1'});
_myObSv1.init();
