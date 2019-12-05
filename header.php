<?php 
if(!isset($_SESSION))
session_start(); 
if(!isset($_SESSION['user_name'],$_SESSION['user_password'],$_SESSION['user_type'])){
$_SESSION['user_name']="user_normal";
 $_SESSION['user_password']="user_normal";
 $_SESSION['user_type']="User";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
	  <!-- IE compalitability Meta -->
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<!-- First mobile meta -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>bootstrap</title>
	   <link rel ="stylesheet" href="css/style-header.css" />
      	
    <link rel="stylesheet" href="css/style.css">
      <style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
  </head>
      
  <body>
   <header>
       
       
       
       
       
       <span class="banner" style="float:left;"><img src="images/10.png" width="300px" height="100px"></span>  
      
    <?php  
if($_SESSION['user_name']=="user_normal"){
if(!isset($_COOKIE['user'])) {?>
        
      <section class="title">
   
       <div class="login">
         <p>هل لديك حساب لدينا ؟ <a href="#" id="myBtn">سجل دخولك </a><br/> أو <a href="#" id="myBtn2">أنشئ حساب</a></p>
       </div>
        
       
       
       <div class="cart-photo">
         <img id="img-cart" class="responsive" src="images/shopcart1.ico">
       </div>
          
          <?php }  else {?>
  <form role="form" class="form-inline" action="log_in.php" method="post" style="margin:10px 10px 0 0;>
    <div class="form-group>
      <label for="email">اسم المستخدم:</label>
     <input type="text" class="form-control" id="email" placeholder="user name"  name="log_user_name" value="<?php
      echo $_COOKIE['user']?>" required>
    </div>
    <div class="form-group">
      <label for="pwd">كلمة السر:</label>
      <input type="password" class="form-control" id="pwd" placeholder="password" name="log_user_password" autofocus required>
    </div>
    <button type="submit" class="btn btn-default">تسجيل</button>
  </form>
  <?php } }else if($_SESSION['user_name']!="user_normal"){ ?>
        <form role="form" class="form-inline" action="log_out.php" method="post" style="margin:10px 10px 0 0;>
    <div class="form-group>
  <button type="submit" class="btn btn-default"> تسجيل الخروج</button>
      </form>
        <?php } ?>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>

 
  <form role="form" class="form-inline" action="log_in.php" method="post">
    <div class="form-group">
      <label for="email">اسم المستخدم:</label>
      <input type="text" class="form-control" id="email" placeholder="user name"  name="log_user_name" required>
    </div>
    <div class="form-group">
      <label for="pwd">كلمة السر:</label>
      <input type="password" class="form-control" id="pwd" placeholder="password" name="log_user_password" required>
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> تذكرني</label>
    </div>
    <button type="submit" class="btn btn-default">تسجيل</button>
  </form>
</div>
      
      
      
  </div>


       <div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>

 
  <form role="form" action="add_account.php" method="post">
    <div class="form-group">
      <label for="user">اسم المستخدم:</label>
      <input type="text" class="form-control" id="user" placeholder="user name" name="Add_User_Name" required>
    </div>
      <div class="form-group">
      <label for="email">الايميل:</label>
      <input type="email" class="form-control" id="email" placeholder="email" name="Add_User_Email" required>
    </div>
    <div class="form-group">
      <label for="pwd">كلمة السر:</label>
      <input type="password" class="form-control" id="pwd" placeholder="password" name="Add_User_Password" required>
    </div>
    
    <button type="submit" class="btn btn-default">تسجيل</button>
  </form>
</div>
      
      
      
  </div>


       <script>
// Get the modal
var modal = document.getElementById('myModal');
var modal2 = document.getElementById('myModal2');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn2 = document.getElementById("myBtn2");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];
// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
btn2.onclick = function() {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
   modal2.style.display = "none";
}
span2.onclick = function() {
    modal.style.display = "none";
   modal2.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>
        
          
          
          
          
          
    </section>
   </header>

  <!-- start our navpar -->
	 <nav class="navbar  navbar-inverse " style="clear:both;">
	   <div class="container" >
           
	     <!-- Brand and toggle get grouped for better mobile display -->
		   <div class="navbar-header">
               
		     <!-- This button for phones -->
		     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ournavpar" aria-expanded="false">
			   <span class="sr-only">Toggle navigation</span>
			   <span class="icon-bar"></span>
			   <span class="icon-bar"></span>
			   <span class="icon-bar"></span>
			 </button>		  
			<!-- <a class="navbar-brand" href="#">Al-Qadasi <span>Tec.</span></a>-->
		  </div> <!-- end navbar-header -->
		  <!-- Collect the nav links, forms, and other content for toggling -->		
		  <div class="collapse navbar-collapse" id="ournavpar">
			 <ul class="nav navbar-nav navbar-right">
				<li <?php if($section=="index"){echo 'class="active"';}?> ><a href="index.php" > الرئيسية <span class="sr-only">(current)</span></a></li>	
                  <?php  
if($_SESSION['user_name']!="user_normal"){ ?>
                 
                 <li  <?php if($section=="buying"){echo 'class="active"';}?>><a href="carts.php" > سلتي</a></li>
                 <?php  } ?>
				<li  <?php if($section=="about_set"){echo 'class="active"';}?>><a href="about_set.php" > عن الموقع</a></li>
                 <li  <?php if($section=="about_us"){echo 'class="active"';}?>><a href="about_us.php"> عن الفريق</a></li>
				<!--<li><a href="#"> Company</a></li>-->
				<li class="dropdown"  ><li <?php if($section=="product"){echo 'class="active"';}?>>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >المنتجات <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					 <li><a href="product.php?subject=phone"> الهواتف الذكية</a></li>
               
					 <li><a href="product.php?subject=laptop">لابتوبات</a></li>
					<!-- <li><a href="#">PC</a></li>-->
					 <li role="separator" class="divider"></li>
					 <li><a href="product.php?subject=tab">ايبادات</a></li>
				  </ul>
                 </li></li>
				<li  <?php if($section=="contact-us"){echo 'class="active"';}?>><a href="contact-us.php" > للتواصل معنا</a></li>
			 </ul>
             <form class="navbar-form navbar-left" action="search.php" method="post">
					<div class="form-group">
					  <input type="text" class="form-control" name="search" placeholder="إبحث هنا">
					</div>
					<button type="submit" class="btn btn-default">إنقر هنا للبحث </button>
				  </form>			 
		  </div><!-- /.navbar-collapse -->
	  </div><!-- /.container -->
	</nav>
			<!--End Navpar -->
			
			
			
		
			           

                         
                           
                  
        
 
	  
  	  
			

   
   
  
  
  
  
  </body>
</html>