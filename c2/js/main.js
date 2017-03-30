var scrollLock = false;
$(document).ready(function() {
    $.ajaxSetup({cache: false});
    updateScroll();
    setInterval(pollRoomMessages, 3000);
    setTimeout(function() {
        var toast = document.getElementById('toast');
        if(toast != null) {
            toast.style.bottom = "-100px";
        }
    }, 5000);
})