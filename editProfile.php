<?php
  include_once 'header.php';

?>
      <section class="heading">
        <h1>Edit</h1>
      </section>
    </section>
    <section class="edit-profile">
      <div class="row">
        <form class="form" action="edit.inc.php" method="post">

          <label for="First-name" class="form-label">First Name</label>
          <input type="text" name="new-fname" id="First-name" required>

          <label for="Last-name" class="form-label">Last Name</label>
          <input type="text" name="new-lname" id="Last-name" required>

          <label for="Username" class="form-label">Username</label>
          <input type="text" name="new-uid" id="Username" required>

          <label for="E-mail" class="form-label">E-mail</label>
          <input type="email" name="new-email" id="E-mail" required>

          <button type="submit" name="submitEdit" class="btn btn-outline-dark btn-lg explore-btn">Save</button>
          <a href="profile.php"><button type="button" name="cancel" class="btn btn-outline-dark btn-warning btn-lg explore-btn">Cancel</button></a>

        </form>

    </section>
<?php
  include_once 'footer.php'

 ?>
