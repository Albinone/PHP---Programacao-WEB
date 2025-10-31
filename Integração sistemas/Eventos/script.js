function checkusername() {
    let username = document.getElementById("username");
    let msg = document.getElementById("feedback");

    if (username.value == '' || username.value.length < 5) {
        msg.innerText = 'Não está a cumprir os critérios';
    } else {
        msg.innerText ='';


    }

}

//dDOM Event handler
let username = document.getElementById("username");
username.onblur = checkusername;

// Event Listener

username.addEventListener('onblur', checkusername);

function checkusername2(minChars) {
    let username = document.getElementById("username");
    let msg = document.getElementById("feedback");

    if (username.value == '' || username.value.length < minChars) {
        msg.innerText = 'Não está a cumprir os critérios';
    } else {
        msg.innerText ='';
    }

}   

//username.addEventListener('onblur', checkusername(5));

username.addEventListener('onblur', function() {
    checkusername2(5);
});