var oMarquee = document.getElementById("divLast"); 

var iScrollAmount = 1; 
var iLineHeight = 21; 
var MaxScroll = oMarquee.scrollTop;
function Marquee() {
    var obj = oMarquee;
    MaxScroll = obj.scrollTop;
    obj.scrollTop += iScrollAmount;
    if (obj.scrollTop == MaxScroll && iScrollAmount != 0)
    {
        obj.scrollTop = 0;
    }
    if (obj.scrollTop % iLineHeight == 0 ) {
        window.setTimeout( "Marquee()", 2000 );
    } else {
        window.setTimeout( "Marquee()", 50 );
    }
}
for(var n = 0; n < 3; n++)
{
    oMarquee.innerHTML += oMarquee.innerHTML;
}
window.setTimeout( "Marquee()", 2000 );
