<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    include_once './header.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <title>tweeter/register</title>
          <script>
        function checkPass()
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    var mehColor = "#ffffff";
    if(pass1.value == pass2.value && pass2.value == ""){
       pass2.style.backgroundColor = mehColor;
    }
    else if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        
        
    }
    else{
        pass2.style.backgroundColor = badColor;
        
    }
    
}  
        
        </script>
    </head>
    <body>
         <div id="register">
        <form action="./input_user.php" method="post">
            
            <input type="text" name="username" placeholder="username" required/><br><br>
            <input type="text" name="name" placeholder="name" required/><br><br>
            <input type="text" name="surname" placeholder="surname" required/><br><br>
            <input type="date" name="birthday" placeholder="birthday" required/><br><br>
            <input type="password" name="pass" id="pass1" placeholder="password" required required onkeyup="checkPass(); return false;"/><br><br>
            <input type="password" name="pass2" id="pass2" placeholder="repeat password" required onkeyup="checkPass(); return false;"/><br><br>
            <select name="razred">
            
                
                <?php
                    $query = "SELECT ime FROM `razredi`";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option value="'.$row['ime'].'" >'.$row['ime'].'</option>';
                       
                    }
                ?>
            </select><br>
            <input type="submit" class="button" value="register"/>
        </form>
             <div>
                 you have an account?<br>
            <button class="button" onclick="location.href='../login/login.php';">Log In</button>
            </div>
        </div>
    </body>
</html>
