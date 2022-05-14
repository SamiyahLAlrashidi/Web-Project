
<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php
        include('../config/session.php');
        include('../config/db.php');

if (isset($_SESSION['id'])){
    $id= $_SESSION['id'];

        // Taking all 4 values from the form data(input)
        $country =  strip_tags($_REQUEST['country']);
        $address =  strip_tags($_REQUEST['address']);
        $city = strip_tags($_REQUEST['city']);
        $postal_code = strip_tags($_REQUEST['postal_code']);

        // Performing insert query execution
        // here our table name is college
        $sql=$conn->prepare("UPDATE students SET country = '$country', address = '$address', city = '$city', postal_code = '$postal_code' WHERE id=$id");
        $sql->execute();


}


        if($sql->execute()){
header("Location: Address.php");
exit();

        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>
