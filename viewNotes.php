<?php
include_once 'header.php';
require_once 'database.php';
require_once 'functions.inc.php';
?>
      <section class="heading">
        <?php
          $fname=$_GET['fileName'];
          echo"<h1>".$fname."</h1>";
        ?>
      </section>
    </section>

<?php
    $sql= "SELECT * FROM files WHERE fileName=?;";
    $stmt =mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location:notes.php?error=stmtFail");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $fname);
    mysqli_stmt_execute($stmt);
    $resultData=mysqli_stmt_get_result($stmt);
    $result=mysqli_fetch_assoc($resultData);
    $fileID=$result['fileID'];
?>

<section class="notes-box">
  <div class="row">
    <div class="col-lg-6">
      <?php echo"<iframe src='uploads/".$result['fileName'].".pdf' width='100%' height='750px'></iframe>"; ?>
    </div>

    <div class="details-box col-lg-6">
      <?php echo"<h2>".$result['fileName']."</h2><h3>Course-".$result['fileSub']." </h3><p>".$result['fileDesc']." </p>";?>

      <br>

      <section class="show-review-box">
        <?php
            $review="SELECT AVG(stars) FROM ratings where fileID=?;";
            $stmt =mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt,$review))
            {
                header("location:notes.php?error=stmtFail");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "i", $result['fileID']);
            mysqli_stmt_execute($stmt);
            $starData=mysqli_stmt_get_result($stmt);
            $star=mysqli_fetch_array($starData);
            $star=$star['AVG(stars)'];
            if($star===NULL)
            {
              echo "<h2>Users have not given this document a review</h2>";
            }
            else
            {
              echo "<h2>Users have given this document a rating of ".$star." stars!</h2>";
            }

         ?>

      </section>
      <?php
      if(isset($_SESSION["userUID"]))
      {
        ?>
        <section class="get-review-box">
          <h2>Give us your rating!</h2>
          <form class="form" action="ratings.inc.php" method="post">
            <input type="hidden" name="fileID" id="fileID" value="<?php echo $fileID; ?>">
            <input type="hidden" name="uid" id="uid" value="<?php echo $_SESSION["userID"]; ?>">
            <label for="review" class="form-label">Review</label>
            <input type="text" name="review" id="review" required>

            <br>
            <label for="stars" class="form-label">Stars</label>
            <select id="stars" name="stars">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>

            </select>
            <br>
            <button type="submit" name="submitReview" class="btn btn-outline-dark btn-lg explore-btn">Submit</button>
          </form>

        </section>
        <?php
      }
      ?>


    </div>
  </div>


</section>

<?php
include_once 'footer.php';

 ?>
