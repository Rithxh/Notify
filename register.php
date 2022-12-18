<?php
include_once 'header.php'
?>

        <section class="heading">
          <h1>Register now!</h1>
          <h2>Create an account and start viewing and uploading files immediately</h2>
        </section>
    </section>

    <section class="form">
      <div class="row">
        <form action="register.inc.php" method="post">

          <label for="First-name" class="form-label">First Name</label>
          <input type="text" name="fname" id="First-name" required>

          <label for="Last-name" class="form-label">Last Name</label>
          <input type="text" name="lname" id="Last-name" required>

          <label for="Username" class="form-label">Username</label>
          <input type="text" name="uid" id="Username" required>

          <label for="E-mail" class="form-label">E-mail</label>
          <input type="email" name="email" id="E-mail" required>

          <label for="Password" class="form-label">Password</label>
          <input type="password" name="pwd" id="Password" required>

          <button type="submit" name="submitRegister" class="btn btn-outline-dark btn-lg explore-btn">Sign Up</button>
        </form>
        <?php
        if(isset($_GET["error"]))
        {
            if($_GET["error"]=="emptyinput")
            {
                echo "<p>Fill in all fields!</p>";
            }
            if($_GET["error"]=="invalidemail")
            {
                echo "<p>Choose a proper email!</p>";
            }
            if($_GET["error"]=="usernametaken")
            {
                echo "<p>Username already taken!</p>";
            }
            if($_GET["error"]=="none")
            {
                echo "<p>You have signed up!</p>";
            }
        }
        ?>
      </div>
    </section>
<?php
include_once 'footer.php'
?>
