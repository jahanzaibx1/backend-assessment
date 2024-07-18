<?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Rishton Academy Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <h1>Student Registration Form</h1>
        <form action="register_student.php" method="post">

        <!-- here making input fields of student Registration and add validation in some fields  -->
         
            <label for="pupilname">Name:</label>
            <input type="text" id="pupilname" name="pupilname" required>
            
            <label for="pupiladdress">Current Address:</label>
            <input type="text" id="pupiladdress" name="pupiladdress" required>
            
            <label for="pupilgender">Gender:</label>
            <select id="pupilgender" name="pupilgender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Female">prefer not</option>
            </select>
            
            <label for="pupilphonenumber">Phone Number:</label>
            <input type="number" id="pupilphonenumber" name="pupilphonenumber">
            
            <label for="medicalinfo">Medical Information:</label>
            <textarea id="medicalinfo" name="medicalinfo"></textarea>
            
            <label for="classid">Select Class</label>
            <select id="classid" name="classid" required>
                <?php
                $result = $conn->query("SELECT classid, classname FROM schoolclasses");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['classid']}'>{$row['classname']}</option>";
                }
                ?>
            </select>

            <h2>Parent/Guardian Information</h2>

        <!-- here making input fields of parent/guardian Registration and add validation in some fields  -->

            <label for="parent1name">Parent/Guardian Name:</label>
            <input type="text" id="parent1name" name="parent1name" required>
            
            <label for="parent1address">Address:</label>
            <input type="text" id="parent1address" name="parent1address" required>
            
            <label for="parent1email">Email Address:</label>
            <input type="email" id="parent1email" name="parent1email">
            
            <label for="parent1phone">Phone Number:</label>
            <input type="number" id="parent1phone" name="parent1phone">
            
            <hr>
            
            <label for="parent2name">Parent/Guardian Name (Optional):</label>
            <input type="text" id="parent2name" name="parent2name">
            
            <label for="parent2address">Address:</label>
            <input type="text" id="parent2address" name="parent2address">
            
            <label for="parent2email">Email Address:</label>
            <input type="email" id="parent2email" name="parent2email">
            
            <label for="parent2phone">Phone Number:</label>
            <input type="number" id="parent2phone" name="parent2phone">
            
            <input type="submit" value="Register">
        </form>

        <h2>Registered Students Data</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Medical Info</th>
                <th>Class</th>
                <th>Parent/Guardian 1</th>
                <th>Parent/Guardian 2</th>
            </tr>
            <?php
            $sql = "SELECT pupils.pupilname, pupils.pupiladdress, pupils.pupilgender, pupils.pupilphonenumber, pupils.medicalinfo, 
                    schoolclasses.classname,
                    parents.parentname AS parent1name, parents.parentname2optional AS parent2name
                    FROM pupils
                    LEFT JOIN schoolclasses ON pupils.classid = schoolclasses.classid
                    LEFT JOIN pupilparents ON pupils.pupilid = pupilparents.pupilid
                    LEFT JOIN parents ON pupilparents.parentid = parents.parentid";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['pupilname']}</td>
                        <td>{$row['pupiladdress']}</td>
                        <td>{$row['pupilgender']}</td>
                        <td>{$row['pupilphonenumber']}</td>
                        <td>{$row['medicalinfo']}</td>
                        <td>{$row['classname']}</td>
                        <td>{$row['parent1name']}</td>
                        <td>{$row['parent2name']}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
