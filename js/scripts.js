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

// Edit bio button
let bio = get('id', 'bio');
let editBio = get('id', 'edit-bio');

let toggleNotif = false;
let toggleEditBio = false;


// Popup behaviour
bell.addEventListener('click', () => {
    if(!toggleNotif){
        notificationsBox.style.display = 'block';
    } else if(toggleNotif) {
        notificationsBox.style.display = 'none';
    }

    toggleNotif = !toggleNotif;
});

// When user clicks 'Edit' to edit their bio
editBio.addEventListener('click', () => {
    if(!toggleEditBio){
        let html;

        xhr = new XMLHttpRequest;

        xhr.open('GET', 'HTML/components/editbio.php', true);

        xhr.onload = function(){
            html = this.responseText;

            bio.insertAdjacentHTML('beforeend', html);
        }

        xhr.send();

        editBio.innerHTML = 'Cancel';
    } else if(toggleEditBio){
        const bioEditForm = get('id', 'bio-edit-form');

        bioEditForm.remove();

        editBio.innerHTML = 'Edit';
    }

    toggleEditBio = !toggleEditBio;
})