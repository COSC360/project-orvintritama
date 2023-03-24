window.onload= function() {
    console.log('test');
}

function processButton() {
    var buttonText = document.getElementById("my-account-edit-button");
    
    // enable the form if it's still "Edit profile"
    if (buttonText.innerHTML == "Edit Profile") {
        document.getElementById("my-account-edit-button").innerHTML = "Save";
        document.getElementById("fullname").disabled = false;
        document.getElementById("username").disabled = false;
        console.log("here");
        return false;
    }

    // Process in myaccount-edit-handler.php otherwise 
};