
<?php
include('../config/session.php');
include('../config/db.php');

try{
if (isset($_POST['submit'])){

  $name=mysqli_real_escape_string($conn, $_POST['name']);
  $national_id=mysqli_real_escape_string($conn, $_POST['national_id']);
  $school_grade=mysqli_real_escape_string($conn, $_POST['school_grade']);
  $birthday=mysqli_real_escape_string($conn, $_POST['birthday']);
  $gender=mysqli_real_escape_string($conn, $_POST['gender']);
  $email=mysqli_real_escape_string($conn, $_POST['email']);
  $phone=mysqli_real_escape_string($conn, $_POST['phone']);
  $country=mysqli_real_escape_string($conn, $_POST['country']);
  $city=mysqli_real_escape_string($conn, $_POST['city']);
  $postal_code=mysqli_real_escape_string($conn, $_POST['postal_code']);
  $add=mysqli_real_escape_string($conn, $_POST['add']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);
/// add password and address
  $query = "INSERT INTO students (national_id, postal_code , address, city,country, DOB ,phone_num ,gender,  name, p_email , high_school , u_email , gpa , pass, id ) VALUES ('$national_id', '$postal_code' , '$add', '$city','$country', '$birthday' ,'$phone' ,'$gender',  '$name', '$email' ,
    '$school_grade' , NULL , NULL , '$pass', NULL ) " ;
  if (mysqli_query($conn,$query)){
    mysqli_query($conn, "UPDATE students SET u_email = CONCAT(id, '@iau.edu.sa');");
    echo '<script type="text/javascript">alert("Registartion Succseed ") </script>';

    header("Location: login.php");

  }
  else {
     echo '<script type="text/javascript">alert("Registartion Failed , Complete information please ") </script>';

    echo "Error".mysqli_error($conn);
  }
}
}
catch(Exception $e) {
  echo "Error occure in server side try again ";
}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="css/logStyle.css"> -->
    <title>Oracle PeopleSoft Registeration </title>

    <link href="../css/registration_main.css" rel="stylesheet" media="all">
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
      background: #f3f3e9;
    letter-spacing: 1px;
  }

  .ad-panner,.login {
  float: left;
  padding: 20px;
  width: 50%;
  min-height: 100vh;
  background: #f3f3e9;
  height: 300px; /* only for demonstration, should be removed */
  }
  .ad-panner{
  background-image: url(../images/ads.jpg);
  background-position: right;
  background-size:cover;
  }

  .iaulogo{
  width: 30%;
  min-width: 200px;
  margin-bottom: 10px;
  margin-top: 10px;
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

  .box  {
  display: flex;
  justify-content: space-between;
}
.box div {

  margin-top:15px;
  margin-right: 30px;
}

  </style>
  <body>

    <script type="text/javascript">
       function validate(){
         var error="";
         if (document.reg.name.value==""){
           error = "Name Must Entered ! ";
           document.getElementById("error").innerHTML=error;
          // document.reg.error.value =error;
           document.reg.name.focus();
           return false;
         }
         if (document.reg.email.value=="") {
              error = "Email Must Entered ! ";
               document.reg.email.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.national_id.value=="") {
              error = "National ID Must Entered ! ";
               document.reg.national_id.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.school_grade.value=="") {
              error = "School Cumulative Must Entered ! ";
               document.reg.school_grade.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.birthday.value=="") {
              error = "Birthday Must Entered ! ";
               document.reg.birthday.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.add.value=="") {
              error = "Address Must Entered ! ";
               document.reg.add.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.phone.value=="") {
              error = "Phone Number Must Entered ! ";
               document.reg.phone.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.country.value=="") {
              error = "Country Must Entered ! ";
               document.reg.country.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.add.value=="") {
              error = "Address Must Entered ! ";
               document.reg.add.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.city.value=="") {
              error = "City Must Entered ! ";
               document.reg.city.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.postal_code.value=="") {
              error = "Postal Code Must Entered ! ";
               document.reg.postal_code.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.pass.value=="") {
              error = "Password Must Entered ! ";
               document.reg.pass.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.pass1.value=="") {
              error = "You Must Reconfirm Password ! ";
               document.reg.pass1.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
         if (document.reg.pass1.value!=document.reg.pass.value) {
              error = "Password Must Not Same ! ";
               document.reg.pass1.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }
          var m = document.reg.phone.value;
      
         if (m.match(/05\d{8}/)===null) {
              error = "Phone Number Must Be Formatted As 05X XXX XXXX! ";
               document.reg.phone.focus();
               document.getElementById("error").innerHTML=error;
               return false;
         }



       }
    </script>

    <section>
      <div class="ad-panner" >

      </div>
      <div class="login">

        <img src="../images/logo.svg" class="iaulogo" alt="">

                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title">Students Application Form</h2>
                        <form method="POST" name="reg" onsubmit = "return(validate());">



                            <div class="box">

                                    <div class="input-group">
                                        <label class="label">Full Name</label>
                                        <input class="input--style-4" type="text" name="name">
                                    </div>


                                    <div class="input-group">
                                        <label class="label">National ID</label>
                                        <input class="input--style-4" type="text" name="national_id">
                                    </div>
                                    <div class="input-group">
                                        <label class="label">School Cumulative</label>
                                        <input class="input--style-4" type="number" name="school_grade">
                                    </div>
                            </div>


                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Birthday</label>
                                        <div class="input-group-icon">
                                            <input class="input--style-4 js-datepicker" type="date" name="birthday">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                  <div class="input-group">
                                      <label class="label">Gender</label>
                                      <div class="p-t-10">
                                          <label class="radio-container m-r-45">Male
                                              <input type="radio" checked="checked" name="gender" value="M">
                                              <span class="checkmark"></span>
                                          </label>
                                          <label class="radio-container">Female
                                              <input type="radio" name="gender" value="F">
                                              <span class="checkmark"></span>
                                          </label>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="box">

                                    <div class="input-group">
                                        <label class="label">Email</label>
                                        <input class="input--style-4" type="email" name="email">
                                    </div>
                                    <div class="input-group">
                                        <label class="label">Address</label>
                                        <input class="input--style-4" type="text" name="add">
                                    </div>

                                    <div class="input-group">
                                        <label class="label">Phone Number</label>
                                        <input class="input--style-4" type="text" name="phone">
                                    </div>

                            </div>

              <div class="box">
                <div class="input-group">
                    <label class="label">Country</label>
                    <input class="input--style-4" type="text" name="country">
                </div>
                <div class="input-group">
                    <label class="label">City</label>
                    <input class="input--style-4" type="text" name="city">
                </div>
                <div class="input-group">
                    <label class="label">Postal Code</label>
                    <input class="input--style-4" type="text" name="postal_code">
                </div>

              </div>
              <div class="box">
                <div class="input-group">
                    <label class="label">Password</label>
                    <input class="input--style-4" type="password" name="pass">
                  </div>
                  <div class="input-group">
                    <label class="label">Reconfirm Password</label>
                    <input class="input--style-4" type="password" name="pass1">
                </div>



              </div>
              <div class="box">
          <p id="error"style="margin:5px;   color:red; "></p>


              </div>


                      <div class="container">
                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                            </div>


                            </div>
                        </form>
                    </div>
                </div>



      </div>


</section>
  </body>
</html>
