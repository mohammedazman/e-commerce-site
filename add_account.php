<?php
include'validata.php';


$a_user_name = test_input($_POST['Add_User_Name']);
$a_user_email=test_input($_POST['Add_User_Email']);

$a_user_password=test_input($_POST['Add_User_Password']);

$a_user_ip=$_SERVER['REMOTE_ADDR'];

require_once "Connections/con_sql_DB.php";

//-----------------------uplo--------------------




// Add the info into the database table
$query = mysqli_query($con_db, "INSERT INTO Users ( U_Name,U_email,U_Password,U_IP) 
        VALUES('$a_user_name','$a_user_email','$a_user_password','$a_user_ip');") or die (mysqli_error($con_db));

if (!$query) 
		{	header("REFREASH:3;URL:index.php?return=false");
          echo "<script>
                       window.location.href='index.php';
               alert('عذرا هناك خطاء الرجاء المحاوله مرة اخرى');
                                 </script>";
		
		exit();	
		}
		else
		{
	header("REFREASH:3;URL:index.php?return=true");  
            setcookie('user',$a_user_name, time() + (86400)*30, "/");
                session_start();
              $_SESSION['user_name']=$a_user_name;
            $_SESSION['user_password']=$a_user_password;
                $_SESSION['user_type']='User';
             echo "<script>
                       window.location.href='index.php';
               alert('!تم انشاء الحساب بنجاح');
                                 </script>";
		}

?>
