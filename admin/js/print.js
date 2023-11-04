function GetPrint() {
    // Select the table
    var table = document.getElementById('myTable');
    console.log("Print button clicked");
    
    // Create a new window for printing
    var printWindow = window.open('', '', 'width=600,height=600');

    // Start building the HTML content for printing
    var htmlContent = '<html><head><title>FOOTHILLS INTERNATIONAL SCHOOL</title></head><body>';

    // Add a header
    htmlContent += '<h1>STAFF DETAILS</h1>';

    // Create a new table for printing
    htmlContent += '<table>';

    // Add table headers
    
    htmlContent += '<tr><th>FIRST NAME</th><th>LAST NAME</th><th>E-MAIL</th><th>POSITION</th><th>PHONE NUMBER</th></tr>';

    // Loop through the table rows and select specific columns 
    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
        var columns = rows[i].getElementsByTagName('td');
        var fname = columns[1].textContent; // Get the Name column
        var lname = columns[2].textContent;
        var email = columns[3].textContent;
        var position = columns[4].textContent;
        var phone_number = columns[5].textContent;
        
        
        htmlContent += '<tr><td>' + fname + '</td><td>' +  lname + '</td><td>' + email + '</td><td>' + position + '</td><td>' + phone_number + '</td></tr>';
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

