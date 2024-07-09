<?php


include('includes/database.php'); 
include('includes/config.php');
include('includes/functions.php');
secure();
 

  if (isset($_GET['sirb_id'])) {
    $id = htmlspecialchars($_GET['sirb_id']);
       
      $stmt = $pdo->prepare("SELECT * FROM sirb WHERE sirb_id = ?");
      $stmt->execute([$id]);
      $file = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($file) {
        $res = [
            'status' => 200,
            'message' => 'File Fetched Successfully by id',
            'data' => $file
        ];
    } else {
        $res = [
            'status' => 404,
            'message' => 'File Id Not Found'
        ];
    }    
    echo json_encode($res);
    return;

  }

?> 



