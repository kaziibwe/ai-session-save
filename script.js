$(document).ready(function() {
    // Function to send AJAX request
    function sendDataToServer() {
        $.ajax({
            url: 'insertData.php',
            method: 'POST',
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    // Call the function every 1 minute (adjust as needed)
    setInterval(sendDataToServer, 60000);
});
