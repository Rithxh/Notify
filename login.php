<?php
include_once 'header.php'
?>

        <section class="heading">
          <h1>Log in</h1>
        </section>
    </section>

    <section class="form">
      <div class="row">
        <form action="login.inc.php" method="post">

          <label for="Email/Username" class="form-label">E-mail/Username</label>
          <input type="text" name="uid" id="Email/Username" required>

          <label for="Password" class="form-label">Password</label>
          <input type="password" name="pwd" id="Password" required>

          <button type="submit" name="submitLogin" class="btn btn-outline-dark btn-lg explore-btn">Log In</button>

        </form>
        <?php
        if(isset($_GET["error"]))
        {
            if($_GET["error"]=="emptyinput")
            {
                echo "<p>Fill in all fields!</p>";
            }
            if($_GET["error"]=="wronglogin")
            {
                echo "<p>Username or Password Incorrect!</p>";
            }
        }
        ?>
      </div>
    </section>

<?php
include_once 'footer.php'
?>
