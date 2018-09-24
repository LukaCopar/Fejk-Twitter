<?php
include_once '../connection/database.php';

$ussername = $_COOKIE[$cookie_login];

$ime = $pdo->prepare('SELECT id FROM users WHERE (username = ?)');
$id = $ime->execute([$ussername]);
$row = $ime->fetch();
$jau = $row['id'];
  
$content = $_POST['content'];
$userID = $jau;


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
			        $query = "INSERT INTO `tweets`(`user_id`, `content`, picture) VALUES (?,?,?)";
                                $stmt = $pdo ->prepare($query);
                                $stmt -> execute([$userID, $content, $url]);
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


header('Location: ../index.php');


