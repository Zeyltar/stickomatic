<?php
  session_start();
  $pdo = new PDO("mysql:host=localhost;dbname=stickomatic", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

  if (!empty($_SESSION["userID"]) && !empty($_SESSION["hash"])) {
    $hash = $_SESSION["hash"];
    $id = $_SESSION["userID"];

    $query = "SELECT * FROM users WHERE id = '$id' AND passwd = '$hash';";
    
    $result = $pdo->query($query);
    $user = $result->fetch(PDO::FETCH_OBJ);
  }