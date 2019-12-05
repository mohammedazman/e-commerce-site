<?php 
session_start();
if($_SESSION['user_name']!="user_normal"){ 
if($_SERVER['REQUEST_METHOD']=='POST'){

if(isset($_SESSION['user_name'])){




$s_pro_user =$_SESSION['user_name'];
$s_pro_id = $_POST['pro_id'];
$s_pro_img = $_POST['pro_img'];
$s_pro_pri=$_POST['pro_price'];
$s_pro_name=$_POST['pro_name'];

require_once "Connections/con_sql_DB.php";



// Add the info into the database table

$query = mysqli_query($con_db, "INSERT INTO Carts (P_ID,P_Name,P_Price,P_Image,U_Name) 
        VALUES('$s_pro_id','$s_pro_name','$s_pro_pri','$s_pro_img','$s_pro_user')") or die (mysqli_error($con_db));


    if(empty($_SESSION['cart_c']))
    $_SESSION['cart_c']=1;
    else
         ++$_SESSION['cart_c'];
 
    
$c=$_SESSION['cart_c'];
$_SESSION["carts$c"]=$s_pro_id;
 $R=$_SERVER['HTTP_REFERER'];
    
		     header("REFRESH:0;URL=$R");
   
		
}else
{echo "Erorr: You must have account<br>";
}
} else {
    
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
    <div class="container">
   <div class="row">
       <div class="col-md-8">
           <table class="table">
                <thead>
                    <tr>
                        <th>#رقم </th>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>السعر</th>
                    </tr>
                </thead>
                <tbody>
<?php 
    require_once "Connections/con_sql_DB.php";
    if(isset($_GET['empty'])){
        
      $sqlCommand0 = "delete from carts;";
        $query1 = mysqli_query($con_db,$sqlCommand0) or die (mysqli_error());
        for($i=1;$i<=$_SESSION['cart_c'];$i++){
            unset($_SESSION["carts$i"]);
        }
        $_SESSION['cart_c']=0;
        
    }
     $sqlCommand = "SELECT P_ID,P_Name, P_Image,P_Price,U_Name from carts;";
 $query = mysqli_query($con_db,$sqlCommand) or die (mysqli_error()); 
       $all_price=0;
        $i=0;
         while ($row = mysqli_fetch_array($query)) 
		   { 
             $s_pro_id = $row['P_ID'];
             $s_pro_name = $row['P_Name'];
              $s_pro_img=$row['P_Image'];
              $s_pro_pri=$row['P_Price'];
                  $s_pro_user = $row['U_Name'];
             $all_price+=$s_pro_pri;

                 echo'   <tr>
                        <td>'.$s_pro_id.'</td>
                        <td><img src="administrator/'.$s_pro_img.'" width="100" height="" alt=""></td>
                        <td><a href="http://razonartificial.com/themes/reason/v1.6/e-commerce_cart.html#">'.$s_pro_name.'</a></td>
                        <td>'.$s_pro_pri.' $</td>
                    </tr>';
         }    ?>
              
                </tbody>
           </table>
       </div>
        <div class="col-md-4" style="clear:both; width:60em; ">
            <div class="e-price" style="float:right; width:12em;  height:4em; margin-left: 80px;"> $ <span><?php echo $all_price; ?></span></div>
               <a href="payment.php?price=<?php echo $all_price; ?>" class="btn btn-ar btn-block btn-success" style="clear:none; float:right;  height:5em; width:15em; padding-top:1.2em; margin:1px 0 0 0; "><i class="fa fa-shopping-cart"></i> شراء الان</a>
             <a href="carts.php?empty=1" class="btn btn-ar btn-block btn-success" style="clear:none; float:left;  height:5em; width:15em; padding-top:1.2em; margin:1px 0 0 0; "><i class="fa fa-shopping-cart"></i> تفريغ السله</a>
              
           </div>
       
       </div>
   </div>
  
    <br>
    
    </body>
    
    
    
    <script src ="js/jquery-3.0.1.min.js"></script>
      <script src ="js/bootstrap.min.js"></script>
      <script src="js/plugins.js"> </script>
      <script src ="js/jquery.nicescroll.min.js"></script>
    </html>
<?php include'footer.php'; }}else{  
    $R=$_SERVER['HTTP_REFERER'];
    
 echo "<script>
                       window.location.href='$R';
               alert('عزيزي العميل يجب ان تقوم بانشاء حساب او تسجيل الدخول للقيام بعملية الشراء');
                                 </script>";}   ?>

