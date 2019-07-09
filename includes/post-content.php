<?php

    

    if(isset($_GET['p_id'])){

        $url_post_id = $_GET['p_id'];
    
    }


    $query = "SELECT * FROM posts WHERE post_id = $url_post_id";
    $all_posts_query = mysqli_query($dbconnect,$query);

    while($row = mysqli_fetch_assoc($all_posts_query)){
        $post_id = $row['post_id'];
        $post_title =  $row['post_title'];
        $post_author = $row['post_author'];
        $post_date =   $row['post_date'];
        $post_image =  $row['post_image'];
        $post_content =  $row['post_content'];
        $post_cost =  $row['post_cost'];



        ?>


        <form method="post" action="cartActions.php">
            <h2>
                <a href="post.php?p_id=<?php echo "{$post_id}"?>"><?php echo $post_title;?></a>
            </h2>
            <!--<p class="lead">-->
            <!--    by <a href="index.php">--><?php //echo $post_author;?><!--</a>-->
            <!--</p>-->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date;?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
            <hr>
            <p><?php echo $post_content;?></p>

            <?php echo $post_cost?> zł

            <hr>
            <input name="id" value="<?php echo "{$post_id}"?>" style="display: none"/>
            <button type="submit" name="add">+</button>
        </form>

<?php } 