$(document).ready(function () {
    // Function to fetch and update data
    function updateDashboardData() {
        $.ajax({
            url: 'fetch_dashboard_data.php', // Replace with the actual URL of your PHP file
            dataType: 'json',
            success: function (data) {
                // Update the content with fetched data
                $("#studentCount").text(data.studentCount);
                $("#teacherCount").text(data.teacherCount);
                $("#dailyTotalFees").text('$' + data.dailyTotalFees);
                $("#totalFees").text('$' + data.totalFees);
                $("receiptCount").text(data.receiptCount);

            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    }

    // Initial data update when the page loads
    updateDashboardData();

    // Set an interval to update the data periodically (e.g., every 5 seconds)
    setInterval(updateDashboardData, 5000); // Adjust the interval as needed
});


  document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search");
    const countSpan = document.getElementById("count");

    searchInput.addEventListener("input", function() {
      // Get the user's search query
      const query = searchInput.value;

      // Make an AJAX request to update the student count
      updateStudentCount(query);
    });

    function updateStudentCount(query) {
      // Create an XMLHttpRequest object
      const xhr = new XMLHttpRequest();

      // Define the URL for your server-side script that counts students
      const url = "fetch_dashboard_data.php"; // Replace with the actual URL

      // Set up the request
      xhr.open("GET", url + "?query=" + query, true);

      // Define the callback function
      xhr.onload = function() {
        if (xhr.status === 200) {
          // Parse the response from the server (should be the student count)
          const studentCount = parseInt(xhr.responseText);

          // Update the student count display
          countSpan.textContent = studentCount;
        }
      };

      // Send the request
      xhr.send();
    }
  });

