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
              <div class="row">
                    <div class="col-sm-6 form-group">
                        <label><h6>Voornaam</h6></label>
                        <input type="text" name="name" id="name" tabindex="1" class="form-control">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label><h6>Achternaam</h6></label>
                        <input type="text" name="surname" id="surname" tabindex="2" class="form-control" value="">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" tabindex="3" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <label class="col-sm-12">Wachtwoord</label>
                            <input type="password" name="password" id="password2" tabindex="2" class="form-control" ">
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-sm-6">
                                <input class="form-control" type="text"/>
                            </div>
                            <div class="col-sm-12 col-sm-6">
                                <input class="form-control" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Label4</label>
                        <input class="form-control" type="text"/>
                    </div>
                </div>







            </div>
            <div class="cbody">
            <div class="form-group">
           </div>
            <div class="form-group">
            </div>
            <div class="form-group">
              <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
            </div>
            <div class="form-group">
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

