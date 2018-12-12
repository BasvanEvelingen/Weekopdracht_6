 <!-- header -->
 <?php
 include "includes/header.php";
 ?>
 
 <!-- Navigation -->
  <?php 
  include "includes/navigation.php";
  ?>


    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="images/MarketPlace.jpg" alt="Card image cap">
            <div class="card-body cbody">
              <h2 class="card-title">Registratie</h2>
              <p class="card-text">Vul de gegevens in en druk op registreer.</p>
            </div>
            <div class="cbody">
            <div class="form-group">
              <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="First name" value="">
            </div>
            <div class="form-group">
              <input type="text" name="surname" id="surname" tabindex="1" class="form-control" placeholder="Last name" value="">
            </div>
            <div class="form-group">
              <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
            </div>
            <div class="form-group">
              <input type="password" name="password" id="password2" tabindex="2" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <input type="button" name="register-submit" id="register-submit" tabindex="4" class="btn btn-warning" value="Registreer">
                </div>
              </div>
            </div>
            </div>
            <div class="card-footer text-muted">
            </div>
          </div>

        

        </div>

 <!-- Sidebar Widgets Column -->
<?php 
include "includes/sidebar.php";
?>

  
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

