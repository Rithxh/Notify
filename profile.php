<?php
  include_once 'header.php';

  require_once 'database.php';
  require_once 'functions.inc.php';

  $user=$_SESSION["userUID"];
  $data=uidExists($con,$user,$user);
  if($data===false)
  {
      header("location:index.php?error=nouser");
      exit();
  }
  $first=$data["userFName"];
  $last=$data["userLName"];
  $em=$data["userEmail"];
  $id=$data["userID"];
?>
      <section class="heading">
        <?php echo"<h1>Hello ".$first." !</h1>"; ?>
      </section>
    </section>
    <section class="profile">
      <div class="row">
        <div class="fields col-lg-6">
          <ul>
            <li>
                <h3>First Name</h3>
            </li>
            <li>
                <h3>Last Name</h3>
            </li>
            <li>
                <h3>E-mail</h3>
            </li>
            <li>
                <h3>Username</h3>
            </li>
          </ul>
        </div>

        <div class="profile-values col-lg-6">
          <ul>
            <?php
              echo"<li><h3>$first</h3></li>";
              echo"<li><h3>$last</h3></li>";
              echo"<li><h3>$em</h3></li>";
              echo"<li><h3>$user</h3></li>";
             ?>
          </ul>

        </div>
      </div>

      <a href="editProfile.php"><button type="button" name="editButton" class="btn btn-outline-dark btn-lg explore-btn">Edit</button></a>
      <h2>Your uploads</h2>
      <div class="row">
      <?php

                    $sql= "SELECT fileName FROM files WHERE userID=?;";
                    $stmt =mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("location:recipie.php?error=stmt2Fail");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt, "i", $id);
                    mysqli_stmt_execute($stmt);
                    $result=mysqli_stmt_get_result($stmt);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            ?>

                                <div class="notes-box col-lg-4">
                                    <?php
                                        echo"<h3>".$row["fileName"]."</h3></a>";
                                        echo"<a href='delete.php?fileName=".$row["fileName"]."'><button type='button' name='deleteButton' class='btn btn-outline-dark btn-lg explore-btn'>Delete</button></a>";
                                    ?>
                                </div>

                            <?php
                        }
                    }
                    else
                    {
                        echo"<h2>No uploads!</h2>";
                    }
                    exit();
                ?>
      </div>
    </section>
<?php
  include_once 'footer.php'

 ?>
