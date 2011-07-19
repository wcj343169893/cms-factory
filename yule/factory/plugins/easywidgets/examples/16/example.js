
// DOM ready!

$(function(){

  $.fn.EasyWidgets({

    callbacks : {
      onChangePositions : function(str){
        alert("You receive here the positions of Widgets in a serialization string like this: \n\n" + str + "\n\nYou can use this value to store in a database, for example, instead of use the plugin cookies feature. So, in the onRefreshPositions callback, you have the oportunity to retrieve the serialized positions from database and return it in the callback and the plugin use this serialized positions to repositioned the Widgets.");
      },
      onRefreshPositions : function(){
        alert('onRefreshPositions callback is executed. If you save the serialized Widgets positions in the onChangePositions callback, you can return the serialized positions from this callback, and the plugin use this value to repositioned the Widgets.');
      }
    }

  });
  
});