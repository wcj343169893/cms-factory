function scrlInterest(w){
  var tags=jQuery(w+" ol li");
  var cats=jQuery(w+" ul li");
var current;
var timer=3000;
function disAll() {
for(var i=0;i<tags.length;i++) {
tags[i].className="";
cats[i].className="";
cats[i].style.display="none";
}
}

if(cats.length==1){
  jQuery(w+" ol").style.display="none";
}
function setNow() {
for(var i=0;i<tags.length;i++) {
if(tags[i].className=="cik") {
current=i;
}
}
}
for(var j=0;j<tags.length;j++) {
tags[j].onmouseover=function() {
clearInterval(h);
disAll();
this.className="cik";
setNow();
cats[current].style.display="block";

cats[current].className="cik";
}
tags[j].onmouseout=function() {
setNow();
h=setInterval(function(){
goNext();
},3000);
}
}
function goNext() {
setNow();
current+=1;
if(current>=parseInt(tags.length)) {
current=0;
disAll();
cats[0].style.display="block";

tags[0].className="cik";
cats[0].className="cik";
}
else {
disAll();

cats[current].style.display="block";

cats[current].className="cik";
tags[current].className="cik";
}
}
var h=setInterval(function(){
goNext();
},timer);

}
