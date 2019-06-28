<?php
if(isset($_POST['create_post'])){

    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id= $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image= $_FILES['post_image']['name'];
    $post_image_temp= $_FILES['post_image']['tmp_name'];

    $post_tags= $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');


    move_uploaded_file($post_image_temp,"../images/$post_image");

    
    $query = "INSERT INTO posts(post_category_id, 
              post_title, 
              post_author,
              post_date, 
              post_image, 
              post_content, 
              post_tags,  
              post_status)" ;
   
    $query .= "VALUES('{$post_category_id}',
              '{$post_title}',
              '{$post_author}',
                now(),
              '{$post_image}',
              '{$post_content}',
              '{$post_tags}',
              '{$post_status}')";


    $create_post_query = mysqli_query($dbconnect,$query);

    
    confirm($create_post_query);

    
    $url_post_id= mysqli_insert_id($dbconnect);

    echo "<p class='bg-success'>Post Added. <a href='../post.php?p_id={$url_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";


}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post title</label>
        <input id="post_title" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_category">kategoria</label>
        <div>
            <select name="post_category" id="post_category">
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
    </div>

    <div class="form-group">
        <label for="post_author">zmien status</label>
        <input id="post_author" type="text" class="form-control" name="post_author">
    </div>
    
    <div class="form-group">
        <label for="post_status">status postu</label>
        <div>
            <select name="post_status" id="post_status">
                <option value='draft'>wybierz</option>;
                <option value='published'>publikuj</option>;
                <option value='draft'>zachowaj wersje robocza</option>;
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="post_image">udostepnij obraz</label>
        <input id="post_image" type="file" class="form-control" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">dodaj tagi</label>
        <input id="post_tags" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">dodaj zawartosc</label>
        <textarea id="post_content" class="form-control" name="post_content" cols="20" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish">
    </div>


</form>