<div class="table-responsive">


    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>identyfikator</th>
            <th>autor</th>
            <th>komentarz</th>
            <th>e-mail</th>
            <th>status</th>
            <th>odpowiedz</th>
            <th>data</th>
            <th>dodaj</th>
            <th>anuluj</th>
            <th>usun</th>


        </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM comments";
        $select_comments = mysqli_query($dbconnect,$query);

        while($row = mysqli_fetch_assoc($select_comments)){
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status= $row['comment_status'];
            $comment_date = $row['comment_date'];

            echo "<tr>";
            echo "<td>{$comment_id}</td>" ;
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";


            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $select_post_id = mysqli_query($dbconnect,$query);
             while($row = mysqli_fetch_assoc($select_post_id)){
                 $post_id = $row['post_id'];
                 $post_title = $row['post_title'];

                 echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
             }
            echo "<td>{$comment_date}</td>";
            echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";

            echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
            echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>" ;
            
            echo "</tr>";

        }

        
        approveComment();

        
        unapproveComment();

        
        deleteComment();
         ?>

        </tbody>
    </table>

</div>