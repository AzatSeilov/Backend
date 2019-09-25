<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","users");
    
    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpass = $_POST['conf'];
        if(!empty($email) && !empty($password) && !empty($confpass) && $password == $confpass){
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 0){
                $sql = "INSERT INTO user (email,password) VALUES ('$email', '$confpass')";
                $result = mysqli_query($conn, $sql);
                $_SESSION['email'] = $email;
                header("Location: index.php");
               
            }
            else{
                echo '<p id="error" style = "margin-left:auto; margin-right:auto; width:200px;position:relative;top:50px;color:red;">Логин уже существует</p>';
            }
        } 
        
    }
mysqli_close($conn);
?>
   <html>
    <head>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style type="text/css">
          .val_error{
    color: red;
    position: relative;
    left: 10px;
}
.form-card{
    margin-left: auto;
    margin-right: auto;
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
#pass{border-radius: 3px;}
#conf{border-radius: 3px;}
#email{border-radius: 3px;}
#submit{background-color:#4489ce;color: white;}
#a{
    font-size: 11px;
    position: relative;
    top: 12px;
}
a{
    font-size: 15px;
    padding-left: 85px;
    text-decoration: none;
    color: #1b6ab9;
}
.title p{
    width: 250px;
    padding: 20px;
    margin-left: auto;
    margin-right: auto;
    padding-top: 60px;
    font-family: 'Poiret One', cursive;
    font-size: 18px;
}


@media only screen and (max-width:360px){
    .form-card{
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
    .title p{
        font-size: 12px;
        margin-left: auto;
        margin-right: auto;
        width: 170px;
    }
    .val_error{
        font-size: 12px;
    }
                
}
      </style>
    
    </head>
    <body>
      <div class="title">
       <div class="form-card">
        <form action="register.php" method="post" onsubmit="return errorF()" name="eform">
            <p>Вход в личный кабинет</p>
            <input id="email" type="text" name="email" placeholder="E-mail или номер телефона"><br>
            <div id="email_error" class="val_error"></div>
            <input id="pass" type="password" name="password" placeholder="Введите пароль"><br>
            <input id="conf" type="password" name="conf" placeholder="Повторите пароль" ><br>
            <div id="pass_error" class="val_error"></div>
            <input name="submit" id="submit" type="submit" value="Сохранить и войти"><br>
            <a href="http://localhost/paizu/login.php">У меня есть аккаунь</a>           
        </form>
    </div>
    <script>
        
            var email = document.forms["eform"]["email"];
            var password = document.forms["eform"]["pass"];
            var confirm = document.forms["eform"]["conf"];
            
            var email_error = document.getElementById("email_error");
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
            if(password.value != confirm.value){
                pass_error.textContent = "Password и Confirm Password должень быть равно!";
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