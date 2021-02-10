<?php  

// https://www.geeksforgeeks.org/php-program-count-page-views/

$valor = 10;

session_start(); 
   
if(isset($_SESSION['views'])) 
    $_SESSION['views'] = $_SESSION['views']+1; 
else
    $_SESSION['views']=1; 
      
echo"views = ".$_SESSION['views']; 
echo "valor = ".$valor;
  
?> 