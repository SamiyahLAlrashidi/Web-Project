
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
          //  $conn = mysqli_connect("localhost", "Samiyah", "123456", "Student");
?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Addresses</title>
    <link rel=stylesheet type="text/css" href="../css/StudentStyle.css">
  </head>

    <header>
        <ul>
  <li><a href="../pages/logout.php">Logout</a></li>
  <li><a href="../pages/StudentHomePage.html">Student Home Page</a></li>
  <li><a href="../pages/Student%20Information.html">Student Information</a></li>
  <li style="float:right"><a class="active" href="../pages/Address.php">Address</a></li>
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

$sql =$conn->prepare("SELECT country, address, city, postal_code FROM students WHERE id =?");
$sql->bind_param('i', $id);
$sql->execute();
$result = $sql->get_result();
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
           
    <script type="text/javascript">
       function validat(){
         var error="";
        
         if (document.change.country.value=="")
             {
              error = "Country Must Entered ! ";
               //document.change.country.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.change.country.value.length>=256){
               error = "Country length should be less than 256 characters! ";
               //document.change.address.focus();
               document.getElementById("error").innerHTML=error;
               return false;
           }
         if (document.change.country.value.match(/^[a-zA-Z\s]*$/) === null) {
              error = "Country Must be a string value! ";
               //document.change.address.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
      

         if (document.change.address.value==""){
              error = "Address Must Entered ! ";
               //document.change.address.focus();
               document.getElementById("error").innerHTML=error;
               return false;
             
         }
         if (document.change.address.value.length>=256){
               error = "Address length should be less than 256 characters! ";
               //document.change.address.focus();
               document.getElementById("error").innerHTML=error;
               return false;
           }
         if (document.change.address.value.match(/^[a-zA-Z\s]*$/) === null) {
              error = "Address Must be a string value! ";
               //document.change.address.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.change.city.value=="") {
              error = "City Must Entered ! ";
               document.change.city.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.change.city.value.length>=256){
               error = "City length should be less than 256 characters! ";
               //document.change.address.focus();
               document.getElementById("error").innerHTML=error;
               return false;
           }
         if (document.change.city.value.match(/^[a-zA-Z\s]*$/) === null) {
              error = "City Must be a string value! ";
               //document.change.address.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.change.postal_code.value==""){
              error = "Postal Code Must Entered ! ";
               //document.change.postal_code.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.change.postal_code.value.length>=6 || document.change.postal_code.value.length<4){
               error = "Postal Code length should be between 4-5 numbers! ";
               //document.change.address.focus();
               document.getElementById("error").innerHTML=error;
               return false;
           }
         if (document.change.postal_code.value.match(/\d{4,5}/) == null) {
              error = "Pleases in Postal Code enter numbers only! ";
               //document.change.address.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
       
       
       }
           </script>

        <div class="centerF">
            <form  action="insert.php" name="change" method="POST" onsubmit="return(validat());">
           <fieldset style="background:#fff">
              <legend>Addresses</legend>
               <p> <label for="country">Country:</label>
                <input type="text" name="country" value="<?php echo $row["country"] ?>"/><br></p>
                <p><label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $row["address"] ?>"/><br></p>
               <p> <label for="city">City:</label>
                <input type="text" name="city" value="<?php echo $row["city"] ?>" /><br></p>
                 <p> <label for="postal_code">Postal:</label>
                <input type="text" name="postal_code" value="<?php echo $row["postal_code"] ?>" /><br></p>
               
                 <p id="error" style="margin:5px;   color:red; "></p>

                <input type="submit" value="Submit">
                                </fieldset>
                
            </form>


                       <br><br><br> <br><br><br> <br><br><br>
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
