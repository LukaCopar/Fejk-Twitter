<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>tweetr/google login</title>
    </head>
    <body>
        <?php
        include_once '../connection/database.php';
        include_once './header.php';
        $name = $_GET['name'];
        $url = $_GET['URL'];
        $mail = $_GET['email'];
        $id = $_GET['id'];
        $username = $_GET['name'];
        
        $query = "SELECT * FROM `users` WHERE authentication_token = ?"; 
        $stmt = $pdo->prepare($query);
        $stmt -> execute([$id]);
        foreach ($stmt as $row){    
            $pass = $row['password'];
            header("Location: ./login_check.php?password=".$pass."&username=".$id);
            /*
           echo $row['username'];
           die();
             * 
             */
        }  
        ?>
         <div id="register">
             <form action="../register/input_user.php" method="post" enctype="multipart/form-data">
            
            <div class="reg-input"><input class="input2" type="text" name="username" placeholder="username" value="<?php echo $username; ?>" required/></div>
           <div class="reg-input"> <input class="input2" type="text" name="name" placeholder="name"  required/></div>
           <div class="reg-input"> <input class="input2" type="text" name="surname" placeholder="surname" required/></div>
           <div class="reg-input"> <input class="input2" type="email" name="e-mail" placeholder="e-mail"value="<?php echo $mail; ?>" required/></div>
           <div class="reg-input"> <input class="input2" type="date" name="birthday" placeholder="birthday" required/></div>
           <div class="reg-input"> <input class="input2" type="password" name="pass" placeholder="password" required required /></div>
           <div class="reg-input"> <input class="input2" type="password" name="pass2" placeholder="repeat password" required /></div>
           <div class="reg-input"> <input type="hidden" name="googleimg" value="<?php echo $url; ?>" /></div>
           <div class="reg-input"> <input type="hidden" name="id" value="<?php echo $id; ?>" /></div>
           
           <?php
           
           if(isset($_GET['id']) > 0){
               echo '<script>alert("passwords do not match!")</script>';
               
           }
           ?>
           <select name="country">
               <?php
               
              $ime = $pdo->query('SELECT * FROM countries');
              foreach ($ime as $row){
                        echo '<option value="'.$row['id'].'" >'.$row['name'].'</option>';
                       
                    }
               
               ?>
               
               
           </select>
           
           
           
           
           
            <input type="submit" class="button-reg margin-top" style="margin-left: -10%; width: 130%;" value="register"/>
            
        </form>
             <div id="login-register">
                 you have an account?<br>
            <button class="button-reg" onclick="location.href='../login/login.php';">Log In</button>
            </div>
        </div>
        
        
    </body>
</html>
