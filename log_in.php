
<?php 

  

 require_once("Connections/con_sql_DB.php");


include'validata.php';

 $user_name=test_input($_POST["log_user_name"]);
  $user_password=test_input($_POST['log_user_password']);


 if(!empty($user_name) and !empty($user_password))
    {   
     $saqlcommand="SELECT * FROM  users 
     WHERE   U_Name='$user_name' AND U_Password='$user_password'";
	  $log=mysqli_query($con_db,$saqlcommand);
     

	      if($log)
	       { 
                 	while($row=mysqli_fetch_assoc($log))
	                {    $user_name=$row['U_Name'];
	                     $user_password=$row['U_Password']; 
						 $user_type=$row['U_Type'];
						
		            }
        
            if(!empty($user_name) and !empty($user_type)){
            
   
       
setcookie('user',$user_name, time() + (86400 * 30), "/");
                 session_start();
              $_SESSION['user_name']=$user_name;
            $_SESSION['user_password']=$user_password;
             $_SESSION['user_type']=$user_type;    
 
	     if($_SESSION['user_type']=='Admin')
	      {  
            echo'  <img src="images/10.png" width="300px" height="100px"><br>';
		                  echo "مرحباء   $user_name   <br> سوف يتم تحويلك خلال ثوان";
		      header("REFRESH:3;URL=administrator/index.php");
		             }// end  if
		  else {
			if($_SESSION['user_type']=='User')
	           { 
               
 
		     echo'  <img src="images/10.png" width="300px" height="100px"><br>';
              echo "مرحباء  $user_name    <br> سوف يتم تحويلك خلال ثوان";
                         
                
		      header("REFRESH:3;URL=index.php");
		             }// end  if
		           
                      // end  if 
					}
	}else  { 
		     
		   echo "<script>
                       window.location.href='index.php';
               alert('عذرا لايوجد حساب بهذا الاسم الرجاء التاكد من المدخلات او قم بانشا حساب');
                                 </script>";
            
							}}
	   // end else if
		} else {echo "<script>
                       window.location.href='index.php';
               alert('!عذرا يجب مل جيع الحقول');
                                 </script>";
 }
		 
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>