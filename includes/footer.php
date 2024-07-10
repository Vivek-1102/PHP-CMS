

<!-- Toast Notification -->
<div id="toast" class="top right">
        <div id="toast-message"></div>
    </div>




<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> 

<script>
    function showDeleteModal(userId) {
  userIdToDelete = userId;
  document.getElementById('deleteModal').style.display = 'block';
}

function hideDeleteModal() {
  document.getElementById('deleteModal').style.display = 'none';
   // Clear the stored user ID
      modal.removeAttribute('data-user-id');
}

function confirmDeleteUser() {
  // Construct the delete URL using the stored user ID
  var deleteUrl = 'users.php?delete=' + encodeURIComponent(userIdToDelete);
  // Redirect to delete URL
  location.href = deleteUrl;
}


      function showToast(message, position, type) {
        const toast = document.getElementById("toast");
        toast.className = toast.className + " show";

        if (message) toast.innerText = message;

        if (position !== "") toast.className = toast.className + ` ${position}`;
        if (type !== "") toast.className = toast.className + ` ${type}`;

        setTimeout(function () {
          toast.className = toast.className.replace(" show", "");
        }, 3000);
      }

      
    </script>
<?php get_message(); ?>
</body>
</html>