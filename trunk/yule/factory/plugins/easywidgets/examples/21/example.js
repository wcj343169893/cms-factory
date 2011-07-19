
// For use here and in other places (see index.html)

var WidgetOptions = {
  behaviour : {
    useCookies : true
  },
  effects : {
    effectDuration : 100,
    widgetShow : 'fade',
    widgetHide : 'slide',
    widgetClose : 'slide',
    widgetExtend : 'slide',
    widgetCollapse : 'slide',
    widgetOpenEdit : 'slide',
    widgetCloseEdit : 'slide',
    widgetCancelEdit : 'slide'
  }
}

// DOM ready!

$(function(){

  // Use the cookie plugin
  
  $.fn.EasyWidgets(WidgetOptions);
  
});