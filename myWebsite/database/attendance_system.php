<?php
session_start();
$conn = "";
$stmt = "";

function connectToDB()
{
// $con = mysqli_connect("localhost","my_user","my_password","my_db");
 
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
//   }

}

function closeConnection()
{
    $con = null;
    $stmt = null;
}

connectToDB();

function register($data)
{
    session_start();
    require_once "Dashboard/dbconnection.php";
    
    if (isset($_POST['regisBtn'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']); 
        if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
            $name_errors = "Name must contain only alphabets and space";
        }
        if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $name_error = "Name must contain only alphabets and space";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }       
        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
        }
        if (!$error) {
            if(mysqli_query($con, "INSERT INTO users_login (username,name,email,passwordss,confirm_pw) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "','" . md5($cpassword) . "')")) {
             header("location: /Dashboard/index.php");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($con);
            }
        }
    closeConnection();   
    }
}

function login($data)
{

    require_once "Dashboard/dbconnection.php";

    if (isset($_POST['loginBtn'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
    
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }  
    
        $result = mysqli_query($con, "SELECT * FROM users_login WHERE email = '" . $email. "' and passwordss = '" . md5($password). "'");
       if(!empty($result)){
            if ($row = mysqli_fetch_array($result)) {
                $_SESSION['user_id'] = $row['id_user'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                header("Location: /Dashboard/index.php");
            } 
        }else {
            $error_message = "Incorrect Email or Password!!!";
        }
    }

    closeConnection();
}