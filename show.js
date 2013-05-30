$(document).ready(function() {         
var hash = window.location.hash.substr(1);
var href = $('#nav li a').each(function(){
        var href = $(this).attr('href');
    if(hash==href.substr(0,href.length-4)){

        var toLoad = hash+'.html #content_low'+divId;
        $('#content'+divId).load(toLoad);
        alert(divId);
    }                                           
});

$('#nav li a').click(function(){
    divId = $(this).parents('li').attr('id');   
    var toLoad = $(this).attr('href')+'#content_low'+divId;
    alert(divId);
    $('#content'+divId).slideUp('normal',loadContent).delay(200);
    window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-$(this).attr('href').length);
    function loadContent() {
        $('#content'+divId).load(toLoad,showNewContent)
    }
    function showNewContent() {
        $('#content'+divId).delay(700).slideDown($('#content'+divId).height());

    }
    return false;

});
});
