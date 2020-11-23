<?php 
session_start();
if(isset($_POST['name']))
{
    $Name = $_POST['name']; 
    $Roll = $_POST['roll']; 
    echo 'Name is ',$Name,' and Roll is ',$Roll."<br><br>"; 

    $conn = new mysqli("localhost","root","","MyDB");
    if($conn->connect_error)
    {
        die("Connection failed ".$conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO STU(Name,Roll) VALUES(?,?)");
    $stmt->bind_param("si",$Na,$Ro);
    $Na = $Name; 
    $Ro = $Roll;
    $stmt->execute();
    $conn->close();
    // echo "data insert ";
    header("Location:insert.html");
}

?> 