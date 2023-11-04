function GetPrint() {
    // Select the table
    var table = document.getElementById ('myTable');
    
    // Create a new window for printing
    var printWindow = window.open('', '', 'width=600,height=600');

    // Start building the HTML content for printing
    var htmlContent = '<html><head><title>FOOTHILLS INTERNATIONAL SCHOOL</title></head><body>';

    // Add a header
    htmlContent += '<h1>STUDENTS DETAILS</h1>';

    // Create a new table for printing
    htmlContent += '<table>';

    // Add table headers
    htmlContent += '<tr><th>ADMISSION NUMBER</th><th>NAME</th><th>ADDMISSION DATE</th><th>CLASS</th><th>DATE OF BIRTH</th><th>GENDER</th><th>NHIS</th><th>FATHER NAME</th><th>MOTHER NAME</th><th>PARENT NUMBER</th></tr>';

    // Loop through the table rows and select specific columns 
    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
        var columns = rows[i].getElementsByTagName('td');
        var adnum = columns[1].textContent;
        var name = columns[2].textContent; // Get the Name column
        var addmission = columns[3].textContent;
        var student_class = columns[4].textContent;
        var dob = columns[5].textContent;
        var gender = columns[6].textContent;
        var nhis = columns[7].textContent;
        var father_name = columns[8].textContent;
        var mother_name = columns[9].textContent;
        var parent_number = columns[10].textContent;
        
        htmlContent += '<tr><td>' + adnum + '</td><td>' + name + '</td><td>' +  addmission + '</td><td>' + student_class + '</td><td>' + dob + '</td><td>' + gender + '</td><td>' + nhis + '</td><td>' + father_name + '</td><td>' + mother_name + '</td><td>' + parent_number + '</td></tr>';
    }

    // Close the HTML content
    htmlContent += '</table></body></html>';

    // Write the HTML content to the new window
    printWindow.document.open();
    printWindow.document.write(htmlContent);
    printWindow.document.close();

    // Trigger the print dialog
    printWindow.print();
    printWindow.close();
}

function GetPrintPayment() {
    // Select the table
    var table = document.getElementById('myTable');
    
    // Create a new window for printing
    var printWindow = window.open('', '', 'width=600,height=600');

    // Start building the HTML content for printing
    var htmlContent = '<html><head><title>FOOTHILLS INTERNATIONAL SCHOOL</title></head><body>';

    // Add a header
    htmlContent += '<h1>PAYMENT DETAILS</h1>';

    // Create a new table for printing
    htmlContent += '<table>';


    // Add table headers
    htmlContent += '<tr><th>RECEIPT_ID</th><th>PAYMENT DATE</th><th>STUDENT NAME</th><th>PAID BY</th><th>AMOUNT PAID (GHC)</th><th>BALANCE (GHC)</th></tr>';

    // Loop through the table rows and select specific columns 
    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
        var columns = rows[i].getElementsByTagName('td');
        var receipt_id = columns[0].textContent; // Get the Name column
        var payment_date = columns[1].textContent;
        var student_name = columns[2].textContent;
        var paid_by = columns[3].textContent;
        var amount_paid = columns[4].textContent;
        var balance = columns[5].textContent;
       
        htmlContent += '<tr><td>' + receipt_id + '</td><td>' +  payment_date + '</td><td>' + student_name + '</td><td>' + paid_by + '</td><td>' + amount_paid + '</td><td>' + balance + '</td></tr>';
    }

    // Close the HTML content
    htmlContent += '</table></body></html>';

    // Write the HTML content to the new window
    printWindow.document.open();
    printWindow.document.write(htmlContent);
    printWindow.document.close();

    // Trigger the print dialog
    printWindow.print();
    printWindow.close();
}




function printReceipt(receiptId) {
    // Open a new browser window
    var printWindow = window.open('printreceipt.php?RECEIPT_ID=' + receiptId, '_blank');
    
    // Check if the new window has loaded
    printWindow.onload = function() {
        // Trigger the print function
        printWindow.print();
    };
}

