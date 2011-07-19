
var WidgetOptions = {

  behaviour : {
    useCookies : true
  },

  callbacks : {

    onShow : function(widget){
      alert('onShow callback :: Widget: ' + widget);
    },

    onHide : function(widget){
      alert('onHide callback :: Widget: ' + widget);
    },

    onShowQuery : function(widget){
      return confirm(
        'onShowQuery callback :: Widget: ' + widget + ' Continue?'
        )
    },

    onHideQuery : function(widget){
      return confirm(
        'onHideQuery callback :: Widget: ' + widget + ' Continue?'
        )
    }
  }
}

// DOM ready!

$(function(){

  // Very basic usage

  $.fn.EasyWidgets(WidgetOptions);

});