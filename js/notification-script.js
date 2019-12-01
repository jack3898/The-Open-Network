// Notification box elements
let bell = document.getElementById('bell');
let notificationsBox = document.getElementById('notifications-box');

// Accept decline buttons
let acceptFrnd = document.querySelectorAll('.friend-accept');
let declineFrnd = document.querySelectorAll('.friend-decline');

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

for(let btn of acceptFrnd){
    let btnName = btn.getAttribute('name');
    btn.addEventListener('click', () =>{
        handleFriendRequest('accept', btnName);
    })
}

for(let btn of declineFrnd){
    let btnName = btn.getAttribute('name');
    btn.addEventListener('click', () =>{
        handleFriendRequest('decline', btnName);
    })
}

function handleFriendRequest(action, friend){
action === 'accept' ? computeRequest('accept', friend) : computeRequest('decline', friend);

    function computeRequest(type){
        if (type === 'accept'){
            let xhr = new XMLHttpRequest;
            xhr.responseType = 'text';

            xhr.open('POST', 'userrequestmgr.php', true);

            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.send(`name=${friend}`);

            xhr.onload = function(){
                console.log(this.responseText);
            }
        } else {
            alert('Declining friends coming soon!');
        }
    }
}