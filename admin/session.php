<?php
   include('connect.php');
   session_start();
   
   $username = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($dbc,"SELECT username FROM admin_tbl WHERE username = '$username' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   

   
   if(!isset($_SESSION['login_user'])){
      header("location:loginpage.html");
      die();
   }
?>