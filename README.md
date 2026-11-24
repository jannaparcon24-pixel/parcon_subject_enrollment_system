# Subject Enrollment System

A web-based CRUD application for managing student subject enrollments. Built with PHP, MySQL, HTML, and Bootstrap 5.

## Features

- Dashboard with live statistics from the database (total students, subjects, and enrollments)
- Student management: add, edit, and delete student records
- Subject management: add, edit, and delete subjects (code, title, units, schedule, slots)
- Enrollment management: enroll a student in a subject, update the status (Enrolled, Dropped, Completed), and delete enrollments
- Responsive layout using Bootstrap 5

## Project Structure

| File | Description |
|------|-------------|
| `index.php` | Dashboard with totals and quick links |
| `students.php` | Student CRUD |
| `subjects.php` | Subject CRUD |
| `enrollments.php` | Enrollment CRUD (links students to subjects) |
| `db_connect.php` | Database connection settings |

## Database Tables

**students**: `student_id`, `student_no`, `first_name`, `last_name`, `course`, `year_level`, `email`

**subjects**: `subject_id`, `subject_code`, `subject_title`, `units`, `schedule`, `slots`

**enrollments**: `enrollment_id`, `student_id`, `subject_id`, `status`, `date_enrolled`

## Setup (local)

1. Copy the project folder to `C:\xampp\htdocs\`
2. Start Apache and MySQL in XAMPP
3. Create a database named `enrollment_db` and import `enrollment_db.sql`
4. Open `db_connect.php` and set your local settings:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db   = "enrollment_db";
   ```
5. Open `http://localhost/parcon_subject_enrollment/` 

## Live site

(https://parcon-subject-enrollment-system.freepage.cc)

## Built with

- PHP
- MySQL
- HTML and CSS
- Bootstrap 5

Developed by: Janna S. Parcon BSIT 3SD
