/**
 * Created by Listopadov on 08.02.2017.
 */

$(function(){
    $.material.init();

    var options = {
        // icon_close     : 'fa-arrow-left', //string
        // icon_open      : 'fa-bars'       //string
        icon_spin      : 'fa-spin-fast'  //string
        // card_activator : 'click'          //string: click or hover
    };

    $('.material-card').materialCard(options);
});