<?php

include_once './header.php';

$ussername = $_POST['username'];
$pass1 = $_POST['pass'];
$pass2 = $_POST['pass2'];
$county = $_POST['country']; 

$ussername2 = $_COOKIE[$cookie_login];

$query = "SELECT password FROM users WHERE id = ?";
$stmt =  $pdo->prepare($query);
$stmt->execute([$_SESSION['user_id']]); 

foreach ($stmt as $row){
    $pass_check = $row['password'];
    /*
    echo $pass_check."psad";
    die();
     * 
     */
}
if($pass1 != $pass_check){
     header("Location: ./edit.php?id=1");
}else{

        
if(!empty($ussername) && !empty($county)  ){
    	$allowedFileTypes = ['jpg', 'png', 'jpeg', 'gif'];
	$targetDir = dirname(getcwd(), 1).'/images';
	$targetFile = $targetDir;
	$url = '/images';
	$fileType = strtolower(pathinfo($targetDir.basename($_FILES['file']['name']),PATHINFO_EXTENSION));
	$fileName = basename($_FILES['file']['name']);


    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) 
    {
        //echo "File is an image - " . $check["mime"] . ".";
        //OK
        if(in_array($fileType, $allowedFileTypes))
        {
        	echo "File is correct type<br>";
	        if($_FILES['file']['size'] <= 40000000) //Ne sme bit večja od 40MB
	        {
	        	echo "File is smaller than 20MB<br>";
	        	$query = "SELECT COUNT(*) FROM users";
	        	$stmt = $pdo->query($query);
	        	$numPosts = $stmt->fetchColumn();
	        	echo $numPosts;
	        	$numPosts++;
	        	$targetFile .= "\img".$numPosts.".".$fileType;
	        	$url .= "\img".$numPosts.".".$fileType;
	        	if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) 
	        	{
			        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
			        $lol = $pdo->prepare("UPDATE `users` SET `country_id`=?,`password`=?,`username`=?,`profile_pic_URL`=? WHERE username = ?");
                                $lol->execute([$county, $pass2, $ussername, $url, $ussername2]);
                                header("Location: ../index.php?users=0");
                                setcookie($cookie_login,$ussername, time() *999*9999,"/");
			        echo $url;
			    } 

			    else 
			    {
			        echo "<script> alert(Sorry, there was an error uploading your file.)</scritp";
			       // header('Location: ../index.php');
			    }
	        }
	    }
    

    else 
    {
        echo "File is not an image.";
        //NOT OK
    }
}
else
{
	echo "Choose a file pls";
}
    

$lol = $pdo->prepare("UPDATE `users` SET `country_id`=?,`password`=?,`username`=? WHERE username = ?");
                                $lol->execute([$county, $pass2, $ussername, $ussername2]);
                                header("Location: ../index.php?users=0");
                                setcookie($cookie_login,$ussername, time() *999*9999,"/");

   
   }else
    header("Location: ./edit.php?id=1");
}
   
   