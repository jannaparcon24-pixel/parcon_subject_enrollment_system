<?php include 'db_connect.php'; 

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE student_id=$id");
    header("Location: students.php");
    exit;
}

// ADD
if (isset($_POST['add'])) {
    $student_no = $_POST['student_no'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO students (student_no, first_name, last_name, course, year_level, email) VALUES ('$student_no','$first_name','$last_name','$course','$year_level','$email')");
    header("Location: students.php");
    exit;
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['student_id'];
    $student_no = $_POST['student_no'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $email = $_POST['email'];
    $conn->query("UPDATE students SET student_no='$student_no', first_name='$first_name', last_name='$last_name', course='$course', year_level='$year_level', email='$email' WHERE student_id=$id");
    header("Location: students.php");
    exit;
}

$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_data = $conn->query("SELECT * FROM students WHERE student_id=$id")->fetch_assoc();
}

$result = $conn->query("SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
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
    <h2><?php echo $edit_data ? "Edit Student" : "Add Student"; ?></h2>
    <form method="POST" class="card p-3 mb-4">
        <?php if($edit_data){ echo '<input type="hidden" name="student_id" value="'.$edit_data['student_id'].'">'; } ?>
        <div class="row">
            <div class="col-md-4 mb-2"><label>Student No</label><input type="text" name="student_no" class="form-control" value="<?php echo $edit_data['student_no'] ?? ''; ?>" required></div>
            <div class="col-md-4 mb-2"><label>First Name</label><input type="text" name="first_name" class="form-control" value="<?php echo $edit_data['first_name'] ?? ''; ?>" required></div>
            <div class="col-md-4 mb-2"><label>Last Name</label><input type="text" name="last_name" class="form-control" value="<?php echo $edit_data['last_name'] ?? ''; ?>" required></div>
            <div class="col-md-4 mb-2"><label>Course</label><input type="text" name="course" class="form-control" placeholder="BSIT" value="<?php echo $edit_data['course'] ?? ''; ?>" required></div>
            <div class="col-md-4 mb-2"><label>Year Level</label><input type="text" name="year_level" class="form-control" placeholder="1st Year" value="<?php echo $edit_data['year_level'] ?? ''; ?>" required></div>
            <div class="col-md-4 mb-2"><label>Email</label><input type="email" name="email" class="form-control" value="<?php echo $edit_data['email'] ?? ''; ?>" required></div>
        </div>
        <?php if($edit_data){ ?>
            <button type="submit" name="update" class="btn btn-warning">Update Student</button>
            <a href="students.php" class="btn btn-secondary mt-2">Cancel</a>
        <?php } else { ?>
            <button type="submit" name="add" class="btn btn-primary">Add Student</button>
        <?php } ?>
    </form>

    <h2>Student List</h2>
    <table class="table table-striped">
        <tr><th>ID</th><th>Student No</th><th>Name</th><th>Course</th><th>Year</th><th>Email</th><th>Action</th></tr>
        <?php while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['student_id']; ?></td>
            <td><?php echo $row['student_no']; ?></td>
            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['year_level']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="students.php?edit=<?php echo $row['student_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="students.php?delete=<?php echo $row['student_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>