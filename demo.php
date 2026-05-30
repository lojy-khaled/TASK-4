<?php

require 'db.php';

//3alashan law el user msh 3ando id y3mlo assign = 1
$user_id=$_GET['user_id'] ?? 1;


// $username = $_POST['username'];
// $pass = $_POST['pass'];
// $hashed_pass = password_hash($pass,PASSWORD_DEFAULT);
// $email = $_POST['email'];
// $age = $_POST['age'];

// $emailType = filter_var($email,FILTER_VALIDATE_EMAIL);
// if (!$emailType){
//     echo "Invalid Email.";
//     exit();
// }

// if (empty($username) || empty($email)){
//     echo "Fill all required fields.";
//     exit();
// }

// $profile_pic = $_FILES['profile_pic']['name'] ?? null;
// $filepath = "uploads/" . $profile_pic;
// move_uploaded_file($_FILES['profile_pic']['tmp_name'],$filepath); 

// $sqlquery = "Insert into users(username,pass,email,age) values ('$username','$hashed_pass','$email','$age')";

// $statement = $connection->prepare($sqlquery);
// $statement->execute()

// $sqlquery = "SELECT * FROM users WHERE user_id = ?";
// $sql="SELECT * FROM users WHERE user_id >= :user_id";
// $statment= $connection->prepare($sqlquery);
// //named placeholder
// $statment->execute([':user_id' =>$user_id]);

// echo"Query ':user_id' executed successfully";


//Fetching methods (fetch law one record, fetchall multiple records):
// $sql="SELECT * FROM users WHERE user_id >= ?";
// $statment= $connection->prepare($sql);
// $statment->execute([$user_id]);

// if ($statment->rowCount()==0) {
// 	echo"no users found";
// }else {
// 	$users= $statment->fetchAll(PDO::FETCH_ASSOC);
// 	echo"<pre>";
// 	print_r($users);
// 	echo"</pre>";
// }


//aggregate fns:
// $query = $pdo->query("SELECT AVG(available_seats) AS avg_seats FROM courses");

// $result = $query->fetchAll();
// foreach ($result as $row) {
//     echo "Average available seats: " . $row["avg_seats"] ;
// }


// $query = $pdo->query("SELECT age, COUNT(*) as 'Number of users'
// FROM users group by age");

// $result = $query->fetchAll();
// foreach ($result as $row) {
//     echo "Number of users who have age: " . $row["age"];
// }

// JOIN:
// $query = $pdo->query("SELECT 
// departments.name,
// COUNT(users.user_id)
// FROM departments
// LEFT JOIN users 
// ON departments.department_id = users.department_id
// GROUP BY departments.department_id, departments.name;");

// $query = $pdo->query("
// SELECT departments.name, COUNT(users.user_id) AS number_of_users
// FROM departments 
// LEFT JOIN users  
// ON departments.department_id = users.department_id
// GROUP BY departments.department_id, departments.name
// ");

// $result = $query->fetchAll();

// foreach ($result as $row) {
//     echo "Department: " . $row["name"] .
//          "<br> Number of users: " . $row["number_of_users"] . "<br>";
// }

// $user_id = 3;
// $update = $connection->prepare("UPDATE users
// set name = ?, age = ?, email = ?
// where user_id = ?");

// $update->execute(['farah','22','farah@gmail.com',$user_id]);

// $softDelete = $connection->prepare("UPDATE users
// set is_deleted = 1 where user_id = :id");
// $softDelete->execute([':id'=> $_GET['id']]);

// try{
//     $harddel = $connection->prepare("delete from user where
//     user_id = :id");
//     $harddel->execute([
//         ':id'=>$_GET['id']
//     ]);
// }catch (PDOException $e){
//     echo "Error deleting user: " . $e->getMessage();
// }

//transactions:
$sql = "UPDATE accounts set balance = balance-500 where
name = 'Farah'";
$pdo->query($sql);

echo "500 has been deducted from Farah";

?>