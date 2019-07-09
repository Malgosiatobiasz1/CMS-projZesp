<?php
selectAll("posts"); ?>

<div>
    <style>
        a.product {
            color: black !important;
            text-decoration: none !important;
        }

        div.product {
            background-position: center;
            background-color: transparent;
            background-size: 100% auto;
            width: 100%;
            height: 100%;
            min-height: 175px;
            color: transparent;
        }

        a.product div.product .prod {
            width: 100%;
            height: 100%;
            min-height: 175px;
            padding: 10px;
            position: relative;
        }

        a.product:hover div.product .prod,
        a.product:focus div.product .prod {
            color: black;
            background-color: rgba(255, 255, 255, .75);
            -webkit-transition: all ease-in-out .5s;
            -moz-transition: all ease-in-out .5s;
            -ms-transition: all ease-in-out .5s;
            -o-transition: all ease-in-out .5s;
            transition: all ease-in-out .5s;
        }

        .xyz .btn {
            width: 100%;
            margin: 10px 0 25px;
        }
    </style> <?php

while ($row = mysqli_fetch_assoc($result_query)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = substr($row['post_content'], 0, 100);
    $post_status = $row['post_status'];
    $post_cost = $row['post_cost'];

    if ($post_status == 'published') { ?>
        <div class="col-sm-6 col-lg-4 xyz">
            <form method="post" action="cartActions.php">
                <a class="product" href="post.php?p_id=<?php echo "{$post_id}" ?>">
                    <div class="product" style='background-image: url("images/<?php echo $post_image ?>")'>
                        <div class="prod">
                            <p><?php echo $post_title; ?></p>
                            <p><?php echo $post_content; ?></p>

                            <div style="position: absolute; bottom: 10px; width: calc(100% - 20px);">
                                <div style="float: left"><?php echo $post_cost ?> zł</div>
                                <div style="float: right"><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></div>
                                <div style="clear: both"></div>
                            </div>
                        </div>
                    </div>
                </a>

                <input name="id" value="<?php echo "{$post_id}" ?>" style="display: none"/>
                <button class="btn btn-primary" type="submit" name="add">+ Dodaj do koszyka</button>
            </form>
        </div>
    <?php }
} ?>

</div>