 <?php
// Include your database connection and necessary files
require 'connection.php';


// Get the search value from the AJAX request
$searchValue = $_POST['search_student'];

// Perform the search query
$query = "SELECT * FROM student WHERE 
    Student_Class LIKE '%$searchValue%' OR 
    Addmission_Date LIKE '%$searchValue%' OR 
    Student_Name LIKE '%$searchValue%'";
$query_run = mysqli_query($con, $query);

// Generate the HTML for the table body based on search results
if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $student) {
        ?>
        <tr>      
            <td><?= $student['ID']; ?></td>         
            <td><?= $student['Admission_Number']; ?></td>
            <td><?= $student['Student_Name']; ?></td>
            <td><?= $student['Addmission_Date']; ?></td>
            <td><?= $student['Student_Class']; ?></td>
            <td><?= $student['Date_Of_Birth']; ?></td>
            <td><?= $student['Gender']; ?></td>
            <td><?= $student['Nhis']; ?></td>
            <td><?= $student['Father_Name']; ?></td>
            <td><?= $student['Mother_Name']; ?></td>
            <td><?= $student['Parent_Contact']; ?></td> 
           
            
        </tr>
        <?php
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}
?>


                                        



