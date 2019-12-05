<!DOCTYPE html>
<!DOCTYPE html>
<html lan="ar">
<head>
<meta charset="UTF-8"/>
              
     <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
    	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="css/bootstrap-rtl.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="Droid_Sans/DroidSans.ttf"/>
</head>
<?php
	if(isset($_POST['contact']))
	{
		
		 $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $thank_msg = "";
        $error_msg = "";
        
        if(empty($name) || empty($email) || empty($phone) || empty($message))  
        {
            $empty_msg = "يجب ادخال قيم لكل الحقول";
        }
        else
        {
            require("connect.php");
            $sql="INSERT INTO contact            (cont_name,cont_email,phone_number,cont_message)values('".$name."','".$email."','".$phone."','".$message."')";
            $result = mysqli_query($con,$sql);
                if($result)
                    $thank_msg =  "شكرا";
                else
                    $error_msg = "We didn't receive your request tray agin later ";
        }
	
	}

?>

<?php  $section="contact-us";
include("header.php");
?>

<body>

<div class="page-container">
        <section class="contact-us text-center">
                <div class="field" id="contact">
                  <div class="container">
                   <div class="row">
                
                       <i class="fa fa-headphones fa-5x"> </i>
                      <h1> أخبرنا عن رايك حول الموقع </h1>
                      <p class="lead">يمكنك التواصل معنا في أي وقت تريد </p>
                      
                      <!--start Contact Form -->
                      <form  method="post" action="contact-us-pro.php">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" name="C_name" id="name" class="form-control input-lg" placeholder="إسم المستخدم">
                            </div>
                            
                            <div class="form-group">
                            <input type="text" name="C_email" id="email" class="form-control input-lg" placeholder="الايميل">
                            </div>
                            
                            <div class="form-group">
                            <input type="text" name="C_phone" id="phone" class="form-control input-lg" placeholder="رقم الجوال">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea name="C_message"  id="message" class="form-control input-lg" placeholder="إكتب النص الذي تريد إرساله هنا"> </textarea>
                            </div>
                            <button type="submit" name="contact" class="btn btn-danger btn-lg btn-block">الاتصال بناء </button>
                            
                        </div>
                      </form>
                      <!-- End Contact Form -->
                      </div>
                </div>
                </div>
            
            </section>
            </div>
         <?php include 'footer.php'?>

       <script src ="js/jquery-3.0.1.min.js"></script>
      <script src ="js/bootstrap.min.js"></script>
      <script src="js/plugins.js"> </script>
      <script src ="js/jquery.nicescroll.min.js"></script>

      
</body>
</html>