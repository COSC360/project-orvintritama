window.onload = function() {
    console.log("Test");
    const form = document.getElementById('register-form');
    form.addEventListener('submit', function(event) {
        var fullNameInput = document.getElementById("fullname");
        var fullNameInputValue = document.getElementById("fullname").value;
        
        if(fullNameInputValue == "") {
            fullNameInput.style.borderColor = 'red';
            event.preventDefault();
        }

        var username = document.getElementById("username");
        var usernameInputValue = document.getElementById("username").value;
        
        if(usernameInputValue == "") {
            username.style.borderColor = 'red';
            event.preventDefault();
        }

        var password = document.getElementById("password");
        var passwordInputValue = document.getElementById("password").value;
        
        if(passwordInputValue == "") {
            password.style.borderColor = 'red';
            event.preventDefault();
        }

        var confirmPassword = document.getElementById("confirm-password");
        var confirmPasswordInputValue = document.getElementById("confirm-password").value;
        
        if(confirmPasswordInputValue == "") {
            confirmPassword.style.borderColor = 'red';
            event.preventDefault();
        } 

        var email = document.getElementById("email");
        var emailInputValue = document.getElementById("email").value;
        
        if(emailInputValue == "") {
            email.style.borderColor = 'red';
            event.preventDefault();
        }
    });

    var fullNameInput = document.getElementById("fullname");
    fullNameInput.addEventListener('keypress', function(event){
        if(fullNameInput.value) {
            fullNameInput.style.borderColor = 'black';
        }
    });

    var username = document.getElementById("username");
    username.addEventListener('keypress', function(event){
        if(username.value) {
            username.style.borderColor = 'black';
        }
    });
    
    var password = document.getElementById("password");
    password.addEventListener('keypress', function(event){
        if(password.value){
            password.style.borderColor = 'black';
        }
    })

    var confirmPassword = document.getElementById("confirm-password");
    confirmPassword.addEventListener('keypress', function(event){
        if(confirmPassword.value){
            confirmPassword.style.borderColor = 'black';
        }
    })

    var email = document.getElementById("email");
    email.addEventListener('keypress', function(event){
        if(email.value){
            email.style.borderColor = 'black';
        }
    })
}

function validatePassword() {
    var passwordInputValue = document.getElementById("password").value;
    var confirmPasswordInputValue = document.getElementById("confirm-password").value;
    
    if(confirmPasswordInputValue != passwordInputValue) {
        alert("Passwords do not match, try again");
        return false;
    } 
}