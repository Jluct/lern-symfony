/**
 * Created by serj on 13.12.16.
 */



$(function(){
    $.material.init();

    var options = {
        icon_close     : 'fa-arrow-left', //string
        icon_open      : 'fa-bars',       //string
        icon_spin      : 'fa-spin-fast',  //string
        card_activator : 'click'          //string: click or hover
    };

    $('.material-card').materialCard(options);
});