<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Sklep internetowy</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">




                <?php

              
                $query = "SELECT * FROM categories";
                $all_categories_query = mysqli_query($dbconnect,$query);

                while($row = mysqli_fetch_assoc($all_categories_query)){
                  $cat_id=   $row['cat_id'];
                  $cat_title =  $row['cat_title'];

                    echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";

                }

                ?>
                <li><a href='admin'>Admin</a></li>
                <li><a href='registration.php'>Rejestracja</a></li>

                <?php

                if(isset($_SESSION['username'])){

                    if(isset($_GET['p_id'])){

                        $url_post_id = $_GET['p_id'];

                        echo "<li><a href='admin/posts.php?source=edit_post&p_id={$url_post_id}'>Edit Post</a></li>";

                    }

                }

                ?>



            </ul>
        </div>
        
    </div>
    
</nav>
