<?php
include('db_connect.php');

// Retrieving form data
$teachername = $_POST['teachername'];
$teacheraddress = $_POST['teacheraddress'];
$teacherphonenumber = $_POST['teacherphonenumber'];
$annualsalary = $_POST['annualsalary'];
$background = isset($_POST['background']) ? 1 : 0;
$classid = $_POST['classid'];

// with this Checking that if the selected class already has a teacher
$stmt_check = $conn->prepare("SELECT teacherid FROM schoolteachers WHERE classid = ?");
$stmt_check->bind_param("i", $classid);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo "class already has a teacher assigned.";
} else {
    //Inserting a new teacher if the class is available in the dropdown list
    $sql = "INSERT INTO schoolteachers (teachername, teacheraddress, teacherphonenumber, annualsalary, background, classid) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdi", $teachername, $teacheraddress, $teacherphonenumber, $annualsalary, $background, $classid);

    if ($stmt->execute()) {
        echo "New teacher registered successfully!!!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt_check->close();
$stmt->close();
$conn->close();

header('Location: teachers.php');
// After insertion it can redirecting back to teacher.php page

?>
