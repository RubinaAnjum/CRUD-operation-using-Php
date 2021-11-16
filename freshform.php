<?php
include_once "connection.php";

$flag = true;
$error = "";
$firstname = $lastname = $email = $contact_no = $city = $gender = "";
$firstnameErr = $lastnameErr = $emailErr = $contact_noErr = $cityErr = "";
// if ( $_SERVER["REQUEST_METHOD"] == "POST" ) { 

    if (isset($_POST['submit'])) {

// create database
/*$sql = "CREATE DATABASE record";*/

//checking database
/*if(mysqli_query($conn, $sql)){
    echo "database created";
}*/

// function to clear spaces and specialcharacter
// method to validate and clean the data

function test_input($data) {
    $data = trim($data);              // removes whitespaces in the begining and end of the input
    $data = stripslashes($data);      //unquote the quoted string
    $data = htmlspecialchars($data);  // convert harmful code into html entities
    return $data;
  }

    $firstname =test_input( $_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $email = test_input($_POST['email']);
    $contact_no = test_input($_POST['contact_no']);
    $city = test_input($_POST['city']);
    $gender = test_input($_POST['gender']);

// condition for checking all the fields have some value

if(isset($firstname) && $firstname != "" && isset($lastname) && $lastname != "" && isset($email) && $email != "" && isset($contact_no) && $contact_no != "" && isset($city) && $city != "" && isset($gender) && $gender != ""){
 
 // conditions to check every field must contain valid data

    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
        $firstnameErr = "Only letters and white space allowed";
        $flag = false;
       }
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
        $lastnameErr = "Only letters and white space allowed";
        $flag = false;
       }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $flag = false;
       }
    if (!preg_match("/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/",$contact_no)) {
        $contact_noErr = "Enter a valid number";
        $flag = false;
       }
    if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
        $cityErr = "Only letters and white space allowed";
        $flag = false;
       }
    if($flag){ // for inserting data into database
        $sql = "INSERT INTO `registered_info`(`firstname`, `lastname`, `email`, `contact_no`, `city`, `gender`) VALUES ('$firstname','$lastname','$email','$contact_no','$city','$gender')";
        if($conn->query($sql) == true){
           echo ' <script>
                alert ("Registered Successfuly..!!")
            </script>';
        }
    }

} else {
    $error = "*Must fill all the field";
}    
}



 

    ?>
     
<?php
 
$conn->close();

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
    background-color: rgb(9, 98, 121);
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
    color: green;
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
a {
    color: white;
    margin-left: 22.5cm;
   
}
.indication{
    color: red;
    font-size: small;
}
</style>
</head>
<body>
    <h1>REGISTRATION FORM</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="err_row">
            <?php
               if($error){
                   echo '<span style="display:block; color: red; ">'.$error.'</span>';
               }
            ?>
        </div><br>
        <div>
        <label class="info">First Name</label><br><br><input type="text" class="det" name="firstname" placeholder="FIRST NAME" value="<?php echo $firstname ?>">
              <span class="indication"> <?php if($firstnameErr){
                   echo $firstnameErr ;
               } ?></span>
        </div><br>
        <div>
        <label class="info">Last Name</label><br><br><input type="text" class="det" name="lastname" placeholder="LAST NAME" value="<?php echo $lastname ?>">
              <span class="indication"> <?php if($lastnameErr){
                   echo $lastnameErr;
               } ?></span>
        </div><br>
        <div>
        <label class="info">Email</label><br><br><input type="email" class="det" name="email" placeholder="EMAIL" value="<?php echo $email ?>">
              <span class="indication"><?php if($emailErr){
                   echo $emailErr;
                 } ?></span>
        </div><br>
        <div>
        <label class="info">Phone Number</label><br><br><input type="tel" class="det" name="contact_no" placeholder="PHONE NUMBER" value="<?php echo $contact_no ?>">
               <span class="indication"><?php if($contact_noErr){
                   echo $contact_noErr ;                   ;
               } ?></span>
         </div><br>
        <div>
        <label class="info">City</label><br><br><input type="text"class="det" name="city" placeholder="CITY" value="<?php echo $city ?>">
                <span class="indication"><?php if($cityErr){
                   echo  $cityErr;
               } ?></span>
        </div><br>
        <label class="info">Gender</label><br><br>
        <input type="radio" name="gender" value="M" checked><label class="txt">Male</label>
        <input type="radio" name="gender" value="F"><label class="txt">Female</label><br><br>
        <button class="det" name="submit">Submit</button>
    </form><br>
<div> <a href="display.php">Display</a> </div>
    
</body>
</html>