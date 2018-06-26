<?php  
       $servername = "localhost";  
       $username = "root";  
       $password = "";     
$conn = mysqli_connect($servername ,$username ,$password);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if($conn)
{
$sql = mysqli_select_db($conn,'test');
}

?>   