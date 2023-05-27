<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response To</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>

    </tr>
</thead>  

<tbody>

    <?php
        $query = "select * from posts";
        $select_comments = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_comments)) {
            $commend_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];

            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            
            echo "<td>{$comment_status}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_date}</td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$comment_id}'>Approve</a></td>";
            echo "<td><a href='posts.php?delete={$comment_id}'>Unapprove</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$comment_id}'>Edit</a></td>";
            echo "<td><a href='posts.php?delete={$comment_id}'>Delete</a></td>";
            echo "</tr>";

            $query = "select * from categories where cat_id = {$post_category_id}";
            $select_categories_id = mysqli_query($connection, $query);
            
            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<td>{$cat_title}</td>";

            }
        }
    ?>

</tbody>

</table>


<?php
    if (isset($_GET["delete"])) {
        $the_post_id = $_GET["delete"];

        $query = "delete from posts where post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);
    }


?>