<?php include 'includes/admin-header.php' ?>


<body>


<div id="wrapper">

    <?php include 'includes/admin-navbar.php' ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];

                        }else{
                            $source = '';
                        }
                        if($source== ""){
                            echo "Produkty";
                        }else if($source=='add-post'){
                            echo "Dodaj produkty";
                        }else if($source=='edit-post'){
                            echo "Edytuj produkty";
                        }

                        ?>
<!--                        <small>Author</small>-->
                    </h1>
                    <?php

                    switch ($source){
                        case 'add-post';
                            include 'includes/add-post.php';
                            break;

                        case 'edit-post';
                            include 'includes/edit-post.php';
                            break;

                        default:
                            include 'includes/view-all-posts.php';
                            break;
                    }


                    ?>

                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'includes/admin-footer.php' ?>

</body>

</html>