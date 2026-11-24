<?php include 'db_connect.php';

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM subjects WHERE subject_id=$id");
    header("Location: subjects.php");
    exit;
}

// ADD
if (isset($_POST['add'])) {
    $code = $_POST['subject_code'];
    $name = $_POST['subject_title'];
    $units = $_POST['units'];
    $schedule = $_POST['schedule'];
    $slots = $_POST['slots'];
    $conn->query("INSERT INTO subjects (subject_code, subject_title, units, schedule, slots) VALUES ('$code','$name','$units','$schedule','$slots')");
    header("Location: subjects.php");
    exit;
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['subject_id'];
    $code = $_POST['subject_code'];
    $name = $_POST['subject_title'];
    $units = $_POST['units'];
    $schedule = $_POST['schedule'];
    $slots = $_POST['slots'];
    $conn->query("UPDATE subjects SET subject_code='$code', subject_title='$name', units='$units', schedule='$schedule', slots='$slots' WHERE subject_id=$id");
    header("Location: subjects.php");
    exit;
}

$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_data = $conn->query("SELECT * FROM subjects WHERE subject_id=$id")->fetch_assoc();
}

$result = $conn->query("SELECT * FROM subjects");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Subjects</title>
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
    <h2><?php echo $edit_data ? "Edit Subject" : "Add Subject"; ?></h2>
    <form method="POST" class="card p-3 mb-4">
        <?php if($edit_data){ echo '<input type="hidden" name="subject_id" value="'.$edit_data['subject_id'].'">'; } ?>
        <div class="row">
            <div class="col-md-4 mb-2"><label>Subject Code</label><input type="text" name="subject_code" class="form-control" placeholder="IT 101" value="<?php echo $edit_data['subject_code'] ?? ''; ?>" required></div>
            <div class="col-md-4 mb-2"><label>Subject Name</label><input type="text" name="subject_title" class="form-control" placeholder="Intro to Programming" value="<?php echo $edit_data['subject_title'] ?? ''; ?>" required></div>
            <div class="col-md-4 mb-2"><label>Units</label><input type="number" name="units" class="form-control" value="<?php echo $edit_data['units'] ?? ''; ?>" required></div>
            <div class="col-md-6 mb-2"><label>Schedule</label><input type="text" name="schedule" class="form-control" placeholder="Mon 8:00-10:00" value="<?php echo $edit_data['schedule'] ?? ''; ?>" required></div>
            <div class="col-md-6 mb-2"><label>slots</label><input type="text" name="slots" class="form-control" value="<?php echo $edit_data['slots'] ?? ''; ?>" required></div>
        </div>
        <?php if($edit_data){ ?>
            <button type="submit" name="update" class="btn btn-warning">Update Subject</button>
            <a href="subjects.php" class="btn btn-secondary mt-2">Cancel</a>
        <?php } else { ?>
            <button type="submit" name="add" class="btn btn-primary">Add Subject</button>
        <?php } ?>
    </form>

    <h2>Subject List</h2>
    <table class="table table-striped">
        <tr><th>ID</th><th>Code</th><th>Name</th><th>Units</th><th>Schedule</th><th>slots</th><th>Action</th></tr>
        <?php while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['subject_id']; ?></td>
            <td><?php echo $row['subject_code']; ?></td>
            <td><?php echo $row['subject_title']; ?></td>
            <td><?php echo $row['units']; ?></td>
            <td><?php echo $row['schedule']; ?></td>
            <td><?php echo $row['slots']; ?></td>
            <td>
                <a href="subjects.php?edit=<?php echo $row['subject_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="subjects.php?delete=<?php echo $row['subject_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this subject?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>