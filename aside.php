  <!DOCTYPE html>
  <!DOCTYPE html>
  <html>
 <head>
    <meta charset="UTF-8"/>
    <!-- IE compalitability Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <!-- First mobile meta -->
    <meta name="viewport" content="width-device-width,initial-cale=1">
    <title> Bootstrab </title>
  <link rel="stylesheet" href="css/aside.css"/>
    <!--<link href= rel="stylesheet" "https://fonts.googleapis.com/css?family=Droid+Sans" >-->
    <script src ="js/html5shiv.min.js"></script>
    <script src ="js/respond.min.js"></script>
    </head>
  <body> 


       <div class="col-md-3 hidden-sm hidden-xs">
            <div class="ec-filters-menu">
                <h3 class="section-title no-margin-top">ترشيحات</h3>
                <h4>المنتجات</h4>
                <ul>
                    <?php $pag=$_SERVER['PHP_SELF'];
  

if(!strpos($pag,"product.php")){
  
                    $type='none';
                    $order='none';}?>
                    <li ><a href="product.php" <?php if($type=="all"){echo 'class="active"';}?>>الكل</a></li>
                    <li><a href="product.php?subject=phone" <?php if($type=="phone"){echo 'class="active"';}?>>موبايلات</a></li>
                    <li><a href="product.php?subject=tab"<?php if($type=="tab"){echo 'class="active"';}?>>تابلات</a></li>
                    <li><a href="product.php?subject=laptop"<?php if($type=="laptop"){echo 'class="active"';}?>>لابتوبات</a></li>
                </ul>
                <h4 >ترتيب بواسطة</h4>
                <ul>
                     
                    
            <li><a href="product.php?<?php if($type!='all')echo"subject=$type"; ?>&order=P_Price&by=asc" <?php
    if($order=="P_Price"&&$by=="asc"){echo 'class="active"';}?>">السعر :منخفض الى عالي</a></li>
                    <li><a href="product.php?<?php if($type!='all')echo"subject=$type"; ?>&order=P_Price&by=desc"<?php
    if($order=="P_Price"&&$by=="desc"){echo 'class="active"';}?>>السعر :عالي الى منخفض</a></li>
                    <li><a href="product.php?<?php if($type!='all')echo"subject=$type"; ?>&order=P_Sold&by=asc" <?php
    if($order=="P_Sold"){echo 'class="active"';}?>>الاكثر مبيعا</a></li>
                    <li><a href="product.php?<?php if($type!='all')echo"subject=$type"; ?>&order=P_Date&by=asc"<?php
    if($order=="P_Date"){echo 'class="active"';}?>>الاحدث</a></li>    
                </ul>
            </div>
        </div>
 </div>

  </body>
  </html>