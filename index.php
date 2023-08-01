<?php
$insert = false;
$not_insert = false;
if(isset($_POST['name'])){
//here our server is localhost and for localhost the username is root and password is blank
$server = "localhost";
$username = "root";
$password ="";

$con = mysqli_connect($server, $username, $password);
if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());  
}
//echo "Successfully connected to the database";

$name = $_POST['name'];
$gender = $_POST['gender'];
$stream = $_POST['stream'];
$roll = $_POST['roll'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `iit_a`.`trip` (`name`, `gender`, `stream`, `roll`, `email`, `phone`, `desc`, `date`) VALUES ('$name',
 '$gender', '$stream', '$roll', '$email', '$phone', '$desc', current_timestamp());";

//echo $sql; 

if($con->query($sql) == true){
   // echo "Successfully incerted";
   $insert = true;
}
else{
    //echo "ERROR: $sql <br> $con->error";
    $not_insert = true;
}
$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Borel&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@600&family=Handjet:wght@200&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Handjet:wght@200&family=Lumanosimo&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="submit.css">

</head>
<body>
    <img class = "bg" src="pic.jpg" alt="IIT K">
    <div class = "container">
        <H1>Welcome to the IIT Anandapur</H1>
        <h2>..US Trip Form..</h2>
        <p>Enter your details below...</p>

        <?php
        if($insert == true){
            echo "<p id = 'submit'>Thanks for submitting your form, hope you enjoy the trip...</p>";
        }
        if($not_insert == true){
            echo "<p id = 'submit1'>Form not submitted, enter the details properly...</p>";
        } 
        ?>

        <form action="index.php" method="post">
            <input type="text" name = "name" id="name" placeholder="Enter your Full Name">
            <input type="text"name = "gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="stream" id="stream" placeholder="Enter your stream">
            <input type="text" name="roll" id="roll" placeholder="Enter your Roll Number">
            <input type="text" name="email" id="email" placeholder="Enter your Email ID">
            <input type="text" name="phone" id="phone" placeholder="Enter your Mobile Number">
            <textarea name="desc" id="desc" cols="10" rows="5" placeholder="What are your thoughts about the trip?"></textarea>
            &nbsp;
            <button class="mail-btn" type="submit">Submit</button> 
            
        </form>
    </div>
   <script src = "index.js"></script> 
   <script src = "submit.js"></script> 

   
</body>
</html>
