// Make AJAX request to get_data.php
$.ajax({
    url: 'get_data.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
        // Handle successful response
        console.log('Total number of elements in the table: ' + data.total_rows);
        console.log('Total wait time: ' + data.total_wait_time);
    },
    error: function(xhr, status, error) {
        // Handle error
        console.error('Error: ' + error.message);
    }
});
