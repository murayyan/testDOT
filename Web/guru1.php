<?php 

 @session_start();
    include"connection.php";
     if (@$_SESSION['level']!='guru') {
     	 header("location: login.php");
     }else{
     	?>
     <!DOCTYPE html>
     <html>
     <head>
     	<title></title>
     </head>
     <body>
     guru
     </body>
     </html>

     	<?php
     }
 ?>