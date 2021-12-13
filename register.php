<?php
   require "connect.php";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $employeeID = mysqli_real_escape_string($db,$_POST['empID']);
      
      $sql = "SELECT * FROM emp WHERE empID = '$employeeID'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
		
      if($count == 0) {
         $password = mysqli_real_escape_string($db,$_POST['passwd']);
         $name = mysqli_real_escape_string($db,$_POST['empName']);
         $DOJ = mysqli_real_escape_string($db,$_POST['DoJ']);
         $salary = mysqli_real_escape_string($db,$_POST['salary']);
         $department = mysqli_real_escape_string($db,$_POST['department']);
         $phone = mysqli_real_escape_string($db,$_POST['mobileNo']);
         $email = mysqli_real_escape_string($db,$_POST['email']);
         $sql = "INSERT INTO emp VALUES('$employeeID','$password','$name','$DOJ','$salary','$department','$phone','$email')";
         $result = mysqli_query($db,$sql);
         $status = 1;
      }
      else {
         $status = 0;
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    body {
      height: 123vh;
      -moz-transform: scale(0.8, 0.8);
      zoom: 0.8;
      zoom: 80%;
    }
  </style>
</head>

<body class="d-flex justify-content-center align-items-center">
  <div class="container border border-3 p-3" style="background-color:#D0D0D0; max-width: 600px;">
    <div align = 'center' style = "background-color:#333333; color:#FFFFFF; padding:4px;"><h2>Register</h2></div><br>
    <?php
    if (isset($status) && $status==1) {
      echo '<div class="alert alert-success" role="alert">';
      echo '<span><i class="bi-check-circle-fill"></i></span> ';
      echo "Registration is Successful";
      echo '</div>';
    }
    else if (isset($status) && $status==0) {
      echo '<div class="alert alert-danger" role="alert">';
      echo '<span><i class="bi bi-exclamation-triangle-fill"></i></span> ';
      echo "Employee ID already exists";
      echo '</div>';
    }
    ?>
    <form action="" method="POST">
      <div class="form-floating mb-3">
        <input type="text" name="empID" class="form-control" id="empID" placeholder="Employee ID" required>
        <label for="empID">Employee ID</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="empName" class="form-control" id="empName" placeholder="Name" required>
        <label for="empID">Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" name="DoJ" class="form-control" id="DoJ" placeholder="Date of Joining" required>
        <label for="empID">Date of Joining</label>
      </div>
      <div class="form-floating mb-3">
        <input type="number" name="salary" class="form-control" id="salary" placeholder="Salary" required>
        <label for="empID">Salary</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="department" class="form-control" id="department" placeholder="Department" required>
        <label for="empID">Department</label>
      </div>
      <div class="form-floating mb-3">
        <input type="tel" name="mobileNo" class="form-control" id="mobileNo" placeholder="Mobile No" required>
        <label for="empID">Mobile No</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
        <label for="empID">Email</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="passwd" class="form-control" id="passwd" placeholder="Password" required>
        <label for="passwd">Password</label>
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit">Sign Up</button><br>
      </div>
    </form>
    Already have an account?&nbsp;<a href="login.php">Login here</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>