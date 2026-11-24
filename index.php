<?php include 'db_connect.php'; 
$total_students = $conn->query("SELECT COUNT(*) as c FROM students")->fetch_assoc()['c'];
$total_subjects = $conn->query("SELECT COUNT(*) as c FROM subjects")->fetch_assoc()['c'];
$total_enrollments = $conn->query("SELECT COUNT(*) as c FROM enrollments")->fetch_assoc()['c'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Subject Enrollment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Subject Enrollment System</a>
        <div>
            <a href="index.php" class="text-white me-3">Dashboard</a>
            <a href="students.php" class="text-white me-3">Students</a>
            <a href="subjects.php" class="text-white me-3">Subjects</a>
            <a href="enrollments.php" class="text-white">Enrollments</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Dashboard</h2>
    <p>Welcome to Subject Enrollment System</p>
    <div class="row">
        <div class="col-md-4"><div class="card p-3 bg-primary text-white"><h4>Total Students</h4><h2><?php echo $total_students; ?></h2><a href="students.php" class="btn btn-light">Go to Students</a></div></div>
        <div class="col-md-4"><div class="card p-3 bg-success text-white"><h4>Total Subjects</h4><h2><?php echo $total_subjects; ?></h2><a href="subjects.php" class="btn btn-light">Go to Subjects</a></div></div>
        <div class="col-md-4"><div class="card p-3 bg-warning"><h4>Total Enrollments</h4><h2><?php echo $total_enrollments; ?></h2><a href="enrollments.php" class="btn btn-light">Go to Enrollments</a></div></div>
    </div>
</div>
</body>
</html>