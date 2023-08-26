<?php
  
  include_once '../../backend/Model/middleware.php';
  include_once '../../backend/Model/DatabaseConnection.php';

  $adminRole='admin';

  if(Middleware::isAdmin($adminRole)){
     
  }else{
    header('Location: ../frontend/login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   nice
</body>
</html>