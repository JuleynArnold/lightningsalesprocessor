<?php
include_once "../includes/database.php";
include_once "../includes/functions.php";
session_start();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$add1 = $_POST['address1'];
$add2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

if ($_POST['fname']=='' or $_POST['lname']==''
  or $_POST['email']=='' or $_POST['pass']=='' or $_POST['passrp']=='') {
    error('One or more required fields were left blank.\\n'.
          'Please fill them in and try again.');
}

if ($_POST['pass'] != $_POST['passrp']){
	error('Password did not match. Please try again.');
}

$sql = "SELECT * FROM Customers WHERE Email = '$email'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);

if (!$result) {	
    error('A database error occurred');
}
if ($row['Email']==$email) {
    error('A user already exists with that email');
}

$sql = "INSERT INTO Customers (FirstName,LastName,Email,Password,Address1,Address2,City,State,ZipCode)
	VALUES ('$fname','$lname','$email','$pass','$add1','$add2','$city','$state','$zip')";

if (mysqli_query($link, $sql)) {
  echo "<script>
  alert('You have been successfully registered!');
  window.location.href='../index.php';
  </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);

?>