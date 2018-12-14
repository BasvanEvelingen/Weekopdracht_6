 <!-- header -->
 <?php

 require_once "lib/user.php";
 require_once "lib/article.php";
 require_once "config/dbconfig.php";
 include "includes/header.php";
 include "includes/functions.php";

 use rewinkel\article\Article as Article;
 ?>
 <!-- Navigation -->
  <?php 

  include "includes/navigation.php";
  if (isset($_SESSION['user']['role']) && isset($_SESSION['user']['username'])) {
      if ($_SESSION['user']['role']=='user') {
          $userName = $_SESSION['user']['username'];
      }
      elseif ($_SESSION['user']['role']=='admin') {
          header("location: admin/pages/index.php");
      }
  }
  else {
      header("location: login.php");
  }

$msg = "voeg nieuw artikel in";

if (isset($_POST['create_article']))
{
    $name = $_POST['name'];
    $user_id = $_SESSION['user']['id'];
    $price = $_POST['price'];
    $picture = $_POST['picture'];
    $description = $_POST['description'];
    $category = "TBD";
    $article = new Article($name,$user_id,$price,$description,$picture,$category);

}

?>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <!-- begin card -->
          <div class="card mb-4">
            <h2 class="card-header">Hallo <?php echo $userName ?>, uw Rewinkel Profiel Pagina</h2>
            <div class="card-body cbody"> 
                <p class="card-text">Uw menu opties</p>  
                <p class="card-text text-success"><?php echo $msg ?></p>
                <!-- begin form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">    
                    <!-- titel -->
                        <div class="form-group">
                            <labe>Naam Artikel</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    <!-- categorieën 
                        <div class="form-group">
                            <label>Categorieën</label><br>-->
                    <?php/*
                        $cats = getCategories("all");
                        foreach ($cats as $key => $value) {
                    ?>
                            <input type="checkbox" id="<?php echo $value; ?>" name="cat_select[]" value="<?php echo $key;?>">
                            <label for="<?php $value; ?>"><?php echo $value; ?></label>
                    <?php
                            }
                    */?>  
                    <!-- Prijs  -->
                        <div class="form-group">
                        <div class="form-group">
                            <label>Prijs</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        </div>
                    <!-- afbeelding -->
                        <div class="form-group">
                            <label for="post_image">Afbeelding</label>     
                            <input class="form-control" type="file" name="picture">
                        </div>

                    <!-- inhoud -->
                        <div class="form-group">
                            <label for="post_content">Omschrijving</label>
                            <textarea class="form-control "name="description" id="" cols="30" rows="10"></textarea>
                        </div>

                    <!-- submit knop -->
                        <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="create_article" value="Artikel opslaan">
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

