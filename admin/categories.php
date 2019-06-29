<?php include 'includes/admin-header.php' ?>


<body>


<div id="wrapper">

    <?php include 'includes/admin-navbar.php' ?>


    <div id="page-wrapper">

        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Categories
                        <small>Author</small>
                    </h1>
                </div>


                <div class="col-md-6 col-sm-12">

                    <?php

                        insertCategories();

                    ?>

                    <form method="post">
                        <div class="form-group">
                            <label for="cat_title">Add category</label>
                            <input id="cat_title" type="text" class="form-control" name="cat_title">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add category">

                        </div>
                    </form>

                    <?php

                        if(isset($_GET['edit'])){
                            include 'includes/edit-categories.php';
                        }
                    ?>
                    
                </div>

                <div class="col-md-6 col-sm-12">

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    showAllCategoriesTable();
                                ?>

                                 <?php
                                    deleteCategory();
                                ?>

                                </tbody>

                            </table>

                </div>




            </div>
        </div>
    </div>

</div>

<?php include 'includes/admin-footer.php' ?>

</body>

</html>