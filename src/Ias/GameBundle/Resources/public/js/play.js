/**
 * Created by Listopadov on 10.03.2017.
 */

$(function () {
    setInterval(function () {
        $.post('/game/play/get/data', function (data) {
            console.log(data);
        });
    }, 1000 * 3);

});
