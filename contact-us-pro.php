<?php

$a_name = $_POST['C_name'];
$a_email= $_POST['C_email'];

$a_phone=$_POST['C_phone'];
$a_message= $_POST['C_message'];

require_once "Connections/con_sql_DB.php";

//-----------------------uplo--------------------




// Add the info into the database table
$query = mysqli_query($con_db, "INSERT INTO Contact_us ( C_Name,C_email,C_Phone,C_Text) 
        VALUES('$a_name','$a_email','$a_phone','$a_message');") or die (mysqli_error($con_db));

if (!$query) 
		{
		echo "<script>
                       window.location.href='index.php';
               alert('عذرا الرجاء التاكد من المدخلات ');
                                 </script>";
		exit();	
		}
		else
		{
		echo "<script>
                       window.location.href='index.php';
               alert('شكرا لمشاركتك سوف يتم النظر في طلبك');
                                 </script>";
		}

?>
