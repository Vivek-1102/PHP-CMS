<?php
ob_start();
include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');

secure();
 include('includes/header.php');

  // Fetch all files data with pagination
$stmt_files = $pdo->prepare("SELECT * FROM sirb ORDER BY yy, volno, issue");
$stmt_files->execute();
$files = $stmt_files->fetchAll(PDO::FETCH_ASSOC);



?>





<!doctype html>
<html lang="en" data-bs-theme="light">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    
    <title>Posts Management</title>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="DataTables/datatables.css" rel="stylesheet">
    <link href="css/toast.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <style>
      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
       }
    </style>
    <script src="jquery-3.7.1.js"></script>
    <script src="DataTables/datatables.js"></script>

  </head>
  <body>
   

   

    
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">

  <symbol id="edit" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
  </symbol>
  
  <symbol id="view" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
  </symbol>


  <symbol id="delete" viewBox="0 0 16 16">
  <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z"/>  
 </symbol>

 
 
  <symbol id="door-closed" viewBox="0 0 16 16">
    <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
    <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
  </symbol>
  
  <symbol id="file-earmark-text" viewBox="0 0 16 16">
    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
  </symbol>
  <symbol id="gear-wide-connected" viewBox="0 0 16 16">
    <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
  </symbol>
  <symbol id="graph-up" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
  </symbol>
 
  
  <symbol id="people" viewBox="0 0 16 16">
    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
  </symbol>
  

 
</svg>


 <header class="navbar bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white text-centre" href="#">SIRB CMS</a>
</header> 

<div class="container-fluid">
  <div  class="row">
    <div  class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary sticky-top ">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary sticky-top" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
         <div class="offcanvas-header sticky-top">
           <h5 class="offcanvas-title" id="sidebarMenuLabel">SIRB CMS</h5> 
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div  class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto sticky-top">
          <ul class="nav flex-column">
           
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" href="posts.php">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Posts
              </a>
            </li>
            <?php if ($_SESSION['role'] === 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="users.php">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Users
              </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="transaction_log.php">
                <svg class="bi"><use xlink:href="#graph-up"/></svg>
                Transaction Logs
              </a>
            </li>
          </ul>

          

          

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="reset_your_password.php?id=<?php echo htmlspecialchars($_SESSION['id']); ?>">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Reset Password
              </a>  
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="logout.php">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </a>
            </li>
          </ul>
        </div>
      </div>
      </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts</h1>
       

        <button type="submit" class="btn btn-success align-items-center gap-1" data-bs-toggle="modal"   data-bs-target="#addModal">Add File</button>
        </div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_file'])) {
    $month1 = $_POST['month1'];
    $month2 = $_POST['month1'];
    $year = $_POST['year'];
    $volume = $_POST['volume'];
    $issue = $_POST['issue'];

    // Ensure the 'uploads' directory exists and is writable
    $uploads_dir = 'uploads';
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true); // Create the directory if it does not exist
    }

    // Ensure the year subdirectory exists
    $year_dir = $uploads_dir . '/' . $year;
    if (!is_dir($year_dir)) {
        mkdir($year_dir, 0777, true); // Create the directory if it does not exist
    }

    // Create the dynamic file name based on form inputs
    $pdf_file = 'sirb' . $issue . '.pdf';
    $pdf_file_path = $year_dir . '/' . $pdf_file;

    // Move the uploaded file to the year subdirectory
    if (move_uploaded_file($_FILES['URL']['tmp_name'], $pdf_file_path)) {
        $mmyy = "{$month1}-{$year}";

        // Insert into database
        $stmt = $pdo->prepare("INSERT INTO sirb (URL, issue, mmyy, volno, mm1, mm2, yy) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$pdf_file, $issue, $mmyy, $volume, $month1, $month2, $year]);

        // Log the transaction
        $user = $_SESSION['username'];
        $action = 'Add';
        $description = "Added file with issue: $issue, volume: $volume, year: $year";
        $log_stmt = $pdo->prepare("INSERT INTO transaction_log (action, user, description) VALUES (?, ?, ?)");
        $log_stmt->execute([$action, $user, $description]);

        set_message("A new post added by " . $_SESSION['username']);
        $stmt->closeCursor();

        header("Location: posts.php");
        exit();
    } else {
        echo "Failed to upload the file.";
    }
}
?>


        <!-- Modal add file logic -->
