<?php
include_once 'header.php'
?>
      <section class="heading">
        <h1>Notes</h1>
      </section>
    </section>

    <?php
        require_once 'database.php';
        require_once 'functions.inc.php';
        $sql= "SELECT users.userFName, files.fileName, files.fileSub FROM users INNER JOIN files ON files.userID=users.userID;";
        $stmt =mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location:notes.php?error=stmtFail");
            exit();
        }
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if($result->num_rows>0)
        {
            echo"<div class='notes row'>";
            while($row=$result->fetch_assoc())
            {
              echo"<div class='notes-box col-lg-4'><a href=viewNotes.php?fileName=".$row["fileName"]."><h2>".$row["fileName"]."</h2></a><p>-By ".$row["userFName"]."</p></div>";
            }
            echo"</div>";
        }
        else
        {
            echo"<h1>No notes available :(</h1>";
        }

    include_once 'footer.php'
?>
