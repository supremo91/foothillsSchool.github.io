// const addForm = document.getElementById("add-student-form");
// const updateForm = document.getElementById("edit-student-form");
// const showAlert = document.getElementById("showAlert");
// const tbody = document.querySelector('tbody');
// //const addModal = new Bootstrap.Modal(document.getElementById("addNewStudentModal"));


// // Add new user Ajax Request.
// addForm.addEventListener("submit", async (e) => {
//     e.preventDefault();
//     const formData = new FormData(addForm);
//     formData.append("add", 1);

//     if(addForm.checkValidity() === false) {
//         e.preventDefault();
//         e.stopPropagation();
//         addForm.classList.add("was-validated");
//         return false;
//     } else {
//         document.getElementById("add-student-btn").value = "please wait.........";

//         const response = await fetch("stdaction.php", {
//             method: "POST", body: formData,
//         }).then(data => data.text());
//         showAlert.innerHTML = response;
//         document.getElementById("add-student-btn").value = "Add Student";
//         addForm.reset();
//         addForm.classList.remove('was-validated');
//         fetchAllStudents();
//         //addModal.hide();
//     }

// });

// //Fetch All from Student Ajax request from the database
// const fetchAllStudents = async () =>{

//     const data = await fetch("stdaction.php?read=1", {
//         method: "GET",

//     });
//     const response = await data.text();
//    tbody.innerHTML = response;
// }

//   fetchAllStudents();

//   // Edit Student Ajax Request
//   tbody.addEventListener('click', (e) =>{
//     if(e.target && e.target.matches('a.editLink')){
//         e.preventDefault();
//         let id = e.target.getAttribute('id');
//         editStudent(id);
        
//     }

//   });

//   const editStudent = async (id) => {
//     const data = await fetch (`stdaction.php?edit=1&id=${id}`,{
//         method: "GET",

//     });


//     const response = await data.json();
//     document.getElementById('id').value =response.id;
//     document.getElementById('stdname').value = response.student_name;
//     document.getElementById('stdclass').value = response.student_class;
//     document.getElementById('dob').value = response.date_of_birth;
//     document.getElementById('gender').value = response.gender;
//     document.getElementById('pname').value = response.parent_name;
//     document.getElementById('pcontact').value = response.parent_contact;


//   };

//   //Update Student Ajax request

//   updateForm.addEventListener("submit", async (e) => {
//     e.preventDefault();

//     const formData = new FormData(updateForm);
//     formData.append("update", 1);

//     if(updateForm.checkValidity() === false) {
//         e.preventDefault();
//         e.stopPropagation();
//         updateForm.classList.add("was-validated");
//         return false;
//     } else {
//         document.getElementById("edit-student-btn").value = "please wait.........";

//         const response = await fetch("stdaction.php", {
//             method: "POST", body: formData,
//         }).then(data => data.text());
//         showAlert.innerHTML = response;
//         document.getElementById("edit-student-btn").value = "Add Student";
//         updateForm.reset();
//         updateForm.classList.remove('was-validated');
//         fetchAllStudents();
//         //editModal.hide();
//     }

// });



// // Delete Student Ajax Request
// tbody.addEventListener('click', (e) =>{
//     if(e.target && e.target.matches('a.deleteLink')){
//         e.preventDefault();
//         let id = e.target.getAttribute("id");

//         // Ask for confirmation
//         if (window.confirm("Are you sure you want to delete this student?")) {
//             deleteStudents(id);
//         }
//     }
// });

// const deleteStudents = async (id) => {
//     const data = await fetch(`stdaction.php?delete=1&id=${id}`,{
//         method: 'GET',
//     });
//     const response = await data.text();
//     showAlert.innerHTML = response;
//     fetchAllStudents();
// };




// /*tbody.addEventListener('click', (e) =>{
//     if(e.target && e.target.matches('a.deleteLink')){
//         e.preventDefault();
//         let id = e.target.getAttribute("id");
        
//         deleteStudents(id);
//        }

//   });

//   const deleteStudents = async (id) => {
//     const data = await fetch(`stdaction.php?delete=1&id=${id}`,{
//         method: 'GET',
//     });
//     const response = await data.text();
//     showAlert.innerHTML = response;
//   fetchAllStudents();
//   };*/


// // Add this script to handle the search input and filtering
// document.addEventListener("DOMContentLoaded", function () {
//     const searchInput = document.getElementById("student-search");
//     const table = document.querySelector(".table");

//     // Function to perform the search
//     const searchTable = () => {
//         const query = searchInput.value.toLowerCase();
//         const rows = table.querySelectorAll("tbody tr");

//         rows.forEach((row) => {
//             const columns = row.getElementsByTagName("td");
//             let found = false;

//             for (let i = 1; i < columns.length - 1; i++) {
//                 const cell = columns[i];
//                 if (cell.textContent.toLowerCase().includes(query)) {
//                     found = true;
//                     break;
//                 }
//             }

//             row.style.display = found ? "" : "none";
//         });
//     };

//     // Event listener for the search input
//     searchInput.addEventListener("input", searchTable);
// });