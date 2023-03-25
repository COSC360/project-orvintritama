<!DOCTYPE html>    
<html>    
<head>    

    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
    <link rel="stylesheet" type="text/css" href="css/register.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="./javascript/register-validation.js"></script>      
</head>    

<body>
  
    <div class="register-container">
        
        <h2>Register Page</h2>
        <form id="register-form" method="post" action="./includes/handler/register-handler.php" onsubmit="return validatePassword()">  
            <div class="form-group">
                <label for="fullname"><b>Full Name</b></label>   
                <input class ="form-control" type="text" name="fullname" id="fullname" placeholder="Full Name">
            </div>
            <br>
            <div class="form-group">
                <label for="username"><b>Username</b></label><br>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username" 
                pattern="[a-zA-Z0-9]{5,15}"
                title="Must contain only numbers, lowercase and uppercase letter, and has 5-15 characters long"
                >
            </div>
            <br>
            <div class="form-group">
                <label for="password"><b>Password</b></label><br>
                <input class ="form-control" type="password" name="password" id="password" placeholder="Password"
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_\W]).{6,15}$" 
                title="Must contain at least one number and one uppercase and lowercase letter, 1 special character and has 6-15 characters long"
                >
            </div>
            <br>
            <div class="form-group">
                <label for="confirm-password"><b>Confirm Password</b></label><br>
                <input class ="form-control" type="password" name="confirm-password" id="confirm-password" placeholder="Password">
            </div>
            <br>
            <div class="form-group">
                <label for="email"><b>Email</b></label><br>    
                <input class="form-control" type="email" name="email" id="email" placeholder="E-mail">
            </div>
            <br>
            <button class="btn btn-primary" type="submit" name="register" id="register-button">Register</button>     
        </form>     

    </div>    
</body>    
</html>     