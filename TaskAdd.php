<?php
require 'db_conn.php';

if (isset($_POST['addtask'])) {

    if (
        !empty($_POST['name']) &&
        !empty($_POST['description']) &&
        !empty($_POST['start_date']) &&
        !empty($_POST['end_date']) &&
        !empty($_POST['priority']) &&
        !empty($_POST['status']) &&
        !empty($_POST['category']) &&
        !empty($_POST['project_id'])
    ) {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $category = $_POST['category'];
        $project_id = $_POST['project_id'];

        $sqlquery = "INSERT INTO task
        (name, description, start_date, end_date, priority, status, category, project_id)
        VALUES
        (:name, :description, :start_date, :end_date, :priority, :status, :category, :project_id)";

        $sqlprepare = $pdo->prepare($sqlquery);
        $sqlprepare->execute([
            ':name' => $name,
            ':description' => $description,
            ':start_date' => $start_date,
            ':end_date' => $end_date,
            ':priority' => $priority,
            ':status' => $status,
            ':category' => $category,
            ':project_id' => $project_id
        ]);

        echo "Task added successfully!";

    } else {
        echo "All fields are required";
        exit();
    }
}

$fetch_user_data = "SELECT * FROM projects 
 LEFT JOIN tasks ON projects.project_id = tasks.project_id 
 WHERE projects.user_id = 15";

$statement = $pdo->prepare($fetch_user_data);
$statement->execute();

$fetch_user_data = $statement->fetchAll();

//echo "<pre>";
//print_r($fetch_user_data);

$user_id = 15;
$priority = "high";

$taskquery = "SELECT * FROM tasks 
JOIN projects ON tasks.project_id = projects.project_id 
WHERE projects.user_id = :user_id 
AND tasks.priority = :priority 
AND tasks.archived = 0";

$task_filter = $pdo->prepare($taskquery);
$task_filter->execute([
    ':user_id' => $user_id,
    ':priority' => $priority]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3 class="mb-4">Add Task</h3>

        <form method="POST" action="">

            <!-- Task Name -->
            <div class="mb-3">
                <label class="form-label">Task Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <!-- Start Date -->
            <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <!-- End Date -->
            <div class="mb-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <!-- Priority -->
            <div class="mb-3">
                <label name="priority" class="form-label">Priority</label>
                <select name="priority" class="form-control" required>
                    <option value="" disabled>Select</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="" disabled>Select</option>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="done">Done</option>
                </select>
            </div>
            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-control" required>
                    <option value="" disabled>Select</option>
                    <option value="pending">Fix</option>
                    <option value="in_progress">Bug</option>
                </select>
            </div>


            <!-- Project ID -->
            <div class="mb-3">
                <label class="form-label">Project ID</label>
                <input type="number" name="project_id" class="form-control" required>
            </div>

            <button type="submit" name= "addtask" class="btn btn-primary">Add Task</button>
        </form>
    </div>
</div>

</body>
</html>