<?php 
session_start();
include 'navbar.html';
if(isset($_SESSION['old_name']))
{
    echo "OLD Name = ".$_SESSION['old_name']." and Roll = ".$_SESSION['old_roll'];
    echo "<br><br>New Name = ".$_POST['Namee']." and Roll = ".$_POST['Rolle'];
    
    $conn = new mysqli("localhost","root","","MyDB");
    $stmt=$conn->prepare('UPDATE STU SET Name=?,Roll=? WHERE Name=?'); 
    $stmt->bind_param("sis",$new_name,$new_roll,$old_name); 
    $new_name = $_POST['Namee']; 
    $new_roll = $_POST['Rolle']; 
    $old_name = $_SESSION['old_name']; 
    $stmt->execute();
    $conn->close();
    echo "All working<br>";
    header("Location:display.php");
}
// echo "Nothing working";
?>