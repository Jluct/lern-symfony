/**
 * Created by Inkognito on 03.03.2017.
 */

$(function () {
    setInterval(function () {
        $.post('/game/isgame', function (data) {
            console.log(data);
            if (data.start == true)
                window.location.href = '/game/play/';
        });
    }, 1000 * 3);

});















