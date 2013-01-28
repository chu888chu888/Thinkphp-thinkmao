
function getClass (classname,obj) {
	    var obj=obj||document;
		var arr=[];
		 if(obj.getElementsByClassName){
		   return obj.getElementsByClassName(classname);
		 }else{
		   var alls=obj.getElementsByTagName("*");
		   for (var i=0; i<alls.length; i++) {
		     if(hasClass(alls[i],classname)){		 
			   arr.push(alls[i]);
			 }
		   }
		   return arr;
		 }
  }

 
  function hasClass (obj,classname) {
	 var objclass=obj.className;
	 var arr=objclass.split(/\s+/);
     for (var i=0; i<arr.length; i++) {
		   if(arr[i]==classname){
		     return true;
		   }
     }
	 return false;
  }

 
  function getText (obj,val) {
	  if(document.all){
		 if(val){
		 obj.innerText=val;
		 }else{
	       return obj.innerText;
		 }
	  }else{
	     if(val){
		 obj.textContent=val;
		 }else{
	       return  obj.textContent;
		 }
	  }
  }

 

  function getStyle (obj,attr) {
	     if(document.all){
		   return obj.currentStyle[attr];
		 }else{
		   return getComputedStyle(obj,null)[attr];
		 }
  }

     function animate (obj,attr,end,speed,callback) {
     if(obj.time){ clearInterval(obj.time);}
     var start=parseInt(getStyle(obj,attr));
	 var flag=start>end?false:true;
     obj.time=setInterval(function  () {
       if(start==end){ clearInterval(obj.time);
		if(callback){ callback();} 
	   }else{     
		if(flag){
			start+=speed;
			if(start>end){
			  start=end;}
		}else{
		     start-=speed;
			if(start<end){
			  start=end;}
		}
		obj.style[attr]=start+"px";
		}
	 },60)
   }

	 
function getChilds (obj) {
	 var childs=obj.childNodes;
	 var arr=[];
	 for (var i=0; i<childs.length; i++) {
		   if(childs[i].nodeType==3){
		     continue;
		   }else{
		   arr.push(childs[i])
		   }
	 }
	 return arr;
}


  function getFirst (obj) {
	  var first=obj.firstChild;
	  if(first==null){
	    return false;
	  }
	  while (first.nodeType==3) {
		   first=first.nextSibling;
		   if(first==null){
		     return false;
		   }
     }
	 return first;
  }
 
  function getLast (obj) {
	  var last=obj.lastChild;
	  if(last==null){
	    return false;
	  }
	  while (last.nodeType==3) {
		   last=last.previousSibling;
		   if(last==null){
		     return false;
		   }
     }
	 return last;
  }
  
  function getUp (obj) {
	  var up=obj.previousSibling;
	  if(up==null){
	    return false;
	  }
	  while (up.nodeType==3) {
		   up=up.previousSibling;
		   if(up==null){
		     return false;
		   }
     }
	 return up;
  }

  
 function getNext (obj) {
	  var next=obj.nextSibling;
	  if(next==null){
	    return false;
	  }
	  while (next.nodeType==3) {
		   next=next.nextSibling;
		   if(next==null){
		     return false;
		   }
     }
	 return next;
  }
 
 
  function insertAfter (obj,afterobj,parent) {
     var next= getNext(afterobj);
 	  if(!next){
	   parent.appendChild(obj)
	  }else{
	    parent.insertBefore(obj,next);
	   }
  }


  function mousewheel (obj,upfun,downdun) {
      if(obj.addEventListener){
			obj.addEventListener("DOMMouseScroll",scrollfun,false)
		 }else{
		   obj.onmousewheel=scrollfun
		}
    function scrollfun (e) {
	  var ev=e||window.event;
	  var wheelnum=ev.wheelDelta||ev.detail;
	  if(wheelnum==120||wheelnum==-3){
	    if(upfun){
		  upfun();
		}
	  }else	if(wheelnum==-120||wheelnum==3){
        if(downdun){
		  downdun()
		}
	    
	  }
}

   }

