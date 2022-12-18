<?php
include_once 'header.php'
?>
      <section class="heading">
        <h1>Upload</h1>
      </section>
    </section>

    <form class="form" action="upload.inc.php" method="post" enctype="multipart/form-data">

      <label for="file">Document</label>
      <input type="file" name="file" id="file">

      <label for="file-name">File Name</label>
      <input type="text" name="file-name" id="file-name">

      <label for="course">Course</label>
      <input type="text" name="course" id="course">

      <label for="desc">Document description</label>
      <textarea name="desc" id="desc" rows="8" cols="80"></textarea>

      <button type="submit" name="submitUpload" class="btn btn-outline-dark btn-lg explore-btn">Upload</button>

    </form>



<?php
    include_once 'footer.php'
?>
