/**
 * Created by Listopadov on 10.03.2017.
 */

$(function () {
    var p = [1, 6];
    var a = 0;
    setInterval(function () {


        //{"id":2,"history":[],"updated":"12:03:2017 12:01:26","players":[1,6],"last":6,"action":[]}
        var data = {"last": p[a], "action": {"coordinate": [2, 1]}};
        $.post('/game/play/set/step', data, function (data) {
            console.log(data);
        });

        $.post('/game/play/get/data', function (data) {
            console.log(data);
        });


        if (a == 1) {
            a = 0;
        } else {
            a++;
        }

    }, 1000 * 3);

});
