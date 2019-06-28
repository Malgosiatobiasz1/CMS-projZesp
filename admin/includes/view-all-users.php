<div class="table-responsive">


    <table class="table table-bordered table-hover">

       

        <thead>
        <tr>
            <th>identyfikator</th>
            <th>nazwa uzytkownika</th>
            <th>imie</th>
            <th>nazwisko</th>
            <th>e-mail</th>
            <th>uprawnienia</th>




        </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM users";
        $select_users = mysqli_query($dbconnect,$query);

        while($row = mysqli_fetch_assoc($select_users)):
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_first_name = $row['user_first_name'];
            $user_last_name = $row['user_last_name'];
            $user_email = $row['user_email'];
            $user_image= $row['user_image'];
            $user_role = $row['user_role'];
            $randSalt = $row['randSalt'];

            echo "<tr>";
            echo "<td>{$user_id}</td>" ;
            echo "<td>{$username}</td>";
            echo "<td>{$user_first_name}</td>";
            echo "<td>{$user_last_name}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_role}</td>";



            echo "<td><a href='users.php?source=edit-user&edit-user={$user_id}'>Edit</a></td>";
            echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";

            echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
            echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>" ;

            
            echo "</tr>";

        endwhile;

        deleteUser();

        
        changeToAdmin();

        
        changeToSubscriber();


         ?>

        </tbody>
    </table>

</div>