<?php
require 'db_conn.php';

if (isset($_POST['adduser'])) {

    if (!empty($_POST['username'])){
        $username = $_POST['username'];
    } else {
        echo "Name is required";
        exit();
    }

    $sqlquery = "INSERT INTO user(name) VALUES (:name)";
    $sqlprepare = $pdo->prepare($sqlquery);
    $sqlprepare->execute([':name' => $username]);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3 class="mb-4">Create User</h3>
        
        <form method="POST" action="UserAdd.php">
            <div class="mb-3">
                <label for="userName" class="form-label">User Name</label>
                <input type="text" name = "username" class="form-control" id="userName"  placeholder="Enter user name" required>
            </div>

            <button type="submit" name = "adduser" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>
</html>