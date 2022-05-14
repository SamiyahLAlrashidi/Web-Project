<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Details</title>
    <link rel=stylesheet type="text/css" href="../css/StudentStyle.css">
  </head>
    <header>
        <ul>
  <li><a href="../pages/logout.php">Logout</a></li>
  <li><a href="../pages/StudentHomePage.html">Student Home Page</a></li>
  <li><a href="../pages/Student%20Information.html">Student Information</a></li>
  <li style="float:right"><a class="active" href="../pages/Contacts%20Details.html">Contact Details</a></li>
</ul>
    </header>

        <body style="background:#f3f3e9">
  <img src="../images/logo.svg" align="right" width="150" height="150" alt="">
           <br><br><br>
           <br><br><br>
           <br><br><br>
         <?php
include('../config/session.php');
include('../config/db.php');
//$id = $_SESSION['id']; 
if (isset($_SESSION['id'])){
    $id= $_SESSION['id'];


$sql =$conn->prepare("SELECT u_email, p_email, phone_num FROM students WHERE id =?");
$sql->bind_param('i', $id);
$sql->execute();
$result = $sql->get_result();
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="centerF">
            <form method="get" action="">
              <fieldset style="background:#fff">
              <legend>Contact Details</legend>
               <p> <label>University Email:</label>
                <input type="text" name="UEmail" value="<?php echo $row["u_email"]?>"  disabled/><br></p>
                <p><label>Personal Email:</label>
                <input type="text" name="PEmail" value="<?php echo $row["p_email"]?>" disabled/><br></p>
               <p> <label>Phone Number:</label>
                <input type="text" name="Phone" value="<?php echo $row["phone_num"]?>" disabled/><br></p>

                                </fieldset>
            </form>
                                              <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>

                    </div>
          <?php
    }
} else {
    echo "0 results";
}

$conn->close();
?>

    </body>
</html>
