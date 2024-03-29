<?php

function confirm($query){
    global $dbconnect;
    if(!$query){
        die("Query failed ".mysqli_error($dbconnect));
    }

}

function insertCategories(){
    global $dbconnect;

    if(isset($_POST['submit'])){
        $cat_title= $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
            echo "This field should not be empty";
        }else{

            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUES ('$cat_title') ";

            $create_category_query = mysqli_query($dbconnect,$query);
            if(!$create_category_query){
                die("Query failed".mysqli_error($dbconnect));
            }

        }
    }

}


function showAllCategoriesTable(){
    global $dbconnect;
    
    //All categories from db
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($dbconnect,$query);

    while($row = mysqli_fetch_assoc($select_categories)){
        $cat_id = $row['cat_id'];
        $cat_title =  $row['cat_title'];

        echo "<tr>
                 <td>{$cat_id}</td>
                 <td>{$cat_title}</td>
                 <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                 <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
              </tr>";
    }
    
}

function deleteCategory(){
    global $dbconnect;
    
    if(isset($_GET['delete'])) {
        $url_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories ";
        $query .= "WHERE cat_id = {$url_cat_id} ";
        $delete_query = mysqli_query($dbconnect, $query);

        header("Location: categories.php");
    }
}


function editProfile(){
    global $dbconnect;
    global $session_username;

    if(isset($_POST['edit_user'])) {
        $user_first_name = $_POST['user_first_name'];
        $user_last_name = $_POST['user_last_name'];
        $user_role = $_POST['user_role'];
        $session_username = $_POST['username'];

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];


        $query = "UPDATE users 
              SET user_first_name = '{$user_first_name}',
                  user_last_name = '{$user_last_name}',
                  user_role = '{$user_role}',
                  username = '{$session_username}',
                  user_email  = '{$user_email}',
                  user_password   = '{$user_password}'
                  WHERE username = '{$session_username}'
               
               ";
        $edit_user = mysqli_query($dbconnect, $query);

        confirm($edit_user);

        header("Location: users.php");

    }
}





function deletePost(){
    global $dbconnect;

    if(isset($_GET['delete'])){
        $url_post_id = $_GET['delete'];
        $query = "DELETE FROM posts ";
        $query .= "WHERE post_id = {$url_post_id} ";
        $delete_query = mysqli_query($dbconnect, $query);

        header("Location: posts.php");
    }


}


function deleteComment(){
    global $dbconnect;

    if(isset($_GET['delete'])){
        $url_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments ";
        $query .= "WHERE comment_id = {$url_comment_id} ";
        $delete_query = mysqli_query($dbconnect, $query);

        header("Location: comments.php");
    }


}

function changeToAdmin(){
    global $dbconnect;

    if(isset($_GET['change_to_admin'])){
        $url_user_id = $_GET['change_to_admin'];
        $query = "UPDATE users SET user_role = 'admin' ";
        $query .= "WHERE user_id = {$url_user_id} ";
        $user_admin_query = mysqli_query($dbconnect, $query);

        header("Location: users.php");
    }

}

function changeToSubscriber(){
    global $dbconnect;

    if(isset($_GET['change_to_subscriber'])){
        $url_user_id = $_GET['change_to_subscriber'];
        $query = "UPDATE users SET user_role = 'subscriber' ";
        $query .= "WHERE user_id = {$url_user_id}";
        $user_subscriber_query = mysqli_query($dbconnect, $query);

        header("Location: users.php");
    }

}



function deleteUser(){
    global $dbconnect;

    if(isset($_GET['delete'])){
        $url_user_id = $_GET['delete'];
        $query = "DELETE FROM users ";
        $query .= "WHERE user_id = {$url_user_id} ";
        $delete_query = mysqli_query($dbconnect, $query);

        header("Location: users.php");
    }


}

function unapproveComment(){
    global $dbconnect;

    if(isset($_GET['unapprove'])){
        $url_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' ";
        $query .= "WHERE comment_id = {$url_comment_id}";
        $unapprove_comment_query = mysqli_query($dbconnect, $query);

        header("Location: comments.php");
    }
    
}

function approveComment(){
    global $dbconnect;

    if(isset($_GET['approve'])){
        $url_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' ";
        $query .= "WHERE comment_id = {$url_comment_id}";
        $unapprove_comment_query = mysqli_query($dbconnect, $query);

        header("Location: comments.php");
    }

}

function selectAll($whatTable){
    global $dbconnect;
    global $result_query;

    $query = "SELECT * FROM $whatTable";
    $result_query = mysqli_query($dbconnect,$query);

    
}






?>