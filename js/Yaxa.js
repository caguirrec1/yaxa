
var Yaxa = function () {
    var self = this;
    self.ajaxUrlAc = '../actor/';
    self.ajaxUrlPe = '../movie/';
    var Yaxa = function () {
        assingEvents();
    }();

    self.init = function () {
//        assingEvents();
    };

    /**************************************************************************/
    /****************************** SETUP METHODS *****************************/
    /**************************************************************************/

    function assingEvents() {
        window.ready(function () {
        });
    }
    ;
    /**************************************************************************/
    /******************************* DOM METHODS ******************************/
    /**************************************************************************/

    function showNotifications(data) {
        var html = '';
        $('#notification_data').empty();
        console.log(data);
        for (var i in data) {
            html += '<tr>' +
                    '<td>' + data[i].send_by + '</td>' +
                    '<td>' + data[i].estado + '</td>' +
                    '<td>' + data[i].subject + '</td>' +
                    '<td>' + data[i].content + '</td>+' +
                    '<td>' + data[i].date_send + '</td>' +
                    '</tr>';
        }
        $('#notification_data').append(html);
    }
    /**************************************************************************/
    /******************************* SYNC METHODS *****************************/
    /**************************************************************************/


    self.loadNotifications = function (parmams, succes, callback) {
        $.ajax({
            url: self.ajaxUrl + 'getAllNotifications',
            type: 'POST'
        }).done(function (response) {
            var data = JSON.parse(response);
            callback(data);
        }).fail(function (e) {
        });
    };
//    self.loadNotification = function (callback) {
//        $.ajax({
//            url: self.ajaxUrl + 'getAllNotifications',
//            type: "POST",
//            data: {
//            }
//        }).done(function (response) {
//            var data = JSON.parse(response);
//            console.log(console.log(response));
////            if (callback) {
////                callback(false, data.reports, data.currency);
////            }
//        }).fail(function (error) {
//            if (error.status === 403) {
//                kanguro.alert("Su sesión ha terminado, por favor ingrese de nuevo.");
//                window.location = kanguro.ajaxUrl;
//            } else {
//                if (callback)
//                    callback(error);
//            }
//        }).always(function () {
//
//        });
//    };
};
var yaxa=new Yaxa();


