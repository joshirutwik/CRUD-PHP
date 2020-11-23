<?php
session_start(); 
if(isset($_POST['Named']))
{
    $_SESSION['old_name']=$_POST['Named'];
    $_SESSION['old_roll']=$_POST['Rolld'];
    $conn = new mysqli("localhost","root","","MyDB");
    $sql = "SELECT * FROM STU WHERE NAME=?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$Name);
    $Name = $_POST['Named'];
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<form method='POST' action='edit.php'>Name:<input type='text' placeholder='".$row['Name']."'  name='Namee' required/><br>Roll:<input type='number' placeholder='".$row['Roll']."' name='Rolle' required/><br><input type='submit' value='Edit' /></form>";
        }
        
    }



    // Delete Code 
    // $sql="DELETE FROM STU WHERE NAME=?";
    // $stmt = $conn->prepare($sql); 
    // $stmt->bind_param('s',$Name); 
    // $Name = $_POST['Named'];
    // $stmt->execute();
    $conn->close();
    
}

?>