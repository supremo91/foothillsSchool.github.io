<?php

require_once 'config.php';

class Database extends Config {
    // Insert Student into Database

    public function insert($stdname, $stdclass, $dob, $gender, $pname, $pcontact){
        $sql = 'INSERT INTO students (student_name, student_class, date_of_birth, gender, parent_name, parent_contact) VALUES (:stdname, :stdclass, :dob, :gender, :pname, :pcontact)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'stdname' => $stdname,
            'stdclass' => $stdclass,
            'dob' => $dob,
            'gender' => $gender,
            'pname' => $pname,
            'pcontact' => $pcontact,

        ]);

        return true;
    }

    //Fetch All Student from database
    public function read(){
        $sql = 'SELECT * FROM students ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result =$stmt -> fetchAll();
        return $result;
    }

    //fetch single student from database

    public function readOne($id) {
        $sql = 'SELECT * FROM students WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]); 
        $result =$stmt -> fetch();
        return $result;
    }

// Update  single student
public function update($id, $stdname, $stdclass, $dob, $gender, $pname, $pcontact) {
$sql = 'UPDATE students SET student_name = :stdname, student_class = :stdclass, date_of_birth= :dob, gender= :gender, 
parent_name= :pname, parent_contact= :pcontact WHERE id = :id';

$stmt = $this->conn->prepare($sql);
$stmt->execute([
   	        'stdname' => $stdname,
            'stdclass' => $stdclass,
            'dob' => $dob,
            'gender' => $gender,
            'pname' => $pname,
            'pcontact' => $pcontact,
            'id' => $id
]);

return true;



}

//Delete  student from Database
public function delete($id) {
    $sql = 'DELETE FROM students WHERE id=:id';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    return true;
}

}

?>