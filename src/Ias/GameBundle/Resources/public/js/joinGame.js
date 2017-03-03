/**
 * Created by Inkognito on 03.03.2017.
 */

$(function () {
    setInterval(function () {
        $.get('/game/play/', function (data) {
            if (data.start == true)
                window.url('/game/play/');

        });
    }, 1000*3);

});