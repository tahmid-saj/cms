$(document).ready(function() {
    $('#summernote').summernote({
        height: 200
    });
});

function loadUsersOnline() {
    $.get("functions.php?onlineusers=result", function(date) {
        $(".usersonline").text(date);
    });
};

setInterval(function() {
    loadUsersOnline();
}, 500);


