<?php
include_once "connection.php";
$id = $_GET['id'];
if(isset($_POST['submit'])){

   

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];

    $q = " UPDATE `registered_info` set firstname='$firstname',lastname ='$lastname',email='$email',contact_no='$contact_no',city='$city',gender='$gender' where id=$id";

    $query = mysqli_query($conn,$q);

header('location:display.php');

//include_once "connection.php";

}
$qs = "select * from registered_info where id=$id";

$query = mysqli_query($conn,$qs);

$res = mysqli_fetch_array($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=v, initial-scale=1.0">
    <title>registeration...</title>
   <style>
       body {
    background-color: rgb(9, 98, 121)
}
h1 {
    color: white;
    text-align: center;
}
form {
    width: 500px;
    margin-left: 10.5cm;
    padding: 30px;
    background: white;
    box-sizing: border-box;
}
label {
    color: red;
    padding-bottom: 5px;
}
.det {
    width: 100%;
    padding: 5px;
}
button {
    background: rgb(0, 128, 107);
    color: white;
}
p {
    text-align: center;
    font-size: smaller;
    color: white;
}
.txt {
    color: black;
}
</style>
</head>
<body>
    <h1>REGISTRATION FORM</h1>
    <form action="#" method="post">
        <label class="info">First Name</label><br><br><input type="text" class="det" value="<?php echo $res['firstname'];?>" name="firstname" placeholder="FIRST NAME"><br><br>
        <label class="info">Last Name</label><br><br><input type="text" class="det" value="<?php echo $res['lastname'];  ?>" name="lastname" placeholder="LAST NAME"><br><br>
        <label class="info">Email</label><br><br><input type="email" class="det" value="<?php echo $res['email'];  ?>" name="email" placeholder="EMAIL"><br><br>
        <label class="info">Phone Number</label><br><br><input type="tel" class="det" value="<?php echo $res['contact_no'];  ?>" name="contact_no" placeholder="PHONE NUMBER"><br><br>
        <label class="info">City</label><br><br><input type="text"class="det" value="<?php echo $res['city'];  ?>" name="city" placeholder="CITY"><br><br>
        <label class="info">Gender</label><br><br>
        <?php
        $gender = $res['gender'];

        ?>
        <input type="radio" name="gender" value="M" <?php if ($gender != "F") echo "checked"; ?>><label class="txt">Male</label>
        <input type="radio" name="gender" value="F" <?php if ($gender != "M") echo "checked"; ?>><label class="txt">Female</label><br><br>
        <button class="det" name="submit">Submit</button>
    </form><br>
</body>
</html>
