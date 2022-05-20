<?php
include('../Model/db.php');
session_start();
$error="";
if(isset($_POST['submit']))
{

    if(empty($_REQUEST['ID'])||empty($_REQUEST['Password']))
    {
        $error="you must enter your Username or Password";
    }
    else
    {
        $username=$_POST['ID'];
        $password=$_POST['Password'];
        $value=$username;
        $connection = new db();
        $conobj=$connection->OpenCon();

        $userQuery=$connection->CheckUser($conobj,"customer",$username,$password);

        if ($userQuery->num_rows > 0) {
        $_SESSION["ID"] = $username;
        $_SESSION["Password"] = $password;
        }
        else {
        $error = "Username or Password is invalid";
        }
        $connection->CloseCon($conobj);

    }

} 

?>