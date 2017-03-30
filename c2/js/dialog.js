

var dialogs = document.getElementsByClassName("dialog");

for(var i = 0; i < dialogs.length; i++) {
    var curr = dialogs[i];
    var toggles = document.getElementsByClassName(curr.id+"-open");
    hide(curr);
    hide(curr);
    curr.addEventListener("click", dialogShow);
    for(var j = 0; j < toggles.length; j++) {
        toggles[j].addEventListener("click", toggleShow);
    }
}

// bind the toggle of clicking the overlay to exit the dialog
function dialogShow(e) {
    var hook = document.getElementById(e.target.id);
    var dialog = document.getElementById(e.target.id.substring(0, e.target.id.indexOf("-hook")));
    if(hook) {
        hide(dialog);
    }
}

function hide(item) {
    var swap = item.style.opacity == "1" ? true : false;
    item.style.opacity =  swap ? "0" : "1";
    item.style.width = swap ? "0px" : "100%";
    item.style.height = swap ? "0px" : "100%";
    item.childNodes[3].style.opacity =  swap ? "0" : "1";
    item.childNodes[3].style.width = swap ? "0px" : "100%";
    item.childNodes[3].style.height = swap ? "0px" : "100%";
    if(!swap) {
        var fInput = $("."+item.id + "-default")[0];
        if(fInput) {
            fInput.focus();
        }
    } else {
        document.getElementById("chat-input").focus();
    }
}

// bind all toggles with "<id>-open" class to the "<id>" element
function toggleShow(e) {
    var classes = e.target.className.split(" ");
    for(var i = 0; i < classes.length; i++) {
        if(classes[i].indexOf("-open") > 0) {
            var id = classes[i].substring(0, classes[i].indexOf("-open"));
            var dialog = document.getElementById(id);
            hide(dialog);
        }
    }
}