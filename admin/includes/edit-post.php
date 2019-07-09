<?php

if(isset($_GET['p_id'])) {

    $url_post_id = $_GET['p_id'];

}

    $query = "SELECT * FROM posts WHERE post_id = {$url_post_id}";
    $select_posts_by_id = mysqli_query($dbconnect, $query);


    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_cost = $row['post_cost'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];

    }
        confirm($select_posts_by_id);



if(isset($_POST['edit_post'])) {
    $post_title = $_POST['post_title'];
    $post_cost = $_POST['post_cost'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    
    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = {$url_post_id} ";
        $select_image = mysqli_query($dbconnect, $query);

        while ($row = mysqli_fetch_assoc($select_image)) {

            $post_image = $row['post_image'];

        }
    }


    $query = "UPDATE posts SET post_title = '{$post_title}',";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_image  = '{$post_image}', ";
    $query .= "post_tags   = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_cost   = $post_cost ";
    $query .= "WHERE post_id = {$url_post_id} ";
    $edit_post = mysqli_query($dbconnect, $query);

//    echo "\n";
//    echo $query;
//    echo "\n";
//    echo "\n";

    confirm($edit_post);


    echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$url_post_id}'>View Post </a> or <a href='posts.php'>edytuj</a></p>";


}




?>



<form  action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">dodaj tytul</label>
        <input id="post_title" type="text" class="form-control" name="post_title" value="<?php echo $post_title;?>">
    </div>

    <div class="form-group">
        <label for="post_cost">edytuj cenę</label>
        <input id="post_cost" type="text" class="form-control" name="post_cost" value="<?php echo $post_cost;?>">
    </div>

    <div class="form-group">
        <label for="post-category">kategoria</label>
        <select name="post_category" id="post-category">
            <?php

           
            $query = "SELECT * FROM categories ";
            $select_categories = mysqli_query($dbconnect,$query);

            confirm($select_categories);

            
            while($row = mysqli_fetch_assoc($select_categories)){
                $cat_id = $row['cat_id'];
                $cat_title =  $row['cat_title'];

               echo "<option value='$cat_id'>$cat_title</option>";

            }
            ?>
        </select>

    </div>

    <div class="form-group">
        <label for="post_author">dodaj autora</label>
        <input id="post_author" type="text" class="form-control" name="post_author" value="<?php echo $post_author;?>">
    </div>


    <div class="form-group">
        <label for="post_status">zmien status</label>
        <br>
        <select  name="post_status" id="post_status">
            <option value='<?php echo $post_status?>'><?php echo $post_status?></option>
            <?php

            if($post_status == 'published') {

                echo "<option value='draft'>wersja robocza</option>";

            }else{
                echo "<option value='published'>opublikowano post</option>";
            }
            ?>


        </select>
    </div>

    <div class="form-group">
        <h4>obrazek</h4>
        <img width="100px" src="../images/<?php echo $post_image?>">
    </div>

    <div class="form-group">
        <label for="post_image">nowy obrazek</label>
        <input id="post_image" type="file" class="form-control" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">dodaj tagi</label>
        <input id="post_tags" type="text" class="form-control" name="post_tags" value="<?php echo $post_tags;?>">
    </div>

    <div class="form-group">
        <label for="post_content">dodaj zawartosc</label>
        <textarea id="post_content" class="form-control" name="post_content" cols="20" rows="10"><?php echo $post_content;?></textarea>
    </div>

    <div class="form-group">
        <input  type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
    </div>


</form>
