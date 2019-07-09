<?php

if(isset($_POST['checkBoxArray'])){

    $checkBoxArray = $_POST['checkBoxArray'];

  foreach ($checkBoxArray as $postIdValue){

      $bulk_options = $_POST['bulk_options'];


      
      switch ($bulk_options){
          case 'published':

              $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id= {$postIdValue}";
              $update_to_publish_status = mysqli_query($dbconnect,$query);
              confirm($update_to_publish_status);

              break;

          case 'draft':

              $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id= {$postIdValue}";
              $update_to_draft_status = mysqli_query($dbconnect,$query);
              confirm($update_to_draft_status);

              break;

          case 'delete':

              $query = "DELETE FROM posts WHERE post_id= {$postIdValue}";
              $delete_post = mysqli_query($dbconnect,$query);
              confirm($delete_post);

              break;

      }

  }

}

?>


<div class="table-responsive ">

<form action="" method="post">
<table class="table table-bordered table-hover">

    <div class="bulkContainer col-md-12">
        <div id="bulkOptionContainer" class="col-xs-12 col-md-4 col-lg-4">
            <select class="form-control" name="bulk_options">
                <option value="">Wybierz</option>
                <option value="published">Opublikuj</option>
                <option value="draft">Zachowaj wersję roboczą</option>
                <option value="delete">Usuń</option>
            </select>
        </div>

        <div id="" class="col-xs-12 col-md-4 col-lg-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add-post">Dodaj nowy post</a>

        </div>
    </div>


    <thead>
    <tr>
        <th><input id="selectAllBoxes" type="checkbox"></th>
        <th>identyfikator</th>
        <th>autor</th>
        <th>tytul</th>
        <th>cena</th>
        <th>kategoria</th>
        <th>status</th>
        <th>obraz</th>
        <th>tagi</th>
        <th>komentarze</th>
        <th>data</th>
        <th>podglad</th>
        <th>edytuj</th>
        <th>usun</th>
    </tr>
    </thead>
    <tbody>
    <?php
    selectAll("posts");

    while($row = mysqli_fetch_assoc($result_query)){
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_cost = $row['post_cost'];
        $post_category_id= $row['post_category_id'];
        $post_status= $row['post_status'];
        $post_image= $row['post_image'];
        $post_tags= $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];


            echo "<tr>";
            ?>


            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $post_id ?>"></td>

            <?php

            echo "<td>{$post_id}</td>" ;
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$post_cost}zł</td>";


                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                $select_categories_id = mysqli_query($dbconnect,$query);

                while($row = mysqli_fetch_assoc($select_categories_id)){
                $cat_id = $row['cat_id'];
                $cat_title =  $row['cat_title'];



                }
                 echo "<td> {$cat_title} </td>";
            echo "<td>{$post_status}</td>";
            echo"<td><img width='100px' src='../images/$post_image'></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";


            echo "<td><a href='../../post.php?p_id={$post_id}'>View post</a></td>";

            
            echo "<td><a href='posts.php?source=edit-post&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a onclick=\"javascript: return confirm('Delete?')\" href='posts.php?delete={$post_id}'>Delete</a></td>" ;
            echo "</tr>";

     }

     deletePost(); ?>

    </tbody>
</table>
</form>
</div>