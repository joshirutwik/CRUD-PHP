<?php
if(isset($_POST['Namedel']))
{
    $conn = new mysqli("localhost","root","","MyDB");
    $sql="DELETE FROM STU WHERE Name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$Name);
    $Name=$_POST['Namedel'];
    $stmt->execute();
    $conn->close();
    header("Location:display.php");
}
?>