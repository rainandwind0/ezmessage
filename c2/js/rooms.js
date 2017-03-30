var handles = document.getElementsByClassName('roomHandle');


for(var i = 0; i < handles.length; i++) {
    var curr = handles[i];
    curr.addEventListener('click', updateRoom);
}

var mine = false;

function updateRoom(e) {
        if(e.target.classList.contains('joined')) {
            mine = false;
        } else {
            mine = true;
        }
        $.ajax({                                      
            url: '/resources/room_handler.php?rid='+e.target.id,   
            type:'GET',      
            dataType: 'json',    
            success: roomReady,
            error: function(res) {
                alert(JSON.stringify(res.status));
            }
        });
}

function roomReady(res) {
    var chatWrapper = document.getElementById('chat-input-wrapper');
    var chatSettings = document.getElementById('room-settings');
    var titles = document.getElementsByClassName('main-title');
    for(var i = 0; i < titles.length; i++) {
        var curr = titles[i];
        curr.innerHTML = res['room_topic'];
    }
    document.getElementById('settings-form').elements['name'].value = res['room_topic'];
    chatWrapper.style.height = "48px";
    chatWrapper.style.top = 0;
    if(mine) {
        chatSettings.style.height = "64px";
        chatSettings.style.width = "64px";
        chatSettings.style.opacity = "1";
    } else {
        chatSettings.style.height = "0px";
        chatSettings.style.width = "0px";
        chatSettings.style.opacity = "0";
    }
    document.getElementById("chat-input").focus();
    pollRoomMessages();
    
}

function pollRoomMessages() {
    $.ajax({                                      
        url: '/views/room.php',   
        type:'GET',      
        dataType: 'html',    
        success: function(res) {
            document.getElementById('chat-window').innerHTML = res;
            setTimeout(updateScroll, 100);
        },
        error: function(res) {
            alert(JSON.stringify(res.status));
        }
    });
}