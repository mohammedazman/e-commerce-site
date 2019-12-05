<?php
  
?>
<!DOCTYPE html>
<html lang="en-us"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
               
  

 <link href="css/style-blue.css" rel="stylesheet" title="default">

     <link href="./vendors.css" rel="stylesheet">

 
   
                
    <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
    	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="css/bootstrap-rtl.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="Droid_Sans/DroidSans.ttf"/>
   

  	<link rel="stylesheet" href="css/products.css"/>


   

   


        </head>
        <body>
      
        <?php $section='index'; include'header.php';
 
 
        
 include'aside.php'; 
     require_once "Connections/con_sql_DB.php";

if($_SERVER['REQUEST_METHOD']=='POST' )
$_SESSION['search']=$_POST['search'];
    $s=$_SESSION['search'];



    if($s == '')
    {
        echo "<br><br><br><br><span class='alert alert-warning' style='color: red;font-size: 20; margin: 500px; clear:both;'>" . "you didn't enter a text to search for " . "</span>";
    }
    else
    {
       
        
        $sqlCommand="select * from products where P_Name like '%$s%'";
        
       


    }
 


 if(isset($sqlCommand)){
        $query = mysqli_query($con_db,$sqlCommand) or die (mysqli_error()); 

     if(mysqli_num_rows($query)){
                 $i=0;
       
         while ($row = mysqli_fetch_array($query)) 
		   {  
             $s_pro_id=$row['P_ID'];
              $s_pro_name = $row['P_Name'];
              $s_pro_des = $row['P_Desc'];
              $s_pro_img=$row['P_Image'];
              $s_pro_pri=$row['P_Price'];
              if(!in_array($s_pro_id,$_SESSION)){
             if($i%3==0 && $i!=0)
    			  echo '<div class="product_clear">';
             echo '
             <div class="col-md-9">
            <div class="row" id="Container">
                <div class="col-sm-4 " data-price="64900" data-date="20130521" data-popularity="3" style="display: inline-block;" data-bound="">
                    <div class="ec-box">
                        <div class="ec-box-header"><a href="http://razonartificial.com/themes/reason/v1.6/e-commerce.html#">'.$s_pro_name.' </a></div>
                        <a href="http://razonartificial.com/themes/reason/v1.6/e-commerce.html#"><img src="administrator/'.$s_pro_img.'" alt="" width="100%" height ="200em"></a>
                        <div class="ec-box-footer">
                            <span class="label label-primary" style="float:left;">'. $s_pro_pri.'$</span>
                          <form action="carts.php" method="POST"  enctype="multipart/form-data"  >
 <input type="hidden" value="'.$s_pro_id.'" name="pro_id"/>
 <input type="hidden" value="'.$s_pro_name.'" name="pro_name"/>
 <input type="hidden" value="'.$s_pro_img.'" name="pro_img"/>
<input type="hidden" value="'.$s_pro_pri.'" name="pro_price"/>
<input type="image" src="images/22.png" alt="Submit"   class="btn btn-ar btn-success btn-sm pull-right">
</form>     
                    </div>
                </div>
               
        </div>   </div>
 </div>';
           
              
              $i++;
			  if($i%3==0)
    			  echo "</div>";
			} }}
 else{ echo "<br><br><br><br><span class='alert alert-warning' style='color: red;font-size: 20; margin: 500px; clear:both;'>" . "NOT Found to search for " . "</span>";
    }
}


        
?>
    
    
          <!-- starting of footer-->
 <?php include 'footer.php'?>
     <script src ="js/jquery-3.0.1.min.js"></script>
      <script src ="js/bootstrap.min.js"></script>
      <script src="js/plugins.js"> </script>
      <script src ="js/jquery.nicescroll.min.js"></script>
</body>
</html>

