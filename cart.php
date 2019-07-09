<?php
global $dbconnect;

//$_SESSION["cart"] = null;

if (isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"]; ?>

    <style>
        #cart {
            position: sticky;
            top: 75px;
        }
    </style>

    <div id="cart">
        <div class="well">
            <h4>Koszyk</h4>

            <div class="row">
                <?php
                $i = 0;
                $sum = 0;

                foreach ($cart as $productId) {
                    $product = mysqli_query($dbconnect, "SELECT * FROM posts WHERE post_id LIKE $productId");

                    while ($row = mysqli_fetch_assoc($product)) { ?>
                        <div class="col-sm-6" style=" position: relative">
                            <a href="post.php?p_id=<?php echo $row['post_id'] ?>">
                                <div style="display: inline-block;"><?php echo $row['post_title']; ?></div>

                                <form method="post" action="cartActions.php" style="width: calc(100% - 32px);">
                                    <input style="display: none" name="key" value="<?php echo $i ?>"/>
                                    <button type="submit" name="remove" class="btn btn-danger"
                                            style="padding: 3px 6px; font-size: 8px; position: absolute; top: 0; right: 10px;">
                                        X
                                    </button>
                                </form>

                                <img class="img-responsive" src="images/<?php echo $row['post_image'] ?>" alt="">

                                <?php echo $row['post_cost'];
                                $sum += ($row['post_cost']); ?> zł
                            </a>
                        </div>
                    <?php }
                    $i++;
                } ?>
            </div>

            <hr/>
            <?php
            if (!empty($cart)) { ?>
                <form method="post" action="cartActions.php" style="position: relative; width: 100%; margin-top: 25px">
                    <button type="submit" name="buy" class="btn btn-success">BUY</button>
                    sum : <?php echo $sum; ?> zł
                    <button type="submit" name="clear" class="btn btn-warning right"
                            style="right: 0; position: absolute;">
                        Clear cart
                    </button>
                </form>
            <?php } ?>
        </div>
    </div>
    <?php
}