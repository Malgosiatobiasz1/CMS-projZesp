<?php
global $dbconnect;

//$_SESSION["card"] = null;

if(isset($_SESSION["card"])) {
    $card = $_SESSION["card"]; ?>

   <style>
        #card {
            max-width: 150px;
            position: fixed;
            top: 60px;
            right: 0;
            background-color:transparent;
            overflow:hidden;			
        }
    </style>

    <div id="card">
	<p><b>Koszyk</b></p>

    <?php
    $i = 0;
    $sum = 0;

    foreach ($card as $productId) {
        $product = mysqli_query($dbconnect, "SELECT * FROM posts WHERE post_id LIKE $productId");

        while ($row = mysqli_fetch_assoc($product)) { ?>
                <div class="card-element">
                    <p>
                        <a href="post.php?p_id=<?php echo $row['post_id']?>"><?php echo $row['post_title'];?></a>
                    </p>

                    <form method="post" action="cardActions.php">
                        <input style="display: none" name="key" value="<?php echo $i?>"/>
                        <button type="submit" name="remove">X</button>
                    </form>

                    <img class="img-responsive" src="images/<?php echo $row['post_image']?>" alt="">
                    <hr>
                    <p><?php echo $row['post_content'];?></p>

                    <?php echo $row['post_cost']; $sum += ($row['post_cost']);?> zł
                </div>
        <?php }
        $i++;
    }
    if (!empty($card)) {?>
        <form method="post" action="cardActions.php">
            <button type="submit" name="buy">BUY</button> sum : <?php echo $sum; ?> zł
            <button type="submit" name="clear">Clear card</button>
        </form>
        <?php } ?>
    </div>
    <?php
}