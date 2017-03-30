var menu = document.getElementById('menu');
var toggle = document.getElementById('menu-toggle');
var container = document.getElementsByClassName('dash-container')[0];
var handles = document.getElementsByClassName('handle');

if(menu && toggle) {
    menu.style.width = "250px";
    toggle.addEventListener('click', toggleMenu);
}

if(container) {
    container.style.padding = "0 0 0 250px";
}

for(var i = 0; i < handles.length; i++) {
    var handle = handles[i];
    handle.addEventListener('click', handleMenus);
}

function toggleMenu(e) {
    menu.style.width = menu.style.width == "250px" ? "0px" : "250px";
    container.style.padding = container.style.padding == "0px 0px 0px 250px" ? "0 0 0 0" : "0 0 0 250px";
    //setTimeout(updateScroll, 450);
}

function handleMenus(e) {
    var target = e.target;
    var input = e.target.parentNode.parentNode.getElementsByTagName('input')[0];
    input.checked = false;
}