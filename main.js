const addForm = document.getElementById("add-teacher-form");
const updateForm = document.getElementById("edit-teacher-form");
const showAlert = document.getElementById("showAlert");
const tbody = document.querySelector('tbody');
//const addModal = new Bootstrap.Modal(document.getElementById("addNewTeacherModal"));


// Add new user Ajax Request.
addForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(addForm);
    formData.append("add", 1);

    if(addForm.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        addForm.classList.add("was-validated");
        return false;
    } else {
        document.getElementById("add-teacher-btn").value = "please wait.........";

        const response = await fetch("action.php", {
            method: "POST", body: formData,
        }).then(data => data.text());
        showAlert.innerHTML = response;
        document.getElementById("add-teacher-btn").value = "Add Teacher";
        addForm.reset();
        addForm.classList.remove('was-validated');
        fetchAllTeachers();
        //addModal.hide();
    }

});

//Fetch All from Teachers Ajax request from the database
const fetchAllTeachers = async () =>{

    const data = await fetch("action.php?read=1", {
        method: "GET",

    });
    const response = await data.text();
   tbody.innerHTML = response;
}

  fetchAllTeachers();

  // Edit Teacher Ajax Request
  tbody.addEventListener('click', (e) =>{
    if(e.target && e.target.matches('a.editLink')){
        e.preventDefault();
        let id = e.target.getAttribute("id");
        editTeacher(id);
        
    }

  });

  const editTeacher = async (id) => {
    const data = await fetch (`action.php?edit=1&id=${id}`,{
        method: "GET",

    });
    const response = await data.json();
    document.getElementById('id').value = response.id;
    document.getElementById('fname').value = response.first_name;
    document.getElementById('lname').value = response.last_name;
    document.getElementById('email').value = response.email;
    document.getElementById('phone').value = response.phone;

  };

  //Update Teacher Ajax request

  updateForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(updateForm);
    formData.append("update", 1);

    if(updateForm.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        updateForm.classList.add("was-validated");
        return false;
    } else {
        document.getElementById("edit-teacher-btn").value = "please wait.........";

        const response = await fetch("action.php", {
            method: "POST", body: formData,
        }).then(data => data.text());
        showAlert.innerHTML = response;
        document.getElementById("edit-teacher-btn").value = "Add Teacher";
        updateForm.reset();
        updateForm.classList.remove('was-validated');
        fetchAllTeachers();
        //editModal.hide();
    }

});

// Delete Teacher Ajax Request

tbody.addEventListener('click', (e) =>{
    if(e.target && e.target.matches('a.deleteLink')){
        e.preventDefault();
        let id = e.target.getAttribute("id");

        // Ask for confirmation
        if (window.confirm("Are you sure you want to delete this Teacher?")) {
            deleteTeachers(id);
        }
    }
});

const deleteTeachers = async (id) => {
    const data = await fetch(`action.php?delete=1&id=${id}`,{
        method: 'GET',
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    fetchAllTeachers();
};

// Add this script to handle the search input and filtering
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("teacher-search");
    const table = document.querySelector(".table");

    // Function to perform the search
    const searchTable = () => {
        const query = searchInput.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");

        rows.forEach((row) => {
            const columns = row.getElementsByTagName("td");
            let found = false;

            for (let i = 1; i < columns.length - 1; i++) {
                const cell = columns[i];
                if (cell.textContent.toLowerCase().includes(query)) {
                    found = true;
                    break;
                }
            }

            row.style.display = found ? "" : "none";
        });
    };

    // Event listener for the search input
    searchInput.addEventListener("input", searchTable);
});