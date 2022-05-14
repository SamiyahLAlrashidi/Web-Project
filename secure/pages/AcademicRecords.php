<?php //new  line 6+7
include('../config/db.php');

if (isset($_POST['id']))
{ 
         $id=mysqli_real_escape_string($conn, $_POST['id']);
         $NEWGPA=mysqli_real_escape_string($conn, $_POST['gpa']); 
         
         $sql = $conn->prepare("SELECT name,gpa FROM students WHERE id =?");   
         $sql->bind_param('i', $id);
         $sql->execute();
         $result = $sql->get_result();


   if(! $result ) { 
      die('Could not get data: ' . mysqli_error()); 
   }
   
   while($row = mysqli_fetch_array($result)) {
      
       $GPA = $row['gpa'];
       $name =$row['name'];
   }

$sql = $conn->prepare("UPDATE students SET gpa='$NEWGPA' WHERE id='$id'");     

    
if($sql->execute()){
    echo'<script type="text/javascript">alert("Record was updated successfully.") </script>' ;
} else {
    echo'<script type="text/javascript">alert("Record was not updated .") </script>' ;


} 
    

   
   mysqli_close($conn);
}

 ?>
<script type="text/javascript">
    function validateID(){
        var error="";
        var numbers = /^[0-9]+$/;
        var letters = /^[A-Za-z]+$/;
        var gpa = /^[1-5]\.[0-9]/;

       
        if (document.getElementById('id').value=="" ) {
               error = "Please Enter The ID Number!";  
               document.getElementById("errorInfo").innerHTML=error;
               return false;}
        
         if (document.getElementById('id').value.length!=7 && document.getElementById('id').value.match(letters)===null) {
               error = "The ID length should not exceed 7!"; 
               document.getElementById("errorInfo").innerHTML=error;
               return false;}

        if (document.getElementById('id').value.match(numbers)===null) {
               error = "Please Enter Only Numbers!";
               document.getElementById("errorInfo").innerHTML=error;
               return false;}
              
    
        if (document.getElementById('gpa').value=="") {
              error = "GPA Must Entered";
              document.getElementById("errorInfo").innerHTML=error;
              return false;
         }
        
        if (document.getElementById('gpa').value.match(gpa)===null) {
              error = "GPA Must Entered in correct format X.X!";
              document.getElementById("errorInfo").innerHTML=error;
              return false;
         }
          return( true );
 }      
        
</script>

<!DOCTYPE html>
<html class="pc chrome win psc_dir-rtl psc_form-xlarge" dir="ltr" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, width=device-width">
    <link rel="stylesheet" href="../css/AcademicRecords.css">
    <title>Academic Records</title>
</head>

<body>
<?php include("../header.php"); ?>
<form method="post" onsubmit = "return(validateID());">
    <div class="content">
        
        <div class="center">
        <fieldset>
        <legend>Academic Records</legend>
        <div id="">
            
        
        <label>ID Number: </label>
        <input type="text" name="id" id="id">
        <label>Enter updated GPA: </label>
        <input type="text" name="gpa" id="gpa">
            
        <button class="search">Update</button>
        <br> 
        <br>
        </div>
            
        <div>
            <table class="table_Grade">
              <tr>
                <th style="width:20%">Name</th> 
                <td><?php if(!empty($name)){ echo $name; }?> </td>  
              </tr>
              <tr>
                <th>Previous GPA</th>
                <td> <?php if(!empty($GPA)){ echo $GPA; }?> </td>
              </tr>
              <tr>
                <th>Updated GPA</th>
                <td>  <?php if(!empty($NEWGPA)){ echo $NEWGPA; }?></td>
              </tr>
        </table>
           <p id="errorInfo" style="margin:5px;   color:red; float: left;   font-size: 14px;"></p>

        </div>

        
        
        </fieldset>
        </div>
        
    </div>
    
</form>


</body>

</html>
