<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Rishton Academy Teacherspage</title>
    <link rel="stylesheet"  href="styles.css">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <h1>Teacher Registration</h1>
        <form action="register_teacher.php" method="post">
            <label for="teachername">Name:</label>
            <input type="text" id="teachername" name="teachername" required>
            
            <label for="teacheraddress">Address:</label>
            <input type="text" id="teacheraddress" name="teacheraddress" required>
            
            <label for="teacherphonenumber">Phone Number:</label>
            <input type="number" id="teacherphonenumber" name="teacherphonenumber">
            
            <label for="annualsalary">Annual Salary:</label>
            <input type="number" id="annualsalary" name="annualsalary">
            
            <label for="background">Background Check:</label>
            <input type="checkbox" id="background" name="background">
            
            <label for="classid">Class:</label>
            <select id="classid" name="classid" required>
                <?php
                $result_classes = $conn->query("SELECT classid, classname FROM schoolclasses WHERE classid NOT IN (SELECT classid FROM schoolteachers)");
                if ($result_classes) {
                    while ($row_classes = $result_classes->fetch_assoc()) {
                        echo "<option value='{$row_classes['classid']}'>{$row_classes['classname']}</option>";
                    }
                } else {
                    echo "<option value=''>No classes available</option>";
                    echo "Error: " . $conn->error;
                }
                ?>
            </select>
            
            <input type="submit" value="Register">
        </form>

        <h2>Registered Teachers</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Annual Salary</th>
                <th>Background Check</th>
                <th>Class</th>
            </tr>
            <?php
            $sql = "SELECT schoolteachers.teachername, schoolteachers.teacheraddress, schoolteachers.teacherphonenumber, schoolteachers.annualsalary, 
                           schoolteachers.background, schoolclasses.classname
                    FROM schoolteachers
                    LEFT JOIN schoolclasses ON schoolteachers.classid = schoolclasses.classid";
            $result = $conn->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['teachername']}</td>
                            <td>{$row['teacheraddress']}</td>
                            <td>{$row['teacherphonenumber']}</td>
                            <td>{$row['annualsalary']}</td>
                            <td>" . ($row['background'] ? 'Yes' : 'No') . "</td>
                            <td>{$row['classname']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Error: " . $conn->error . "</td></tr>";
            }
            ?>
        </table>

        <h2>Classes</h2>
        <table>
            <tr>
                <th>Class Name</th>
                <th>Class Capacity</th>
            </tr>
            <?php
            $sql_classes = "SELECT classname, classcapacity FROM schoolclasses";
            $result_classes = $conn->query($sql_classes);
            if ($result_classes) {
                while ($row_classes = $result_classes->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row_classes['classname']}</td>
                            <td>{$row_classes['classcapacity']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Error: " . $conn->error . "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
