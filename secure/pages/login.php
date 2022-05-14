<?php
include('../config/session.php');
include('../config/db.php');


if (isset($_POST['submit'])){
  $error ="";

  $email=mysqli_real_escape_string($conn, $_POST['email']);
  $pass=mysqli_real_escape_string($conn, $_POST['pass']);
  // $email = $_POST['email'];
  // $pass = $_POST['pass'];

  $pass = hash('sha256', $pass);
  //echo "hhe";
  // $query = "SELECT * FROM students WHERE p_email='$email' AND pass= '$pass'";
  // $queryA = "SELECT * FROM employee WHERE email='$email' AND pass= '$pass'";

  $query="SELECT * FROM students WHERE p_email=? AND pass=?";
  $queryA = "SELECT * FROM employee WHERE email=? AND pass=?";
  $stmt= $conn->prepare($query);
  $stmtA= $conn->prepare($queryA);

  $stmt->bind_param("ss", $email, $pass);
  $stmtA->bind_param("ss", $email, $pass);

  $stmt->execute();
  $result = $stmt->get_result();
  $stmtA->execute();
  $resultA = $stmtA->get_result();
  // $resultA = mysqli_query($conn,$queryA); ///admin result
  // $result = mysqli_query($conn,$query);
  $countA = mysqli_num_rows($resultA); ///result Admin
  $count = mysqli_num_rows($result);


$row = $result->fetch_assoc();
$rowA = $result->fetch_assoc();
  if($count == 1) {
   $_SESSION['id'] = $row['id'];
   header("location: StudentHomePage.html"); //here is student page
 }else if($countA == 1) {
    $_SESSION['id'] = $rowA['id'];
      header("location: Admin.php"); //here is admin page
 }
  else{
       $error = "Your Login Name or Password is invalid";

      }
} ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link href="../css/registration_main.css" rel="stylesheet" media="all">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="css/logStyle.css"> -->
    <title>Oracle PeopleSoft Sign-in</title>

  </head>
  <style media="screen">

    * {
  box-sizing: border-box;
  margin:0px;
  padding: 0px;
  }

  body, html {
    height: 100%;
    font-family: arial;
    letter-spacing: 1px;
  }

  .adpanner,.login {
  float: left;
  padding: 20px;
  width: 50%;
  min-height: 100vh;
  background: #f3f3e9;
  height: 300px; /* only for demonstration, should be removed */
  }
  .adpanner{
  background-image: url(../images/ads.jpg);
  background-position: right;
  background-size:cover;
  }

  .iaulogo{
  width: 100%;
  min-width: 200px;
  margin-bottom: 50px;
  margin-top: 25px;
  }

  /* Clear floats after the columns */
  section::after {
  content: "";
  display: table;
  clear: both;
  }
  .forgetPass, .usernameGroup , .passwordGroup , .forgetPass{
  margin:20px;
  }
  .forgetPass{
  font-size: 12px;
  }
  h2{
  color: #274162;
  font-weight: normal;
  margin-bottom: 25px;
  font-size: 1.5em;
  text-transform: uppercase;
  font-weight: bold;
  }
  @media (max-width: 600px) {
  .ad-panner, .login  {
    width: 100%;
    height: auto;
  }
  }

  </style>
  <body>
    <section>
      <div class="adpanner" >

                <img src="../images/ads.jpg" class="iaulogo" alt="">
      </div>
      <div class="login">

      <a href="../index.html">      <img src="../images/logo.svg" class="iaulogo" alt=""></a>

        <form  method="post">
          <img src="" alt="">
          <h2>USER LOGIN</h2>
          <br>
          <div class="usernameGroup">
            <label for="">User ID</label><br>
            <input type="text" name="email" value=""><br>
          </div>
          <div class="passwordGroup">
            <label for="">Password</label><br>
            <input type="password" name="pass" value="">
          </div>
          <div class="forgetPass">
            <p id="error"style="margin:5px;   color:red; "><?php echo $error ?></p>



          </div>
          <div class="container">
                <div class="p-t-15">
                    <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Log in </button>
                </div>

                </div>
          
        </form>


      </div>


</section>
  </body>
</html>
