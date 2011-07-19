
// DOM ready!

$(function(){

  // Use the cookie plugin
  
  $.fn.EasyWidgets({

    behaviour : {
      useCookies : true
    },
    
    callbacks : {
      onEnable : function(){
        alert('onEnable callback');
      },
      onDisable : function(){
        alert('onDisable callback');
      },
      onEnableQuery : function(){
        return confirm('onEnableQuery callback, confirm?');
      },
      onDisableQuery : function(){
        return confirm('onDisableQuery callback, confirm?');
      }
    }

  });

});
