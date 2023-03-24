<?php
    include("includes/db.php");
    include("includes/classes/Category.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");

    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];
        $user = new User($con, $userId);
    }
?>

<!DOCTYPE html>    
<html>    
<head>    

    <title>My Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
    <link rel="stylesheet" type="text/css" href="css/my-account.css"> 
    <script src="./javascript/my-account-button.js"></script>   
 </head>    

<body>
    
    <?php include("./includes/shared/navigation-bar.php") ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Left Padding Container -->
            <div class="col-2">
            </div>

            <!-- Main Container -->
            <div class="col-8 main-container">
                <div class="card posts-container">
                    <h4 class="card-header d-flex justify-content-between align-items-center">
                        Welcome back to your account, <?php echo $user-> getFullName() ?>
                    </h4>

                    <form id="edit-profile-form" method="post" action="./includes/handler/myaccount-edit-handler.php" onsubmit="return processButton()">  

                        <div class="card">
                            <div class="form-group">
                                <h5 class="card-header">Full Name</h5>
                                <?php echo "<input class ='form-control' type='text' name='fullname' id='fullname' value='". $user -> getFullName() ."' disabled>" ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="form-group">
                                <h5 class="card-header">Username</h5>
                                <?php echo "<input class ='form-control' type='text' name='username' id='username' value='". $user -> getUsername() ."' disabled>" ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-sm btn-primary" id="my-account-edit-button">Edit Profile</button>
                            </div>
                        </div>
                    
                    </form>     
                </div>
            </div>

            <!-- Right Padding Container -->
            <div class="col-2">
            </div>
        </div>
</body>    
</html>     