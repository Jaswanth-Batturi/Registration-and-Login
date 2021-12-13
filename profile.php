<?php
   require "connect.php";
   session_start();
   if(!isset($_SESSION['employeeID'])){
        session_destroy();
        header("location: login.php");
   }
   
   $employeeID = $_SESSION['employeeID'];
   $sql = "SELECT empID as 'Employee ID', empName as 'Name', DoJ as 'Date of Joining', salary as 'Salary', department as 'Department', mobileNo as 'Mobile No', email as 'Email' FROM emp WHERE empID = '$employeeID'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $keys = array_keys($row);
   $name = $row['Name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
    body {
      height: 80vh;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          &nbsp;<a href="logout.php"><button class="btn btn-primary" type="submit">Sign Out</button></a>
        </div>
  </nav>
    <div class="container border border-3 p-3" style="background-color:#D3D3D3; max-width: 450px;">
      <div align = 'center' style = "background-color:#333333; color:#FFFFFF; padding:7px;"><h2>Profile</h2></div><br>
        <?php
        echo "<table class='table table-hover'>";
        foreach ($keys as $key) {
            echo "<tr>";
            echo "<th scope='row'>$key</th>";
            echo "<td>$row[$key]</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    <br>
    <div align = "center" class="d-grid gap-2">
        <a href="update.php"><button class="btn btn-primary" type="submit">&nbsp;&nbsp;&nbsp;Update&nbsp;&nbsp;&nbsp;</button></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>