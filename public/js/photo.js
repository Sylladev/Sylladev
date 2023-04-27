 (function ($) {
 $("#file").change(function(){
    var fname=$("#file").val();
    fname=fname.split("fakepath").pop();
    $("#dest").val(fname);
 });
})(jQuery);