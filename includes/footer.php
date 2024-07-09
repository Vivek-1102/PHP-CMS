

<!-- Toast Notification -->
<div id="toast" class="top right">
        <div id="toast-message"></div>
    </div>




<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> 

<script>
     function showDeleteModal(userId) {
        var modal = document.getElementById('deleteModal');
        modal.style.display = 'block';
        // Store the user ID in a data attribute for later use
        modal.setAttribute('data-user-id', userId);
    }

    function hideDeleteModal() {
        var modal = document.getElementById('deleteModal');
        modal.style.display = 'none';
        // Clear the stored user ID
        modal.removeAttribute('data-user-id');
    }

    function deleteUser(userId) {
        // Construct the delete URL using the stored user ID
        var deleteUrl = 'users.php?delete=' + encodeURIComponent(userId);
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