<?php
session_start();
$_SESSION['message'] = '';

$mysqli = new mysqli('localhost', 'root', '', 'ace_server');

if ($_SERVER['REQUEST_METHOD']=='POST'){
    //CHECKING BOTH PASSWORDS
    if ($_POST['password']==$_POST['confirmpassword']){

        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']); //hash password security

        $_SESSION['username'] = $username;

        $sql = "insert into users (username, email, password)"
        . "values ('$username', '$email', '$password')";

        //checking if the query is successfull

        if ($mysqli->query($sql) == true){
            $_SESSION['message'] = 'REGISTRATION SUCCESSFULL! USERNAME ADDED!';
            header("location: welcome.php");
        }
        else{
            $_SESSION['message'] = "User couldnotbe added to database";
            
        }
    }
        else{
            $_SESSION['message'] = "Password mismatch!";
        }
    }

?>
<!-- 
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["userName"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $website = test_input($_POST["website"]);
    $comment = test_input($_POST["comment"]);
    $gender = test_input($_POST["gender"]);
    echo("Hello");
    
  }


  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  } -->


<!-- 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

    require("connection.php");
    // When form submitted, insert values into the database.
    if (isset($_REQUEST["username"])) {
        // removes backslashes
        $username = stripslashes($_REQUEST["username"]);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST["email"]);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST["password"]);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users_login` (name, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {

   

</body>
</html> -->