document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("student-search");
    const table = document.querySelector(".table tbody");

    searchInput.addEventListener("input", function () {
        const searchValue = this.value.toLowerCase();
        const rows = table.querySelectorAll("tr");

        rows.forEach(function (row) {
            const admissionColumn = row.querySelector("td:nth-child(2)");
            const nameColumn = row.querySelector("td:nth-child(3)");
            const classColumn = row.querySelector("td:nth-child(5)"); // Assuming class is in the 5th column

            if (nameColumn && classColumn && admissionColumn) {
                const admissionName = admissionColumn.textContent.toLowerCase();
                const studentName = nameColumn.textContent.toLowerCase();
                const studentClass = classColumn.textContent.toLowerCase();

                // Check if the name or class contains the search value
                const admissionMatch = admissionName.includes(searchValue);
                const nameMatch = studentName.includes(searchValue);
                const classMatch = studentClass.includes(searchValue);

                if (nameMatch || classMatch || admissionMatch ) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        });
    });
});







    // document.addEventListener("DOMContentLoaded",function () {
    //     const searchInput = document.getElementById("student-search");
    //     const table = document.querySelector(".table tbody");

    //     searchInput.addEventListener("input", function () {
    //         const searchValue = this.value.toLowerCase();
    //         const rows = table.querySelectorAll("tr");

    //         rows.forEach(function (row) {
    //             const nameColumn = row.querySelector("td:nth-child(2)");
    //             if (nameColumn) {
    //                 const studentName = nameColumn.textContent.toLowerCase();
    //                 if (studentName.includes(searchValue)) {
    //                     row.style.display = "";
    //                 } else {
    //                     row.style.display = "none";
    //                 }
    //             }
    //         });
    //     });
    // });




    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("teacher-search");
        const table = document.querySelector(".table tbody");
    
        searchInput.addEventListener("input", function () {
            const searchValue = this.value.toLowerCase();
            const rows = table.querySelectorAll("tr");
    
            rows.forEach(function (row) {
                const nameColumn = row.querySelector("td:nth-child(2)");
                const positionColumn = row.querySelector("td:nth-child(4)");
    
                if (nameColumn && positionColumn) {
                    const teacherName = nameColumn.textContent.toLowerCase();
                    const Position = positionColumn.textContent.toLowerCase();
    
                    // Check if either name or position includes the search value
                    if (teacherName.includes(searchValue) || Position.includes(searchValue)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                }
            });
        });
    });
    


    // document.addEventListener("DOMContentLoaded", function () {
    //     const searchInput = document.getElementById("teacher-search");
    //     const table = document.querySelector(".table tbody");

    //     searchInput.addEventListener("input",function () {
    //         const searchValue = this.value.toLowerCase();
    //         const rows = table.querySelectorAll("tr");

    //         rows.forEach(function (row) {
    //             const nameColumn = row.querySelector("td:nth-child(2)");
    //             if (nameColumn) {
    //                 const teacherName = nameColumn.textContent.toLowerCase();
    //                 if (teacherName.includes(searchValue)) {
    //                     row.style.display = "";
    //                 } else {
    //                     row.style.display = "none";
    //                 }
    //             }
    //         });
    //     });
    // });


    // document.addEventListener("DOMContentLoaded", function () {
    //     const searchInput = document.getElementById("student-search");
    //     const tableBodyPlaceholder = document.getElementById("table-body-placeholder");
    
    //     searchInput.addEventListener("input", function () {
    //         const searchValue = this.value.toLowerCase().trim();
    
    //         // Make an AJAX request to search.php with the searchValue
    //         $.ajax({
    //             type: "POST",
    //             url: "studentSearch.php",
    //             data: { search: searchValue },
    //             success: function (response) {
    //                 // Replace the table body with the search results
    //                 tableBodyPlaceholder.innerHTML = response;
    //             }
    //         });
    //     });
    // });
    


    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("receipt-search");
        const tableBodyPlaceholder = document.getElementById("table-body-placeholder");
    
        searchInput.addEventListener("input", function () {
            const searchValue = this.value.toLowerCase().trim();
    
            // Make an AJAX request to search.php with the searchValue
            $.ajax({
                type: "POST",
                url: "search.php",
                data: { search: searchValue },
                success: function (response) {
                    // Replace the table body with the search results
                    tableBodyPlaceholder.innerHTML = response;
                }
            });
        });
    });

    // document.addEventListener("DOMContentLoaded", function () {
    //     const searchInput = document.getElementById("student-search");
    //     const StudentTableBodyPlaceholder = document.getElementById("student-table-body-placeholder");
    
    //     searchInput.addEventListener("input", function () {
    //         const searchValue = this.value.toLowerCase().trim();
    
    //         // Make an AJAX request to studentsearch.php with the searchValue
    //         $.ajax({
    //             type: "POST",
    //             url: "studentSearch.php",
    //             data: { search_student: searchValue },
    //             success: function (response) {
    //                 // Replace the table body with the search results
    //                 StudentTableBodyPlaceholder.innerHTML = response;
    //             }
    //         });
    //     });
    // });


    
    