<div class="modal" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="posts.php" enctype="multipart/form-data">
    
    <div class="form-group">
       <label for="month1">Month:</label>
       <select class="form-control" id="month" name="month1" onchange="" required>
       <option value="">Select Month</option>
       <option value="Jan">Jan</option>
       <option value="Feb">Feb</option>
       <option value="Mar">Mar</option>
       <option value="Apr">Apr</option>
       <option value="May">May</option>
       <option value="Jun">Jun</option>
       <option value="Jul">Jul</option>
       <option value="Aug">Aug</option>
       <option value="Sep">Sep</option>
       <option value="Oct">Oct</option>
       <option value="Nov">Nov</option>
       <option value="Dec">Dec</option>
       </select>
    </div>
   
       <?php
         $current_year = date('Y');
         $year_range = range($current_year -13,$current_year );
       ?>
   
       <div class="form-group">
        <label for="year">Year:</label>
        <select class="form-control" id="year" name="year" required>
        <option value="">Select Year</option>
        <?php foreach ($year_range as $year): ?>
        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
        <?php endforeach; ?>
        </select>
       </div>
   
       <div class="form-group">
        <label for="volume">Volume:</label>
        <input class="form-control" type="number" id="volume" name="volume" required>
       </div>
       <div class="form-group">
        <label for="issue">Issue:</label>
        <input class="form-control" type="number" id="issue" name="issue" required>
       </div>
       <div class="form-group">
        <label for="pdf_file">PDF File:</label><br>
        <input class="form-control-file" type="file" id="pdf_file" name="URL" accept="application/pdf" required>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_file">Add</button>
        
      </div>
      </form>
    </div>
  </div>
