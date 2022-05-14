<!DOCTYPE html>
<html class="pc chrome win psc_dir-rtl psc_form-xlarge" dir="ltr" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, width=device-width">
    <link rel="stylesheet" href="../css/StuInfo.css">
    <title>Student Information</title>
</head>

<script type="text/javascript">
    function validateID(){
        var error="";
        var numbers = /^[0-9]+$/;
        var letters = /^[A-Za-z]+$/;
        if (document.getElementById('id').value=="") {
               error = "Please Enter The ID Number!";
               document.getElementById("error").innerHTML=error;
               return false;}
        
        if (document.getElementById('id').value.length!=7 && document.getElementById('id').value.match(letters)===null) {
               error = "The ID length should not exceed 7!";
               document.getElementById("error").innerHTML=error;
               return false;}
        
        if (document.getElementById('id').value.match(numbers)===null) {
               error = "Please Enter Only Numbers!";
               document.getElementById("error").innerHTML=error;
               return false;}
                return( true );
         }      
        
</script>
<body>
<?php include("../header.php"); ?>
<form method="post" name="myForm" onsubmit = "return(validateID());">
    <div class="content">
        <div class="center">
           <label style="color:white" class="search_label">ID Number: </label>
           <input type="text" name="id" id="id">
           <input type="submit" value="Search" class="search" name="search">
           <p id="error" style="margin:5px;   color:red; "></p>
        </div>
    </div>
</form>

    <?php
    include('../config/db.php');
     if (isset($_POST['search']))
     {
         $sql = $conn->prepare("SELECT * FROM students WHERE id =?");
         $id = mysqli_real_escape_string($conn,$_POST['id']);
         $sql->bind_param('i', $id);
         $sql->execute();
         $result = $sql->get_result();
         
          while($row=mysqli_fetch_array($result))
          {
              ?>
 <script type="text/javascript">
    function validateInfo(){
        var error="";
        var numbers = /^[0-9]+$/;
        var letters = /^[A-Za-z]+(\s)[A-Za-z]+$/;
        var gpa = /^[1-5]\.[0-9]/;
        var grade= /^[0-9][0-9][.][0-9][0-9]$/;

        if (document.getElementById('name').value=="" || document.getElementById('name').value.match(letters)===null){
           error = "Please provide a name and Enter Only Letters!";
           document.getElementById("errorInfo").innerHTML=error;
           return false;
         }
            
        var gender=/^M$|^F$/  
        if (document.getElementById('gender').value=="" || document.getElementById('gender').value.match(gender)===null){
           error = "Please Write M for Male or F for Female!";
           document.getElementById("errorInfo").innerHTML=error;
           return false;
         }
        
        if (document.getElementById('national_id').value=="" ||document.getElementById('national_id').value.length!=10
         || document.getElementById('national_id').value.match(/\d{10}/)===null) {
              error = "National ID Must Entered with length of 10 number! ";
               document.getElementById("errorInfo").innerHTML=error;
               return false;
         }
            
         var d = new Date();
	     t = parseInt(document.getElementById('DOB').value.substring(0, 4));
         if (document.getElementById('DOB').value=="" ||  d.getFullYear()-17 <= t ) {
              error = "Birthday Entered Must be Valid, Note no one under 18 accepted! ";
              document.getElementById("errorInfo").innerHTML=error;
               return false;
         }
            
         if (document.getElementById('country').value == "") {
              error = "Country Must Entered !";
              document.getElementById("errorInfo").innerHTML=error;
              return false;
         }
            
         if (document.getElementById('city').value=="") {
              error = "City Must Entered !";
              document.getElementById("errorInfo").innerHTML=error;
              return false;
         }
        
         if (document.getElementById('Address').value=="") {
              error = "Address Must Entered !";
              document.getElementById("errorInfo").innerHTML=error;
              return false;
         }
            
         if (document.getElementById('postal_code').value=="" || document.getElementById('postal_code').value.match(numbers)===null) {
              error = "Postal Code Must Entered in correct format!";
              document.getElementById("errorInfo").innerHTML=error;
              return false;
         }
            
         if (document.getElementById('gpa').value=="" || document.getElementById('gpa').value.match(gpa)===null) {
              error = "GPA Must Entered in correct format!";
              document.getElementById("errorInfo").innerHTML=error;
              return false;
         }
            
         if (document.getElementById('phone_num').value=="" || document.getElementById('phone_num').value.match(/05\d{8}/)===null) {
              error = "Phone Number Must Be Formatted As 05X XXX XXXX! ";
               document.getElementById("errorInfo").innerHTML=error;
               return false;
         }
         
         var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
         if (document.getElementById('p_email').value=="" || document.getElementById('p_email').value.match(mailformat)===null) {
               error = "Email Entered Must Be Valid! ";
               document.getElementById("errorInfo").innerHTML=error;
               return false;
         }
        
         if (document.getElementById('highschool').value=="") {
               error = "Grade Must Be Entered! ";
               document.getElementById("errorInfo").innerHTML=error;
               return false;}
        
         if (document.getElementById('highschool').value.match(grade)===null) {
               error = "Grade Entered Must Be Valid XX.XX! ";
               document.getElementById("errorInfo").innerHTML=error;
               return false;
         }
 
        
      }
        
</script>
    <form method="post" name="myForm" onsubmit = "return(validateInfo());">

    <div class="content">

        <div class="center">
        <fieldset>
        <legend>Personal Information</legend>

        <div id="div_info" >
            <table>
            <input type="hidden" id="id" name="id" value="<?php echo $row['id'] ?>">
              <tr>
                <td> <label>Name: </label> </td>
                <td> <input type="text" id="name" name="name" value="<?php echo $row['name'] ?>">  </td>
              </tr>
              <br>

              <tr>
                <td> <label>Gender: </label> </td>
                <td> <input type="text" id="gender" name="gender" value="<?php echo $row['gender'] ?>">  </td>
              </tr>
              <br>

              <tr>
                <td> <label>National ID: </label> </td>
                <td> <input type="text" id="national_id" name="national_id" value="<?php echo $row['national_id'] ?>">  </td>
              </tr>
              <br>

              <tr>
                <td> <label>Date of Birth: </label> </td>
                <td> <input type="date" id="DOB" name="DOB" value="<?php echo $row['DOB'] ?>">  </td>
              </tr>
              <br>

            <tr>
                <td> <label>Country: </label> </td>
                <td> <input type="text" id="country" name="country" value="<?php echo $row['country'] ?>">  </td>
              </tr>
              <br>

              <tr>
                <td> <label>City: </label> </td>
                <td> <input type="text" id="city" name="city" value="<?php echo $row['city'] ?>">  </td>
              </tr>
              <br>

              <tr>
                <td> <label>Address: </label> </td>
                <td> <input type="text" id="Address" name="address" value="<?php echo $row['address'] ?>">  </td>
              </tr>
              <br>

              <tr>
                <td> <label>Postal Code: </label> </td>
                <td> <input type="text" id="postal_code" name="postal_code" value="<?php echo $row['postal_code'] ?>">  </td>
              </tr>
              <br>

              <tr>
                <td> <label>Cumulative GPA: </label> </td>
                <td> <input type="text" id="gpa" name="gpa" value="<?php echo $row['gpa'] ?>">  </td>
              </tr>
              <br>

              <tr>
                <td> <label>Phone Number: </label> </td>
                <td> <input type="text" id="phone_num" name="phone_num" value="<?php echo $row['phone_num'] ?>">  </td>
              </tr>
              <br>

              <tr>
                <td> <label>Personal Email: </label> </td>
                <td> <input type="text" id="p_email" name="p_email"  value="<?php echo $row['p_email'] ?>">  </td>
              </tr>

              <tr>
                <td> <label>University Email: </label> </td>
                <td> <input type="text" id="u_email" name="u_email" value="<?php echo $row['u_email'] ?>" disabled>  </td>
              </tr>
              <br>

              <tr>
                <td> <label>High School Grade: </label> </td>
                <td> <input type="text" id="highschool" name="high_school" value="<?php echo $row['high_school'] ?>">  </td>
              </tr>
              <br>

        </table>

            <input type="submit" value="Update" name="update" class="update" style="margin-left: 400px">
            <input type="submit" value="Delete" name="delete" class="update" style="margin-left: 400px">
            <p id="errorInfo" style="margin:5px;   color:red; float: left;   font-size: 14px;"></p>

        </div>

        </fieldset>

        </div>

    </div>


</form>

    <?php

          }
     }
    ?>

