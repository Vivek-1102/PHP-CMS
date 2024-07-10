<?php 
ob_start();
include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();
include('includes/header.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link rel="stylesheet" href="css/dashboard.css">
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
 <h1 class="h2">Users</h1>
 <button type="submit" class="btn btn-success align-items-center gap-1" data-bs-toggle="modal"   data-bs-target="#addModal">Add Users</button>
</div>

<!-- Logic for adding Users -->

<?php 
if ($stm = $pdo->prepare('SELECT * FROM users')){
  $stm->execute();


  $result = $stm->fetchAll(PDO::FETCH_ASSOC);

}



if (isset($_GET['delete'])) {
  // Delete user if delete parameter is set
  $deleteId = $_GET['delete'];
  $stm = $pdo->prepare('DELETE FROM users WHERE id = ?');

  if ($stm) {
      $stm->bindValue(1, $deleteId, PDO::PARAM_INT);
      $stm->execute();

      set_message("User with ID {$deleteId} has been deleted");
      header('Location: users.php');
      exit();
  } else {
      echo 'Could not prepare delete statement!';
  }
}

?>

<?php
if (isset($_POST['username']) && isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed = sha1($password); // Use more secure hashing methods for production (e.g., password_hash())
    $active = $_POST['active'];
    $admin = $_POST['role'];

    if ($stm = $pdo->prepare('INSERT INTO users (username, email, password, active, role) VALUES (?, ?, ?, ?, ?)')) {
        $stm->bindValue(1, $username, PDO::PARAM_STR);
        $stm->bindValue(2, $email, PDO::PARAM_STR);
        $stm->bindValue(3, $hashed, PDO::PARAM_STR);
        $stm->bindValue(4, $active, PDO::PARAM_INT);
        $stm->bindValue(5, $admin, PDO::PARAM_STR);

        $stm->execute();

        set_message("A new user " . $_SESSION['username'] . " has been added");
        header('Location: users.php');
        exit(); // Use exit() instead of die() for better practice
    } else {
        echo 'Could not prepare statement!';
    }
}



?>



<!-- Modal for adding Users -->

<div class="modal" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


                    <form method="post" action="users.php" enctype="multipart/form-data">
                        <!-- Username input -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>

                        <!-- Email input -->
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <!-- Password input -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <!-- Active select -->
                        <div class="form-group">
                            <label for="active">Status</label>
                            <select name="active" class="form-control" id="active">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Admin select -->
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                       
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-block" name="add_user">Add User</button>
                        </div>
                    </form>
</div>
    </div>
  </div>
</div>

<!-- Representing data in table form -->

<div class="table-responsive medium">
        <table id="user-table" class="table table-striped ">
        <thead>
         <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Status</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete </th>
            <th>Password</th>
         </tr>
        </thead>
          <tbody>
             <?php foreach ($result as $record): ?>
                <tr>
                  <td><?php echo htmlspecialchars($record['id']); ?> </td>
                  <td><?php echo htmlspecialchars($record['username']); ?> </td>
                  <td><?php echo htmlspecialchars($record['email']); ?> </td>
                  <td><?php echo htmlspecialchars($record['active']); ?> </td>
                  <td><?php echo htmlspecialchars($record['role']); ?> </td>
                  <td>
                  <button class= " pdf-button2" onclick="location.href='users_edit.php?id=<?php echo htmlspecialchars($record['id']); ?>'">Edit</button>
                  </td>
                  <td> <button name="delete_id" class= "pdf-button2" onclick="showDeleteModal('<?php echo htmlspecialchars($record['id']); ?>')">Delete</button></td>
                  <td> <button class= "pdf-button2" onclick="location.href='reset.php?id=<?php echo htmlspecialchars($record['id']); ?>'">Reset</button></td>

                    <!--  -->
         
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

<!-- Delete Modal -->
<div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 1000;">
  <div style="background-color: #fff; width: 300px; margin: 15% auto; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,0.5);">
    <p style="color: #000;">Are you sure you want to delete this user?</p>
    <div style="text-align: center;">
      <button class="rounded-button" style="background-color: #dc3545; color: #fff; border: none; padding: 5px 10px; cursor: pointer; text-decoration: none; margin-right: 10px;" onclick="confirmDeleteUser()">Delete</button>
      <button class="rounded-button2" style="background-color: #6c757d; color: #fff; border: none; padding: 5px 10px; cursor: pointer; text-decoration: none;" onclick="hideDeleteModal()">Cancel</button>
    </div>
  </div>
</div>

<script>
 new DataTable('#user-table');
 
</script>

<?php
include('includes/footer.php');
?>
</body>
</html>