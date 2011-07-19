
var EASettings = {

  callbacks : {

    onAdd : function(widget, placeId){
      alert('onAdd callback :: Widget: ' + widget + ' - Place ID: ' + placeId);
    },

    onAddQuery : function(widget, placeId){
      return confirm(
        'onAddQuery callback :: Widget: ' + widget + ' - Place ID: ' + placeId + ' Continue?'
      )
    }

  }

};

// DOM ready!

$(function(){

  $.fn.EasyWidgets(EASettings);
  
});

function AddWidget(url, placeId){
  $.get(url, function(html){
    $.fn.AddEasyWidget(html, placeId, EASettings);
  });
}
