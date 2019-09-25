<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","users");
    
    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }

    
        if(isset($_POST['submit'])){
            $user_email = $_POST['email'];
            $user_password = $_POST['password'];
            
            if(!empty($user_email) && !empty($user_password)){
                $sql = "SELECT id,email FROM user WHERE email = '$user_email' AND password = '$user_password'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['email'] = $user_email;
                    header("Location: index.php");

                }
                else{
                    echo '<p id="b" style = "margin-left:auto; margin-right:auto; width:250px;position:relative;top:50px;color:red;">Извините, имя пользователя или пароль неправильные</p>';
                }
            }
            else{
                echo '<p id="error" style="display:block;"></p>';
            }
            
        }
    

?>
   <html>
    <head>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <style type="text/css">
           .login{
    margin-left: auto;
    margin-right: auto;
    margin-top: 150px;
    width:250px;border:1px solid #fff;border-radius:3px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.15);
    padding: 10px;
}
            
input,p{ 
    margin: 10px;
}
p{font-family:'Roboto', sans-serif; font-size: 15px;}
            
input{
    padding: 10px; width:230px;border: 0.5px solid #efeded;
}
#email{border-radius: 3px;}
#submit{background-color: #4489ce;color: white;}
a{
    font-size: 15px;
    padding-left: 85px;
    text-decoration: none;
    color: #1b6ab9;
}

.title h2{
    width: 250px;
    padding: 20px;
    margin-left: auto;
    margin-right: auto;
    padding-top: 60px;
    font-family: 'Poiret One', cursive;
    font-size: 18px;
}
.error{
    color: red;
    position: relative;
    left: 10px;
}
@media only screen and (max-width:360px){
    .login{
    width: 72%;
    }
    input{
        width:210px;
    }
    
}

@media only screen and (max-width:320px){
    .login{
    width: 65%;
    }
                
p{font-size: 12px;}
    input{
        width:180px;
    }
    a{
        font-size: 12px;
        margin-left: -20px;
    }
    .title h2{
        font-size: 12px;
        margin-left: auto;
        margin-right: auto;
        width: 170px;
    }
    .error{
        font-size: 12px;
    }
                
}
       </style>

    </head>
    <body>
      <div class="title">
    
       <div class="login">
        <form class="form" action="login.php" onsubmit="return errorF()" name="eform" method="post">
            <p>Вход в личный кабинет</p>
            <input id="email" type="text" name="email" placeholder="E-mail или номер телефона"><br>
            <div id="error_email" class="error"></div>
            <input id="pass" type="password" name="password" placeholder="Введите пароль"><br>
            <div id="pass_error" class="error"></div>
            <input id="submit" type="submit" name="submit" value="Продолжить"><br>
            <a href="http://localhost/paizu/register.php">Sign Up</a> 
            
                      
        </form>
        </div>
        <script>
        
            var email = document.forms["eform"]["email"];
            var password = document.forms["eform"]["password"];
          
            
            var email_error = document.getElementById("error_email");
            var pass_error = document.getElementById("pass_error");
     
        function errorF(){
            if(email.value === ""){
                
                email_error.textContent = "Введите телефон номер или e-mail";
                email.focus();
                return false;
            }
            if(password.value === ""){
                
                pass_error.textContent = "Введите пароль";
                password.focus();
                return false;
            }
                       
            }
        function emailVerify(){
            if(email.value != ""){
                email_error.innerHTML = "";
                return true;
            }
        }
        document.querySelector("#email").addEventListener("blur",emailVerify,true);
        
        function passVerify(){
            if(password.value != ""){
                pass_error.innerHTML = "";
                return true;
            }
        }
        document.querySelector("#pass").addEventListener("blur",passVerify,true);
        </script>
    </body>
</html>