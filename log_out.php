
<?php
require_once "Connections/con_sql_DB.php";

    
    $sql = "delete from carts";
    $result = mysqli_query($con_db, $sql);
   
    
    session_start();
   // remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
    header("REFRESH:0;index.php");

?>