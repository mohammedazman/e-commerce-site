  <?php 
session_start();
?>
<html>

    <head>
    
 <link href="css/style-blue.css" rel="stylesheet" title="default">

     <link href="./vendors.css" rel="stylesheet">

 
   
                
    <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
    	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="css/bootstrap-rtl.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="Droid_Sans/DroidSans.ttf"/>
   

  
    </head>


<?php $section="buying"; include'header.php';
    include'aside.php';?>

<body style="clear:both;">
     <br> <br> <br> <br>
    <br>
  <form role="form" style="padding-right:100px;"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
    <label for="card">رقم الكرت:</label>
    <input type="text" class="form-control" id="card" style="width: 40%;" name="card">
  </div>
  <div class="form-group">
    <label for="cvc">اسم الcvc :</label>
    <input type="number" class="form-control" id="cvc"style="width: 40%;" name="cvc">
  </div>
       <div class="form-group">
    <label for="name">اسمك الكامل:</label>
    <input type="text" class="form-control" id="name"style="width: 40%;" name="full_name">
  </div>
       <div class="form-group">
    <label for="money">مقدار للدفع:</label>
    <input type="text" class="form-control" id="money"style="width: 40%;" name="money" value="$<?php echo $_GET['price']; ?>">
  </div>
     
  
  <button type="submit" class="btn btn-default">شراء</button>
</form>
  
    <br>
   
    
    </body>
    
    <?php 

if($_SESSION['user_name']!="user_normal"){ 
if($_SERVER['REQUEST_METHOD']=='POST'){

if(isset($_SESSION['user_name'])){

include'validata.php';


$pay_user =$_SESSION['user_name'];
$pay_card = test_input($_POST['card']);
$pay_cvc =test_input( $_POST['cvc']);
$pay_name=test_input($_POST['full_name']);
$s=test_input($_POST['money']);
    $pay_amount="$$s";

require_once "Connections/con_sql_DB.php";



// Add the info into the database table

$query = mysqli_query($con_db, "INSERT INTO payment (Card_Number,Pay_Cvc,Full_Name,User_Name,Amount_Money) 
        VALUES('$pay_card','$pay_cvc','$pay_name','$pay_user','$pay_amount')") or die (mysqli_error($con_db));

 
		
}else
{echo "Erorr: You must have account<br>";
}}}

    
?>
    
    
    
    
    
    
    
    
    
    
    <script src ="js/jquery-3.0.1.min.js"></script>
      <script src ="js/bootstrap.min.js"></script>
      <script src="js/plugins.js"> </script>
      <script src ="js/jquery.nicescroll.min.js"></script>
    </html>
<?php include'footer.php';    ?>
