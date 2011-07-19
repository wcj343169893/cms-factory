
var strorList=new Array("story_0","story_1");
var fList=new Array("con_0","con_1","con_2","con_3");
function ShowInfo(obj,inde){
var count=jQuery("#story li").size();
var obj1=jQuery("#story li");
 for(var i=0;i<count;i++)
 {
   document.getElementById(strorList[i]).style.display="none";
   obj1[i].className="";
 }
 document.getElementById(strorList[inde]).style.display="";
 obj.className="cick";

}

function contSwitch(obj,inde)
{
 var count=jQuery("#f_Info li").size();
 var obj1=jQuery("#f_Info li");
 for(var i=0;i<count;i++)
 {
   document.getElementById(fList[i]).style.display="none";
   obj1[i].className="";
 }
 document.getElementById(fList[inde]).style.display="";
 obj.className="k1";  
}

function getFocus(obj)
{
  jQuery(obj).addClass("bg_over");
}
function lostFocus(obj)
{
  jQuery(obj).removeClass("bg_over");
}

function ScollFeedback()
{
    var top = document.body.parentNode.scrollTop;
    document.getElementById("regene").style.top = top +122 + "px";
}



if (window.addEventListener) 
{
    window.addEventListener('scroll', ScollFeedback, false);
}
else
{
    window.attachEvent("onscroll", ScollFeedback);
}


