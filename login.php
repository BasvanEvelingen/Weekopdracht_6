 <!-- header -->
 <?php
 require_once "lib/user.php";
 require_once "config/dbconfig.php";
 include "includes/header.php";
 include "includes/functions.php";
 ?>
 <!-- Navigation -->
  <?php 
  include "includes/navigation.php";

$email = "";
$password = "";
$email_error = "";
$password_error = "";
$msg = "";

 if (isset($_POST['submit'])) {

    // email niet leeg?
    if (empty($_POST['email'])) { 
        $email_error = "vul uw email alstublieft in.";
    } else {
        $email = $_POST['email'];
    }
    // wachtwoord niet leeg?
    if (empty(trim($_POST['password']))) {
        $password_error = "Vul uw wachtwoord in.";     
    } else {
        $password = $_POST['password'];
    }

    //wanneer allebei niet leeg filter toepassen
    if (empty($email_error) && empty($password_error)) {
        $email = filter_input(INPUT_POST, $email, FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, $password, FILTER_DEFAULT);

        echo "na filter: ". $email;
        exit();
        /*
        if (!$email) {
            $email_error="email niet goed ingevuld.";
        }
        if (!$password) {
            $password_error="wachtwoord niet correct ingevuld";
          
        }
        */
    }

    if($user->login($email,$password)) {
        var_dump("gelukt!!!!!!");
        exit();
        $msg = "Inloggen gelukt";
        $_SESSION['message']= "U kunt nu naar MijnRewinkel.";
        header("location: index.php");     
    }





 }

  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <!-- begin card -->
          <div class="card mb-4">
            <h2 class="card-header">Login</h2>
            <div class="card-body cbody"> 
                <p class="card-text">Vul uw gegevens in en druk op inloggen.</p>  
                <p class="card-text text-danger"><?php echo $msg ?></p>
                <!-- begin form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">   
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" tabindex="3" class="form-control">
                        <span class="form-text text-danger"><?php echo $email_error;?></span>
                    </div>
                    <div class="form-group">   
                        <label for="password">Wachtwoord</label>
                        <input type="password" name="password" id="password" tabindex="5" class="form-control">
                        <span class="form-text text-danger"><?php echo $password_error;?></span>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="form-row">
                            <input type="submit" name="submit" tabindex="3" class="btn btn-warning btn_submit btn-sm" value="Inloggen">
                        </div>
                        <small class="form-text text-black">nog niet geregistreerd?, klik <a href="registration.php" class="font-weight-bold text-warning">hier</a> om u te registreren.</small>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /.col-8  -->
 <!-- Sidebar Widgets Column -->
<?php 
include "includes/sidebar.php";
?>

        
      </div>  <!-- /.row -->
    </div>  <!-- /.container -->
   
<?php 
include "includes/footer.php";
?>

