window.onload = function() {

    const form = document.getElementById('login-form');
    
    form.addEventListener('submit', function(event) {
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
}