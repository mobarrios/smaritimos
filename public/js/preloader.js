function showPreload(){
    $( "body").prepend( '<div id="preloader"><div class="spinner-sm spinner-sm-1" id="status"> <i class="fa  fa-shekel fa-stack-1x "></i> </div></div>' );
}

function hidePreload(elem){
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({'overflow':'visible'});
}