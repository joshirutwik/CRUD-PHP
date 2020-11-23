<?php 
session_start();
include 'navbar.html';
echo "<table border='0' width='400' cellpadding='10' cellspacing='5'>"; 
echo "<tr><td>Name</td><td>Roll</td><td>Edit</td><td>Delete</td></tr>"; 
$conn = new mysqli("localhost","root","","MyDB"); 
if($conn->connect_error)
{
    echo "Not Connected due to ".$conn->connect_error;
}
$sql="SELECT * FROM STU";
$result = $conn->query($sql); 
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "<tr><form action='delete.php' method='POST'><td><input type='text' value='".$row['Name']."'  name='Named' style='outline:none;background:white;border:none;' readonly/></td><td><input type='number' value='".$row['Roll']."' name='Rolld' style='outline:none;background:white;border:none;'  readonly/></td><td><input type='submit' value='Edit' /></form></td><td><br><form action='DEL1.php' method='POST'><div style='display:none;'><input type='text' value='".$row['Name']."' name='Namedel' /></div><input type='submit' value='Delete' /></form></td></tr>";
    }
}

echo "</table>";
?>