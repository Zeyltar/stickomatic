<?php
include('../inc/data.inc.php');

  
  
  if(!empty($_FILES)) 
  {
    $userID = $user->id;
  
    $query = "INSERT INTO stickers (creatorId) VALUES ('$userID');";

    $result = $pdo->exec($query);
    $sID = $pdo->lastInsertId();

    $dir = "../stickers/$sID";
    foreach ($_FILES["images"]["error"] as $key => $error) {
      if ($error == UPLOAD_ERR_OK) {
        if(!file_exists($dir)) {
          mkdir($dir, 0700);
          $count = 0;
        }
        else {
          $count = count(scandir($dir))-2;
        }
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $fileName = "image" . $count . "." . pathinfo($_FILES["images"]["name"][$key], PATHINFO_EXTENSION);
        move_uploaded_file($tmp_name, "$dir/$fileName");

        $query = "INSERT INTO images (stickerId, imagePath) VALUES ('$sID', '$sID/$fileName');";
        echo $query;
        $result = $pdo->exec($query);
      }
    }
  }
  header("Location: ../postSticker.php");
  exit();