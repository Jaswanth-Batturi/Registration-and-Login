<?php
   require "connect.php";
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $employeeID = mysqli_real_escape_string($db,$_POST['empID']);
      $password = mysqli_real_escape_string($db,$_POST['passwd']); 
      
      $sql = "SELECT * FROM emp WHERE empID = '$employeeID' and passwd = '$password'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         $phone = mysqli_real_escape_string($db,$_POST['mobileNo']);
         $email = mysqli_real_escape_string($db,$_POST['email']);
         $sql = "UPDATE emp SET mobileNo = '$phone', email = '$email' WHERE empID = '$employeeID'";
         $result = mysqli_query($db,$sql);
         $_SESSION['employeeID'] = $employeeID;
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
  <title>Update Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    body {
      height: 90vh;
    }
  </style>
</head>

<body >
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          &nbsp;<a href="profile.php"><button class="btn btn-primary" type="submit">Back to Profile</button></a>
        </div>
  </nav>

  <div class="container border border-3 p-3" style="background-color:#D0D0D0; max-width: 400px;">
    <div align = 'center' style = "background-color:#333333; color:#FFFFFF; padding:7px;"><h2>Update</h2></div><br>
    <?php
    if (isset($status) && $status==1) {
      echo '<div class="alert alert-success" role="alert">';
      echo '<span><i class="bi-check-circle-fill"></i></span> ';
      echo "Your details are successfully updated";
      echo '</div>';
    }
    else if (isset($status) && $status==0) {
      echo '<div class="alert alert-danger" role="alert">';
      echo '<span><i class="bi bi-exclamation-triangle-fill"></i></span> ';
      echo "Your Employee ID or Password is invalid";
      echo '</div>';
    }
    ?>
    <form action="" method="POST">
      <div class="form-floating mb-3">
        <input type="text" name="empID" class="form-control" id="empID" placeholder="Employee ID" required>
        <label for="empID">Employee ID</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="passwd" class="form-control" id="passwd" placeholder="Password" required>
        <label for="passwd">Password</label>
      </div>
      <div class="form-floating mb-3">
        <input type="tel" name="mobileNo" class="form-control" id="mobileNo" placeholder="Mobile No" required>
        <label for="empID">New Mobile No</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
        <label for="empID">New Email</label>
      </div>
      <div class="d-grid gap-2">
        <br><button class="btn btn-primary" type="submit">Submit</button><br>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>