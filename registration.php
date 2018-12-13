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

$password = "";
$name_error = "";
$surname_error = "";
$username_error = "";
$email_error = "";
$password_error = "";
$confirm_password_error = "";
$msg = "";

 if (isset($_POST['submit'])) {

    if (empty($_POST['name'])) { $name_error = "vul naam alstublieft in.";}
    if (empty($_POST['surname'])) { $surname_error = "vul achternaam alstublieft in.";}
    if (empty($_POST['username'])) { $username_error = "vul gebruikersnaam alstublieft in.";}
    if (empty($_POST['email'])) { $email_error = "vul email alstublieft in.";}

      // Wachtwoord controleren
      if (empty(trim($_POST["password"]))) {
        $password_error = "Vul uw wachtwoord in.";     
    } elseif(strlen(trim($_POST["password"])) < 6) {
        $password_error = "Wachtwoord moet minimaal 6 karakters bevatten.";
    } else {
        $password = trim($_POST["password"]);
    }
    // Valideer of wachtwoord correspondeert met eerdere ingegeven wachtwoord.
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_error = "Bevestig uw wachtwoord.";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_error) && ($password != $confirm_password)) {
            $confirm_password_error = "Wachtwoorden komen niet overeen.";
        }
    }
    
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, $password, FILTER_DEFAULT);

    
    if($user->registration($name, $surname, $username, $email, $password)) {
        echo "<h1>HIER?</h1>";
        $msg = "Registratie gelukt";
        $_SESSION['message']= "U kunt nu inloggen.";
        header("location: login.php");
    }

 }

  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <!-- begin card -->
          <div class="card mb-4">
            <h2 class="card-header">Registratie</h2>
            <div class="card-body cbody"> 
                <p class="card-text">Vul uw gegevens in en druk op registreer.</p>  
                <p class="card-text text-danger"><?php echo $msg ?></p>
                <!-- begin form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Voornaam</label>
                            <input type="text" name="name" id="name" tabindex="1" class="form-control">
                            <span class="form-text text-danger"><?php echo $name_error;?></span>
                        </div>
                        <div class="col">
                            <label for="surname">Achternaam</label>
                            <input type="text" name="surname" id="surname" tabindex="2" class="form-control">
                            <span class="form-text text-danger"><?php echo $surname_error;?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" tabindex="3" class="form-control">
                            <span class="form-text text-danger"><?php echo $email_error;?></span>
                        </div>
                        <div class="col">
                            <label for="username">Gebruikersnaam</label>
                            <input type="text" name="username" id="username" tabindex="4" class="form-control">
                            <span class="form-text text-danger"><?php echo $username_error;?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="password">Wachtwoord</label>
                            <input type="password" name="password" id="password" tabindex="5" class="form-control">
                            <span class="form-text text-danger"><?php echo $password_error;?></span>
                        </div>
                        <div class="col">
                            <label for="confirm_password">Bevestig wachtwoord</label>
                            <input type="password" name="confirm_password" id="confirm_password" tabindex="6" class="form-control">
                            <span class="form-text text-danger"><?php echo $confirm_password_error;?></span>
                        </div>
                    </div>
                
                    <div class="card-footer text-muted">
                        <div class="form-row">
                            <input type="submit" name="submit" tabindex="7" class="btn btn-warning btn_submit btn-sm" value="Registreer">
                        </div>
                        <small class="text-black">email adres wordt gebruikt om in te loggen</small>
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

