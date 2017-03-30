var inputs = document.querySelectorAll("input[type='checkbox']");

function updateScroll(){
    var element = document.getElementById("chat-window");
    if(element != null && !scrollLock) {
        element.scrollTop = element.scrollHeight;
    }

}

var element = document.getElementById("chat-window");

//$('#chat-window').on('scroll', setLock);

/*function setLock(e) {
    console.log('setting Lock');
    scrollLock = true;
    if(e.target.scrollTop == element.scrollHeight) {
        scrollLock = false;
    }
}*/

window.onresize = updateScroll;