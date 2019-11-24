let bell = document.getElementById('bell');
let notificationsBox = document.getElementById('notifications-box');

let toggle = false;

bell.addEventListener('click', function(){
    
    // Popup behaviour
    if(!toggle){
        notificationsBox.style.display = 'block';

        const xhr = new XMLHttpRequest;
    } else if(toggle) {

        notificationsBox.style.display = 'none';
    }

    toggle = !toggle;
});