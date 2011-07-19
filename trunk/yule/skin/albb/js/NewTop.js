
function  bizSerivceNavi()
{
   jQuery("#showPin .qk-service").bind("mousemove",
        function()
        {
            jQuery("#down-sv").show();
             jQuery("#down-sv").hover(
                  function () {
                    jQuery("#down-sv").show();
                  },
                  function () {
                  jQuery("#down-sv").hide();
                  }
              );
        }
    );
    jQuery("#showPin .qk-service").bind("mouseout",function(){
        jQuery("#down-sv").hide();
    })
}
function MenuChoise(obj)
{
    var Num = obj;
    var divs =jQuery("#ShowPic div");
    var Menus = jQuery("#MenuPic ul li")
    var Menus_print = jQuery("#MenuPic_Print ul li");
    var divs_print = jQuery("#ShowPic_Print div");
    if(Num<5)
    {
         for(var i=0;i<divs.length;i++)
        {
            switch(Num)
            {
                case 1:
                divs[i].className = "hidden";
                divs[0].className="";
                MenuCssChange(Menus,0);
                break;
                case 2:
                divs[i].className = "hidden";
                divs[1].className="";
                MenuCssChange(Menus,1);
                break;
                case 3:
                divs[i].className = "hidden";
                divs[2].className="";
                MenuCssChange(Menus,2);
                break;
                case 4:
                divs[i].className = "hidden";
                divs[3].className="";
                MenuCssChange(Menus,3);
                break;
            }
        }
    }
    else
    {
         for(var i=0;i<divs_print.length;i++)
        {
            switch(Num)
            {
                case 5:
                divs_print[i].className = "hidden";
                divs_print[0].className="";
                MenuCssChange(Menus_print,0);
                break;
                case 6:
                divs_print[i].className = "hidden";
                divs_print[1].className="";
                MenuCssChange(Menus_print,1);
                break;
                case 7:
                divs_print[i].className = "hidden";
                divs_print[2].className="";
                MenuCssChange(Menus_print,2);
                break;
                case 8:
                divs_print[i].className = "hidden";
                divs_print[3].className="";
                MenuCssChange(Menus_print,3);
                break;
            }
        }
    }
}
function MenuCssChange(lis,choiceitem)
{
    var menus = lis;    
    for(var i=0;i<menus.length;i++)
    {
        menus[i].className = "sc_2";
        menus[choiceitem].className = "sc_1";
    }
}
function Ltrim(s){
    return s.replace( /^\s*/, "").replace( /^[" "|"　"]*/, "");
}
function Rtrim(s){
    return s.replace( /\s*$/, "").replace( /[" "|"　"]*$/, "");
}
function Trim(s){
    return Rtrim(Ltrim(s));
}

