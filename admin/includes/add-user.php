<?php
if(isset($_POST['create_user'])){

    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_role = $_POST['user_role'];
    $username= $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password= $_POST['user_password'];

    $query = "INSERT INTO users(user_first_name,
              user_last_name,
              user_role,
              username,
              user_email,
              user_password) ";
    //values to add
    $query .= "VALUES('{$user_first_name}',
              '{$user_last_name}',
              '{$user_role}',
              '{$username}',
              '{$user_email}',
              '{$user_password}')";


    $create_user_query = mysqli_query($dbconnect,$query);

    confirm($create_user_query);

echo "User Created:" ." "."<a href='users.php'>View all users</a>";

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_first_name">First Name</label>
        <input id="user_first_name" type="text" class="form-control" name="user_first_name">
    </div>


    <div class="form-group">
        <label for="user_last_name">Last Name</label>
        <input id="user_last_name" type="text" class="form-control" name="user_last_name">
    </div>

    <div class="form-group">
        <label for="user_role">User Role </label>
        <div>
            <select name="user_role" id="user_role">
                <option value="subscriber">Select Options</option>
                <option value="admin">admin</option>
                <option value="subscriber">subscriber</option>

            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input id="username" type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input id="user_email" type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input id="user_password" type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Create user">
    </div>


</form>
