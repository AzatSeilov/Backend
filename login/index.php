<?php
	$dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'users');
   
         if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }


        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn,$sql);
        $length = mysqli_num_rows($result);
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>MainPage</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>

     <div id="head">
        

                 <?php
                  if(empty($_SESSION['email'])){
                      
                  
                  ?>
               <a id = "a" href="http://localhost/paizu/register.php">Регистрация</a>
              
                <a id="b" href="http://localhost/paizu/login.php">Личный кабинет</a>
                <?php
                  }else{ ?>
                    <a id="a" href="#"><?php echo $_SESSION['email']; ?></a>  
                    <a id="b" href="ex.php">Выйти</a>  
          <?php
              
          }
        ?></div>

        
             
       
      
  </body>
</html>