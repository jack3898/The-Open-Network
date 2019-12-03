// Selector shortener function
function get(type, elem){
    switch(type){
        case 'id' :
            return document.getElementById(elem);
        break;
        case 'class' :
            return document.getElementsByClassName(elem);
        break;
        case 'query' :
            return document.querySelector(elem);
        break;
        case 'queryAll' :
            return document.querySelectorAll(elem);
        break;

        default :
        console.log(`%cError! Unknown selector ${type}. Try 'id', 'class', 'query' or 'queryAll' for ${elem}.`, 'color: red');
    }
}

// Notification box elements
let bell = get('id', 'bell');
let notificationsBox = get('id', 'notifications-box');

// Accept decline buttons
let acceptFrnd = get('queryAll', '.friend-accept');
let declineFrnd = get('queryAll', '.friend-decline');

// Profile button element
if(get('id', 'add_friend') !== null){
    const addFriend = get('id', 'add_friend'); // Add [user] as a friend btn on profiles

    // addFriend.addEventListener('click', function(e) {
    //     // Get logged in user details
    //     xhr = new XMLHttpRequest();

    //     xhr.open('GET', 'api.php?user=currentuser');
    // });
}

let toggle = false;


// Popup behaviour
bell.addEventListener('click', () => {
    if(!toggle){
        notificationsBox.style.display = 'block';
    } else if(toggle) {
        notificationsBox.style.display = 'none';
    }

    toggle = !toggle;
});
