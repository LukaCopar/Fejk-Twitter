<!DOCTYPE html>
<html>
    <?php
    include_once './header.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <title>tweeter/register</title>
         
    </head>
    <body>
         <div id="register">
        <form action="./input_user.php" method="post" enctype="multipart/form-data">
            
            <div class="reg-input"><input class="input2" type="text" name="username" placeholder="username" required/></div>
           <div class="reg-input"> <input class="input2" type="text" name="name" placeholder="name" required/></div>
           <div class="reg-input"> <input class="input2" type="text" name="surname" placeholder="surname" required/></div>
           <div class="reg-input"> <input class="input2" type="email" name="e-mail" placeholder="e-mail" required/></div>
           <div class="reg-input"> <input class="input2" type="date" name="birthday" placeholder="birthday" required/></div>
           <div class="reg-input"> <input class="input2" type="password" name="pass" placeholder="password" required required /></div>
           <div class="reg-input"> <input class="input2" type="password" name="pass2" placeholder="repeat password" required /></div>
           <label class="input-file-reg"> add a profile picture<input class="input2" type="file" name="file" /></label>
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
