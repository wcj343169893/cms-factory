
// In case that you need, initialize here and
// use every where your own EasyWidgets settings

var EASettings = {};

// DOM ready!

$(function(){

  $.fn.EasyWidgets(EASettings);
  
});

function AddWidget(url, placeId){
  $.get(url, function(html){
    $.fn.AddEasyWidget(html, placeId, EASettings);
  });
}