</div>



 
      <!-- Representing data in table form via datatable -->
      <div class="table-responsive medium">
        <table id="example" class="table table-striped ">
          <thead>
            <tr style="text-align: center;">
              <th >Cover Image</th>
              <th >Volume</th>
              <th >Issue</th>
              <th >Month</th>
              <th >Year</th>
              <th >Action</th>
            </tr>
          </thead>
          <tbody>
             <?php foreach ($files as $file): ?>
                <tr>
                    <td>
                        <!-- <a href="#" class="popup-trigger" data-src="<?php echo $file['cover_image']; ?>">
                            <div class="cover-image">
                                <!51 <img src="<?php echo $file['cover_image']; ?>" alt="Cover Image"> --
                            </div>
                        </a> -->
                        <a href="#" data-toggle="modal" data-target="#coverImageModal" class="popup-trigger">
                            <div class="cover-image">
                            <img src="images/c1.jpg" width="170vh" height="auto" alt="cover image" srcset="">
                            </div>
                        </a>
                    </td>
                    <td><div style="text-align: center;" class="volume"><?php echo $file['volno']; ?></div></td>
                    <td><div style="text-align: center;" class="issue"><?php echo $file['issue']; ?></div></td>
                    <td><div style="text-align: center;" class="month"><?php echo ucfirst($file['mm1']); ?></div></td>
                    <td><div style="text-align: center;" class="year"><?php echo $file['yy']; ?></div></td>
                    <td>
                        <div class="actions" style="display:flex; justify-content:space-evenly;">
                            <a  href="uploads/<?php echo $file['yy'] . '/' . $file['URL']; ?>" target="_blank" class="pdf-button2">
                            <svg class="bi">
                            <use xlink:href="#view"/>
                            </svg>
                          </a>
                            
                             <a  name="sirb_id" data-sirb-id="<?php echo $file['sirb_id']; ?>" class="pdf-button2" data-toggle="modal" data-target="#editModal">
                            <svg class="bi">
                            <use xlink:href="#edit"/>
                            </svg>
                            </a>
                           
                            <a href="posts_delete.php?sirb_id=<?php echo $file['sirb_id']; ?>" class="pdf-button2" onclick="return confirm('Are you sure you want to delete this file?')">
                            <svg class="bi">
                            <use xlink:href="#delete"/>
                            </svg>
                           </a>
                        
                            
                            
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<?php 
try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_file']) && isset($_POST['id2']) && isset($_POST['new_pdf_file'])) {
      // Process file upload
      $id = $_POST['id2'];
      $month1 = $_POST['month2'];
      $year = $_POST['year2'];
      $volume = $_POST['volume2'];
      $issue = $_POST['issue2'];

      $pdf_file = $_FILES['new_pdf_file']['name'];
      $pdf_file_tmp_name = $_FILES['new_pdf_file']['tmp_name'];
      $pdf_file_error = $_FILES['new_pdf_file']['error'];
      $pdf_file_size = $_FILES['new_pdf_file']['size'];
      $pdf_file_type = $_FILES['new_pdf_file']['type'];

      // Fetch old file details
      $stmt = $pdo->prepare("SELECT * FROM sirb WHERE sirb_id = ?");
      $stmt->execute([$id]);
      $file = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set old and new directory and file names
      $old_directory = 'uploads/' . $file['yy'];
      $new_directory = 'uploads/' . $year;

      // Old file path and new file details
      $old_file_path = $old_directory . '/' . $file['URL'];
      $new_file_name = 'sirb' . $issue . '.pdf';  // New file name based on issue
      $new_file_path = $new_directory . '/' . $new_file_name;

      // Set the new mmyy value
      $new_mmyy = "{$month1}-{$year}";

      // Update database
      $stmt = $pdo->prepare("UPDATE sirb SET mm1 = ?, mm2 = ?, yy = ?, volno = ?, issue = ?, mmyy = ?, URL = ? WHERE sirb_id = ?");
      $stmt->execute([$month1, $month1, $year, $volume, $issue, $new_mmyy, $new_file_name, $id]);

      // Handle file upload
      if ($pdf_file) {
          if ($pdf_file_error === 0) {
              // Ensure the new directory exists
              if (!is_dir($new_directory)) {
                  mkdir($new_directory, 0777, true);
              }

              // Move the uploaded PDF file to the new directory
              move_uploaded_file($pdf_file_tmp_name, $new_file_path);

              // Remove the old file if it exists
              if (file_exists($old_file_path)) {
                  unlink($old_file_path);
              }
          } else {
              echo "Error uploading the PDF file.";
          }
      } else {
          // Handle no new file uploaded scenario (rename or move old file)
          if ($file['URL'] !== $new_file_name) {
              // Rename the old PDF file to the new name
              rename($old_file_path, $new_file_path);
          }
          if ($file['yy'] !== $year) {
              // Move the PDF file from the old directory to the new one
              rename($old_file_path, $new_file_path);
          }
      }

      // Check if the old directory is empty and delete it if it is
      if ($file['yy'] !== $year) {
          if (is_dir_empty($old_directory)) {
              rmdir($old_directory); // Remove the old directory if empty
          }
      }

      // Log the transaction
      $user = $_SESSION['username'];
      $action = 'Update';
      $description = "Updated file with ID: $id, new month: $month1, new year: $year, new volume: $volume, new issue: $issue, new file name: $new_file_name";
      $log_stmt = $pdo->prepare("INSERT INTO transaction_log (action, user, description) VALUES (?, ?, ?)");
      $log_stmt->execute([$action, $user, $description]);

      // Redirect back to posts.php after update
      set_message("A post Edited by " . $_SESSION['username']);
      header("Location: posts.php");
      exit();
  }

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


 

function is_dir_empty($dir) {
  if (!is_readable($dir)) return false;
  return (count(scandir($dir)) == 2);
}
?>
 
<!-- Modal for edit button -->

