<?php
include_once 'header.php'
?>
      <section class="heading">
        <h1>Contact us</h1>
      </section>
    </section>
    <section class="contact">
      <div class="row">

        <div class="address col-lg-6">
          <i class="fa-solid fa-address-book fa-2x"></i>
          <h2>Our contact details</h2>
          <p>Address</p>
          <p>0987654321</p>
          <p>temp@email.com</p>
        </div>

        <div class="message col-lg-6">
          <i class="fa-solid fa-envelope fa-2x"></i>
          <h2>Leave us a message</h2>
          <form action="index.html" method="post">
            <label>Your name:</label>
            <input type="text" name="name" value=""><br>
            <label>Email ID:</label>
            <input type="text" name="email" value=""><br>
            <label>Your message:</label><br>
            <textarea name="message" rows="8" cols="30"></textarea><br>
            <button type="submit" name="submitFeedback" class="btn btn-outline-dark btn-lg explore-btn">Submit</button>
          </form>
        </div>

      </div>

    </section>
<?php
include_once 'footer.php'
?>
