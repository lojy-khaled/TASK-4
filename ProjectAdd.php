<?php
require 'db_conn.php';

if (isset($_POST['addtask'])) {

    if (!empty($_POST['projectname'])) {
        $project_name = $_POST['projectname'];
        $user_id = 15;

        $sqlquery = "INSERT INTO project(name, user_id) VALUES (:name, :user_id)";
        $sqlprepare = $pdo->prepare($sqlquery);
        $sqlprepare->execute([
            ':name' => $project_name,
            ':user_id' => $user_id
        ]);
    } else {
        echo "Project name is empty";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3 class="mb-4">Create Project</h3>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="projectName" class="form-label">Project Name</label>
                <input type="text" name="projectname" class="form-control" id="projectName"  placeholder="Enter project name" required>
            </div>

            <button type="submit" name="addtask" class="addtask">Submit</button>
        </form>
    </div>
</div>

</body>
</html>