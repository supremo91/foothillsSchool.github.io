<?php

require_once 'config.php';

class Database extends Config {
    // Insert User into Database

    public function insert($fname, $lname, $email, $phone){
        $sql = 'INSERT INTO teachers (first_name, last_name, email, phone) VALUES (:fname, :lname, :email, :phone)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone
        ]);

        return true;
    }

    //Fetch All Teachers from database
    public function read(){
        $sql = 'SELECT * FROM teachers ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result =$stmt -> fetchAll();
        return $result;
    }

    //fetch single user from database

    public function readOne($id) {
        $sql = 'SELECT * FROM teachers WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]); 
        $result =$stmt -> fetch();
        return $result;
    }

// Update  single user
public function update($id, $fname, $lname, $email, $phone) {
$sql = 'UPDATE teachers SET first_name = :fname, last_name = :lname, email= :email, phone= :phone WHERE id = :id';
$stmt = $this->conn->prepare($sql);
$stmt->execute([
    'fname' => $fname,
    'lname' => $lname,
    'email' => $email,
    'phone' => $phone,
    'id' => $id
]);

return true;



}

//Delete  Teacher from Database
public function delete($id) {
    $sql = 'DELETE FROM teachers WHERE id=:id';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    return true;
}

}

?>