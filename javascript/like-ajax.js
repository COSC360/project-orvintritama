window.onload = function() {
// Button DOM
let btn = document.getElementById("like-button");
 
// Adding event listener to button
btn.addEventListener("click", () => {
 
    // Fetching Button value
    let btnValue = btn.value;
 
    // jQuery Ajax Post Request
    $.post('./includes/handler/like-handler.php', {
        postId: btnValue
    }, (response) => {
        // response from PHP back-end
        console.log(response);
    });
});
}

// $(document).ready(function(){
//     $("#like-button").click(function(){
//         var postId = $(this).attr('value');
//         $.ajax({
//             type: 'POST',
//             url: './includes/handler/like-handler.php',
//             data: {postId: postId},
//             // success: function(data) {
//             //     alert("hello");
//             // }
//         });
//     });
// });