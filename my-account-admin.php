<?php
    include("includes/db.php");
    include("includes/classes/Category.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");
    session_start();

    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];
        $user = new User($con, $userId);
    }
?>

<!DOCTYPE html>    
<html>    
<head>    

    <title>My Account - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
    <link rel="stylesheet" type="text/css" href="css/my-account-admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- <script src="./javascript/admin-statistics-ajax.js"></script> -->
    <script>
    window.onload = function() {
    console.log("Test");
    // $(document).delegate("#btnBasicResponse", "click", function() {

        // Ajax config
        $.ajax({
            url: './includes/handler/admin-statistics-handler.php', // get the route value
            success: function (response) {//once the request successfully process to the server side it will return result here
                //parse json
                response = JSON.parse(response);
                // console.log(response);
                let date = response[0];
                let userCount = response[1];
                let deletedUserCount = response[2];
                
                
                let p = document.getElementById('date');
                p.innerHTML = "Current Date: " + date;

                p = document.getElementById('userCount');
                p.innerHTML = "Total User Registered: " + userCount;

                p = document.getElementById('deletedUserCount');
                p.innerHTML = "Total User Deleted: " +deletedUserCount;
            }
        });

    // });

    };
        </script>


    
 </head>    

<body>
    <?php include("./includes/shared/navigation-bar.php")?>

    <!-- Body Container -->
  <div class="container-fluid">
    <div class="row">

      
      <!-- Left Filter Container -->
      <div class="col-5 statistics-container">
        <div class="card">
          <h4 class="card-header">Admin Statistics</h4>
          <ul class="list-group list-group-flush">
            <p id="date" class="list-group-item"></a>
            <p id="userCount" class="list-group-item"></a>
            <p id="deletedUserCount" class="list-group-item"></a>
          </ul>
        </div>
      </div>

      <!-- Main Container -->
      <div class="col-7 ban-container">
            <div class="card">
                <h4 class="card-header">Welcome back, Admin 1!</h4>
           
                <form class="w-75 ban-user-form" method="POST" action="./includes/handler/delete-user-handler.php">
                    <h5>Enter details to delete</h5>
                    <div class="form-group">
                        <input class="form-control" name="username" type="text" id="ban-user-search" placeholder="Enter username to be banned">
                    </div>
                    <br>
                    <div class="form-group">
                        <input class="form-control" name="reason" type="text" id="ban-user-description" placeholder="Enter reason here">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-danger ms-2" type="button" value="Delete"></button>
                </form>

                <ul class="list-group list-group-flush">
                
                    <li class="list-group-item">
                        <h5>Deleted Users List:</h5>
                    </li>
                    
                    <?php
                    $findBanUserQuery = mysqli_query($con, "SELECT * FROM deleteuser");
                    while($row = mysqli_fetch_array($findBanUserQuery)) {

                        echo "<li class='list-group-item'>
                        <div class='card-body'>
                            <h6 class='font-weight-bold'>Username:
                                <small class='text-muted'>" . $row['username'] ."</small>
                            </h6>
                            <h6 class='font-weight-bold'>Date Banned:
                                <small class='text-muted'>" . $row['deleteDate'] . "</small>
                            </h6>
                            <h6 class='font-weight-bold'>Reason:
                                <small class='text-muted'>" . $row['deleteReason'] . "</small>
                            </h6>
                        </div>
                    </li>";
                    }
            
                    ?>
                
        
                </ul>
            </div>
      </div>
    </div>
  </div>
    
</body>    
</html>     