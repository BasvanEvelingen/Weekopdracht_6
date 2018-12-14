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
  if (isset($_SESSION['role']) && isset($_SESSION['username'])) {
      if ($_SESSION['role']=='user') {
          $userName = $_SESSION['username'];
      }
      elseif ($_SESSION['role']=='admin') {
          header("location: admin/pages/index.php");
      }
  }
  else {
      header("location: login.php");
  }


  

$msg = "u kunt nu artikelen aanbieden";
$userName = "";

?>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <!-- begin card -->
          <div class="card mb-4">
            <h2 class="card-header">Hallo<?php echo $userName ?>, Rewinkel Profiel Pagina</h2>
            <div class="card-body cbody"> 
                <p class="card-text">Uw menu opties</p>  
                <p class="card-text text-success"><?php echo $msg ?></p>
                <!-- begin form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <input type="submit" id="submit_post_article" name="submit_post_article" class="btn btn-success" value="Artikel aanbieden"/>
                        </div>
                        <div class="col">
                            <input type="submit" id="submit_view_articles" name="submit_view_articles" class="btn btn-info" value="Mijn artikelen bekijken"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                    </div>
                
                    <div class="card-footer text-muted">
                        <small class="text-black"></small>
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

