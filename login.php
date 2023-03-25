<!DOCTYPE html>    
<html>    
<head>    

    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="./javascript/login-validation.js"></script>
</head>    

<body>
  
    <div class="login-container">
        
        <h2>Login Page</h2>
        <form id="login-form" method="post" action="./includes/handler/login-handler.php">  
            
            <div class="form-group">
                <label for="username"><b>Username</b></label>   
                <input class ="form-control" type="text" name="username" id="username" placeholder="Username">
            </div>
            <br>
            <div class="form-group">
                <label for="password"><b>Password</b></label><br>
                <input class ="form-control" type="password" name="password" id="password" placeholder="Password"
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_\W]).{6,15}$" 
                title="Must contain at least one number and one uppercase and lowercase letter, 1 special character and has 6-15 characters long">
            </div>
            <br>
           
            <button class="btn btn-primary" type="submit" name="login" id="login-button">Login</button>     
            
            <br>
            <p> Forgot your password? <a href="forgot-password.html">Recover Here</a></p>
        </form>     

    </div>    
</body>    
</html>     