<?php

include_once '../connection/database.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$ussername = $_POST['username'];
$email = $_POST['e-mail'];
$pass1 = $_POST['pass'];
$pass2 = $_POST['pass2'];
$county = $_POST['country']; 
$birthday = $_POST['birthday'];
echo $name. $surname. $ussername. $email. $pass1. $pass2. $county, $birthday;
$profileurl = "asd";

if($pass1 != $pass2){
     header("Location: ./register.php?id=1");
}else{

        
if(!empty($name) && !empty($surname) && !empty($pass1) && !empty($email)  ){
    
    	$allowedFileTypes = ['jpg', 'png', 'jpeg', 'gif'];
	$targetDir = dirname(getcwd(), 1).'\images';
	$targetFile = $targetDir;
	$url = 'images';
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
	        	$query = "SELECT COUNT(*) FROM tweets";
	        	$stmt = $pdo->query($query);
	        	$numPosts = $stmt->fetchColumn();
	        	echo $numPosts;
	        	$numPosts++;
	        	$targetFile .= "\img".$numPosts.".".$fileType;
	        	$url .= "\img".$numPosts.".".$fileType;
	        	if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) 
	        	{
			        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
			        $lol = $pdo->prepare("INSERT INTO `users`(`country_id`, `name`, `surname`, `password`, `username`, `profile_pic_URL`, `birthday`) VALUES (?,?,?,?,?,?,?)");
    $lol->execute([$county, $name, $surname, $pass1, $ussername, $url, $birthday]);
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
    
$lol = $pdo->prepare("INSERT INTO `users`(`country_id`, `name`, `surname`, `password`, `username`, `profile_pic_URL`, `birthday`) VALUES (?,?,?,?,?,?,?)");
    $lol->execute([$county, $name, $surname, $pass1, $ussername, $profileurl, $birthday]);
     header("Location: ../login/login.php");

   
   }else
    header("Location: ./register.php");
}
   
   