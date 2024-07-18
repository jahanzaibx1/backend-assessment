<?php
include('db_connect.php');

// Retrieving form data
$pupilname = $_POST['pupilname'];
$pupiladdress = $_POST['pupiladdress'];
$pupilgender = $_POST['pupilgender'];
$pupilphonenumber = $_POST['pupilphonenumber'];
$medicalinfo = $_POST['medicalinfo'];
$classid = $_POST['classid'];

// Now Inserting pupils data into 'pupils' table
$sql_pupil = "INSERT INTO pupils (pupilname, pupiladdress, pupilgender, pupilphonenumber, medicalinfo, classid) 
              VALUES ('$pupilname', '$pupiladdress', '$pupilgender', '$pupilphonenumber', '$medicalinfo', '$classid')";

if ($conn->query($sql_pupil) === TRUE) {
    $pupilid = $conn->insert_id; // Get the inserted pupil ID

// Now Inserting parent/guardian 1 and parent/guardian 2 data
    $parent1name = $_POST['parent1name'];
    $parent1address = $_POST['parent1address'];
    $parent1email = $_POST['parent1email'];
    $parent1phone = $_POST['parent1phone'];

    $parent2name = $_POST['parent2name'];
    $parent2address = $_POST['parent2address'];
    $parent2email = $_POST['parent2email'];
    $parent2phone = $_POST['parent2phone'];

    $sql_parents = "INSERT INTO parents (parentname, address, emailadd, phonenumber, parentname2optional, parent2address, parent2emailadd, parent2phonenumber) 
                    VALUES ('$parent1name', '$parent1address', '$parent1email', '$parent1phone', '$parent2name', '$parent2address', '$parent2email', '$parent2phone')";
    if ($conn->query($sql_parents) === TRUE) {
        $parentid = $conn->insert_id; 

        //here now Linking pupil and parents
        $sql_pupilparent = "INSERT INTO pupilparents (pupilid, parentid) VALUES ('$pupilid', '$parentid')";
        $conn->query($sql_pupilparent);
    }

    echo "New records created successfully!!!";
} else {
    echo "Error: " . $sql_pupil . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.php");
// After insertion it can redirecting back to indexpage

exit();
?>
