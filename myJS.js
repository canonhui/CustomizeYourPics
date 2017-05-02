function go(div){
	var t,tt;
	var obj = div.getElementsByTagName('div')[0];
	//document.write($(obj, this).text());
	obj.style.top = "-150px";
	var change = function(){
		var obj_h = parseInt(obj.style.top);
		if(obj_h<0) {
			obj.style.top = (obj_h+Math.floor((0-obj_h)*0.1))+"px";
		}
		else {
			clearInterval(t);
		}
	}
	var back=function() {
		var obj_hh=parseInt(obj.style.top);
		if(obj_hh>-150) {
			obj.style.top=(obj_hh+Math.floor((-150-obj_hh)*0.1))+"px";
		}
		else {
			clearInterval(tt);
		}
	}
 div.onmouseover=function(){clearInterval(tt);t=setInterval(change,10);}
 div.onmouseout=function(){clearInterval(t);tt=setInterval(back,10)}
 
}

window.onload=function(){
	go(div);
}
