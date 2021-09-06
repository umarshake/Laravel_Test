// --- Booking section Start --- //
var bookingTableList;
$(function () {
    bookingTableList = $('#bookingTableList').DataTable({
        ajax: {
            url: APP_URL + "/admin/booking",
            error: function(response){
            }
        },
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search"
        },

        drawCallback: function (data) {
            $('[data-toggle="popover"]').popover();
            $('[data-toggle="tooltip"]').tooltip();
        },
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "columnDefs":[{
            "sortable":false,
            "targets":[9]
        }],
        "order":[[0,"desc"]],

    });
});
// --- Booking section End --- //

// --- Room section Start --- //
var roomTableList;
$(function () {
    roomTableList = $('#roomTableList').DataTable({
        ajax: {
            url: APP_URL + "/admin/room",
            error: function(response){
            }
        },
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search"
        },

        drawCallback: function (data) {
            $('[data-toggle="popover"]').popover();
            $('[data-toggle="tooltip"]').tooltip();
        },
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "columnDefs":[{
            "sortable":false,
            "targets":[]
        }],
        "order":[[0,"desc"]],

    });
});
// --- Room section End --- //