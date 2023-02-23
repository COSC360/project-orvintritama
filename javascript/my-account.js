window.onload = function() {

    const element = document.getElementById("my-account-edit-button");

    element.addEventListener("click", toggleInputAndValue);

    function toggleInputAndValue() {
        var buttonText = document.getElementById("my-account-edit-button").innerHTML;
        if (buttonText == "Edit Profile") {
            document.getElementById("my-account-edit-button").innerHTML = "Save";
            document.getElementById("fullname").disabled = false;
            document.getElementById("username").disabled = false;
            document.getElementById("password").disabled = false;
            document.getElementById("confirm-password").disabled = false;
            document.getElementById("email").disabled = false;
        } else {
            document.getElementById("my-account-edit-button").innerHTML = "Edit Profile";
            document.getElementById("fullname").disabled = true;
            document.getElementById("username").disabled = true;
            document.getElementById("password").disabled = true;
            document.getElementById("confirm-password").disabled = true;
            document.getElementById("email").disabled = true;
        }
    };
}