</body>

</html>


<?php
include('../config/db.php');

    if (isset($_POST['update']))
    {
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $gender =mysqli_real_escape_string($conn,$_POST['gender']);
    $natId = mysqli_real_escape_string($conn,$_POST['national_id']);
    $DOB =mysqli_real_escape_string($conn,$_POST['DOB']);
    $country = mysqli_real_escape_string($conn,$_POST['country']);
    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $address =mysqli_real_escape_string($conn,$_POST['address']);
    $postalCode = mysqli_real_escape_string($conn,$_POST['postal_code']);
    $CGPA =mysqli_real_escape_string($conn,$_POST['gpa']);
    $phoneNo = mysqli_real_escape_string($conn,$_POST['phone_num']);
    $p_email =mysqli_real_escape_string($conn,$_POST['p_email']);
    $highschool =mysqli_real_escape_string($conn,$_POST['high_school']);
    
    $sql=$conn->prepare("UPDATE students SET
    name = '$name' , gender ='$gender', national_id='$natId' , DOB='$DOB' ,
    country='$country' , city='$city' , address='$address' ,
    postal_code='$postalCode' ,gpa='$CGPA' , phone_num='$phoneNo' ,
    p_email='$p_email' , high_school='$highschool'
    WHERE id ='$id'");
    if ($sql->execute()){
      echo '<script type="text/javascript">alert("Data updated") </script>';//redirect to view post
    }
    else {
      echo '<script type="text/javascript">alert("Data not updated") </script>';}

  }
?>


<?php
include('../config/db.php');
if (isset($_POST['delete']))
{
$id = mysqli_real_escape_string($conn,$_POST['id']);
$sql=$conn->prepare("DELETE FROM students WHERE id ='$id'");
if ($sql->execute())
{
  $resultOfDelete="Delete Succsfully!";
}

else { $resultOfDelete="Error".mysqli_error($conn);}
}

?>
