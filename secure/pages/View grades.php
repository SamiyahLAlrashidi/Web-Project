!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Student Information</title>
    <link rel=stylesheet type="text/css" href="../css/StudentStyle.css">
  </head>
    
<header><ul>
  <li><a href="../pages/logout.php">Logout</a></li>    
  <li><a href="../pages/StudentHomePage.html">Student Home Page</a></li>
  <li style="float:right"><a class="active" href="../pages/View%20grades.php">View Grades</a></li>
</ul></header>        
     <body style="background:#f3f3e9">   
  <img src="../images/logo.svg" align="right" width="150" height="150" alt="">
         <br><br><br><br>
    <div class="center">
  
    <img style="align-content:center" src="../images/grades.svg" width="150" height="150">
 
</div>                          
             <?php
                     include('../config/session.php');
include('../config/db.php');
if (isset($_SESSION['id'])){
    $id= $_SESSION['id'];

$sql =$conn->prepare("SELECT gpa FROM students WHERE id =?");
$sql->bind_param('i', $id);
$sql->execute();
$result = $sql->get_result();

}



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>                
        <div class="center">
            <form method="get" action="">
            <fieldset style="background:#fff">
              <legend>Grades</legend>
               <p> <label Style="text-align:left">Cumulative GPA</label>
                <input type="text" name="gpa" value="<?php echo $row["gpa"] ?>" disabled/><br></p>
                                </fieldset>
                  
            </form>
                       <br> <br><br>
            <br><br><br> 
            <br><br><br> 
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
