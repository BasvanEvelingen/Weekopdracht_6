
<?php
// TODO: functies uit het blogproject aanpassen naar class model;

function insertCategories() {

    global $connection;

    if (isset($_POST['addsubmit'])) {
        $cat_title = $_POST['cat_name'];
        if (empty($cat_name)) {
            echo "Vul categorie in alstublieft.";
        } else {
            $query = "INSERT INTO category (name) VALUES ('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);
            confirmQuery($create_category_query);
        }
    }
}

function findAllCategories() {

    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);
    confirmQuery($select_categories);
    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['id'];
        $cat_title =  $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}' title='Verwijder Categorie' data-toggle='tooltip'><i class='far fa-trash-alt'></i></a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}' title='Wijzig Categorie' data-toggle='tooltip'><i class='far fa-edit'></i></a></td>";    
        echo "</tr>";
    }
}

function deleteCategories() {

    global $connection;

    if (isset($_GET['delete'])) {
        $del_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE id= {$del_cat_id}";
        $delete_query = mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("location: categories.php");
    }
}

function getCategories($post_id) {

    global $connection;
    
    $categories = [];

    if ($post_id=="all") {
        $query = "SELECT * FROM categories";
    } else {
        $query = "SELECT c.cat_title FROM post_category pc JOIN posts p ON pc.post_id = p.id JOIN categories c ON pc.cat_id = c.id WHERE p.id = '$post_id'";
    }
    $select_categories_query = mysqli_query($connection,$query);
    if ($select_categories_query) {
        while ($row = mysqli_fetch_assoc($select_categories_query)) {
            array_push($categories , $row['cat_title']);
        }
        return $categories;
    } else {
       confirmQuery($select_categories_query);
    } 
}

function confirmQuery($result) {
    global $connection;
    if (!$result) {
        die("Query mislukt" . mysqli_error($connection));
    }
}

function deleteCategoriesReference($post_id) {

    global $connection;

    $query = "DELETE FROM post_category where post_id = {$post_id}";
    $delete_query = mysqli_query($connection, $query);
    confirmQuery($delete_query);
}