<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        
        </button>
      </div>
      <div class="modal-body">
        <!-- Form to edit file details -->
        <form id="editForm" method="post" action="posts.php" >
          <input type="hidden" id='sirbId1' name="id2">
          
          <div class="form-group">
          <label for="month2">Month:</label><br>
            <select class="form-control" id="month1" name="month2"  required>
                <option value="">Select Month</option>
                <option value="Jan" <?php if ($file['mm1'] == 'Jan') echo 'selected'; ?>>Jan</option>
                <option value="Feb" <?php if ($file['mm1'] == 'Feb') echo 'selected'; ?>>Feb</option>
                <option value="Mar" <?php if ($file['mm1'] == 'Mar') echo 'selected'; ?>>Mar</option>
                <option value="Apr" <?php if ($file['mm1'] == 'Apr') echo 'selected'; ?>>Apr</option>
                <option value="May" <?php if ($file['mm1'] == 'May') echo 'selected'; ?>>May</option>
                <option value="Jun" <?php if ($file['mm1'] == 'Jun') echo 'selected'; ?>>Jun</option>
                <option value="Jul" <?php if ($file['mm1'] == 'Jul') echo 'selected'; ?>>Jul</option>
                <option value="Aug" <?php if ($file['mm1'] == 'Aug') echo 'selected'; ?>>Aug</option>
                <option value="Sep" <?php if ($file['mm1'] == 'Sep') echo 'selected'; ?>>Sep</option>
                <option value="Oct" <?php if ($file['mm1'] == 'Oct') echo 'selected'; ?>>Oct</option>
                <option value="Nov" <?php if ($file['mm1'] == 'Nov') echo 'selected'; ?>>Nov</option>
                <option value="Dec" <?php if ($file['mm1'] == 'Dec') echo 'selected'; ?>>Dec</option>
            </select>
          </div>

          <div class="form-group">
          <label for="year2">Year:</label><br>
            <select class="form-control" id="year1" name="year2" required>
                <option value="">Select Year</option>
                <?php
                $current_year = date('Y');
                $year_range = range($current_year - 14, $current_year);
                foreach ($year_range as $yr) {
                    $selected = ($file['yy'] == $yr) ? 'selected' : '';
                    echo "<option value='{$yr}' {$selected}>{$yr}</option>";
                }
                ?>
            </select>
          </div>

          <div class="form-group">
          <label for="volume2">Volume:</label><br>
            <input class="form-control" type="number" id="volume1" name="volume2" value="<?php echo $file['volno']; ?>" required>

          </div>

          <div class="form-group">
          <label for="issue2">Issue:</label><br>
            <input class="form-control" type="number" id="issue1" name="issue2" value="<?php echo $file['issue']; ?>" required>

          </div>

          <div class="form-group">
            <label for="new_pdf_file">New PDF File:</label>
            <input  type="file" class="form-control-file" id='new_pdf_file' name="new_pdf_file" accept="application/pdf" required>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_file">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>




<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> 

<script>

                
 
 $(document).ready(function(){
  new DataTable('#example');

  
    // Function to handle modal show event and data fetching
    $('body').on('click', '[data-sirb-id]', function(){
        var sirbId = $(this).data('sirb-id');
        console.log("Before ajax call!",sirbId);
        $.ajax({
            url: 'posts_edit.php',
            type: 'GET',
            data: {sirb_id: sirbId},
            dataType: 'json',
            success: function(response){
              try {
                   console.log("Success!");
                    
                    var res = response.data;
                    console.log(res);
                    $('#sirbId1').val(res.sirb_id);
                    $('#month1').val(res.mm1);  
                    $('#year1').val(res.yy);
                    $('#volume1').val(res.volno);  
                    $('#issue1').val(res.issue); 
                    // $('#new_pdf_file').val(res.URL);
                    
                    $('#editModal').modal('show');
                
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                    console.error('Response received:', response);
                }
            },
            error: function(xhr, status, error){
              console.log("Error");
                console.error('Error fetching data:', error);
            }
        });

    });
});



</script>

<?php
include('includes/footer.php');
?>

</body>
</html>
