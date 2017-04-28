/**
 * Created by wilder on 12/04/17.
 */
$(document).ready(function(){
    $('.collapsible').collapsible();
    $('.tooltipped').tooltip({delay: 50});
    $('.scrollspy').scrollSpy();

    for (var i=0; i<messages.length; i++) {
        Materialize.toast(messages[i], 3000, 'flash-message');
        console.log('message');
    }
});


