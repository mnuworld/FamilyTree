<?php

require 'header.php';
global $template, $vanshavali, $user;

$mode = $_GET['mode'];
$sub = $_GET['sub'];

//If there is submitted data
if (isset($_POST['register_submit'])) {
    //Collect all the variables
    $id = $_POST['register_id'];
    if (empty($id))
    {
        $id=null;  //Letting in member who is not part of family
    }
    $membername=$_POST['register_name'];

    $username = $_POST['register_username'];

    $password = $_POST['register_password'];

    //Convert date to Unix TimeStamp
    preg_match("/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4,4})/", $_POST['register_dob'], $matches);
    $dob = mktime(0, 0, 0, $matches[2], $matches[1], $matches[3]);

    $gender = $_POST['register_gender'];
    $relation = $_POST['register_relationship'];
    $gaon = $_POST['register_gaon'];
    $email = $_POST['register_email'];
    $about = $_POST['register_about'];

    if ($vanshavali->register(array(
        $username,$password,$dob,$gender,$relation,$gaon,$email,$about,$id,$membername
    )))
    {
        header("Location:welcome.php");
    }
}
require_once 'registration/registration.php';
$registration = new registration($mode, $sub);