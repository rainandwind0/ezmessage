
var request;

$("#chat-input-wrapper").submit(function(event){

    event.preventDefault();
    if (request) {
        request.abort();
    }

    var form = $(this);
    var inputs = form.find("input, select, button, textarea");
    var serializedData = form.serialize();
    inputs.prop("disabled", true);

    request = $.ajax({
        url: "/c2/resources/post_handler.php",
        type: "post",
        data: serializedData,
    });

    request.done(function (response, textStatus, jqXHR){
    // Log a message to the console
        if(response['success']) {
            document.getElementById('chat-input').value = "";
            pollRoomMessages();
        }
        //console.log(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    request.always(function () {
        // Reenable the inputs
        inputs.prop("disabled", false);
        document.getElementById("chat-input").focus();
    });


});

$("#chat-input").keypress(function (e) {
    if(e.which == 13 && !e.shiftKey) {        
        $(this).closest("form").submit();
        e.preventDefault();
        return false;
    }
});