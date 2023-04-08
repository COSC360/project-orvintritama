$(document).ready(function(){

        // $(document).delegate("#btnBasicResponse", "click", function() {

            // Ajax config
            $.ajax({
                url: '../includes/handler/admin-statistics-handler.php', // get the route value
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
    
});