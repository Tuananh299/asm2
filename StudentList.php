<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
   
</head>
<body>
    <?php
    include "db_conn.php";
    $sql = "select * from students";
    //Executing query
    $result = mysqli_query($conn,$sql);
    ?>

    <table align="center" border="1px" cellpadding="0" cellspacing="0">
    <caption align="center">Student List</caption>
    <tr>
        <th>Rollno</th>
        <th>Student Fullname</th>
        <th>Address</th>
        <th>Email</th>
    </tr>

    <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {        
    ?>
    <tr>
        <td><?php echo $row['Rollno']; ?></td>
        <td><?php echo $row['Sname']; ?></td>
        <td><?php echo $row['Address']; ?></td>
        <td><?php echo $row['Email']; ?></td>

    </tr>
    <?php

        }

    ?>

    </table>
    
    
    <?php
    //Add student
    include "db_conn.php";
    if(isset($_POST['btnAdd']))
    {
        //Get data from student form
        $Rollno = $_POST['Rollno'];
        $Sname = $_POST['Sname'];
        $Address = $_POST['Address'];
        $Email = $_POST['Email'];
        if($Rollno=="" || $Sname=="" || $Address=="" || $Email=="")
        {
            echo "(*) is not empty";
        }
        else
        {
            //Retrieving data from table
            $sql = "select Rollno from students where Rollno='$Rollno'";
            //Executing query
            $result = mysqli_query($conn,$sql);
            //Testing exist data and then insert into table
            if(mysqli_num_rows($result)==0)
            {
                $sql = "INSERT INTO students VALUES ('$Rollno', '$Sname', '$Address', '$Email')";
                mysqli_query($conn,$sql);
                echo '<meta http-equiv="refresh" content="0; URL=StudentList.php"';
            }
            else
            {
                echo "Existed student in list";
            }

        }
    }

    ?>

    <form method="post" id="AddStudent">
        <table align="center" border="0" cellpadding="1" cellspacing="1">
           <caption align="center"><b>Adding Student</b></caption> 
           <tr>
                <td>Rollno</td>
                <td><input type="text" name="Rollno"/>(*)</td>
           </tr>

           <tr>
                <td>Student Name</td>
                <td><input type="text" name="Sname"/>(*)</td>
           </tr>

           <tr>
                <td>Student Address</td>
                <td><input type="text" name="Address"/>(*)</td>
           </tr>

           <tr>
                <td>Student Email</td>
                <td><input type="text" name="Email"/>(*)</td>
           </tr>

           <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Add" name="btnAdd"/>
                    <input type="reset" value="cancel" name="btnCancel"/>
                </td>
           </tr>
        </table>
    </form>

</body>
</html>