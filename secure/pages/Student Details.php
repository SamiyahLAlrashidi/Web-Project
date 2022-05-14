<!DOCTYPE html>
<html>
     <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
          <link rel=stylesheet type="text/css" href="../css/StudentStyle.css">
         


    <title>Student Details</title>
  </head>
    
    <header>
    <link rel=stylesheet type="text/css" href="style3.css">

        <ul>
  <li><a href="../pages/logout.php">Logout</a></li>    
  <li><a href="../pages/StudentHomePage.html">Student Home Page</a></li>
  <li><a href="../pages/Student%20Information.html">Student Information</a></li>            
  <li style="float:right"><a class="active" href="../pages/Student%20Details.php">Student Details</a></li>
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
     
if (isset($_SESSION['id'])){
    $id= $_SESSION['id'];


$sql =$conn->prepare("SELECT name, DOB, gender FROM students WHERE id =?");
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
              <legend>Personal Details</legend>
               <p> <label>Name:</label>
                <input type="text" name="Name" value="<?php echo $row["name"]?>"  disabled/><br></p>
                <p><label>Date of Birth:</label>
                <input type="text" name="DOB" value="<?php echo $row["DOB"]?>" disabled/><br></p>
 
               <p> <label>Gender:</label>
                         <label class="radio-container m-r-45">Female
                         <input type="radio" name="gender" value="F" <?php if ($row["gender"] == 'F') echo 'checked="checked"'; ?> disabled/>
                         <span class="checkmark"></span>
                                            </label>
                   
                        <label class="radio-container">Male
                        <input type="radio" name="gender" value="M" <?php if ($row["gender"] == 'M') echo 'checked="checked"'; ?>  disabled/>
                        <span class="checkmark"></span>
                        
                                          </label>
                </p>
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
