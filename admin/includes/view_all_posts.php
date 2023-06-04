<?php
if (isset($_POST["checkBoxArray"])) {
    foreach(($_POST["checkBoxArray"]) as $postValueId) {

        $bulk_options = $_POST["bulk_options"];

        switch ($bulk_options) {
            case "published":
                $query = "update posts set post_status = '{$bulk_options}' where
                post_id = {$postValueId}";

                $update_to_published_status = mysqli_query($connection, $query);
                confirmQuery($update_to_published_status);
                break;
            case "draft":
                $query = "update posts set post_status = '{$bulk_options}' where
                post_id = {$postValueId}";

                $update_to_draft_status = mysqli_query($connection, $query);
                confirmQuery($update_to_draft_status);
                break;

            case "delete":
                $query = "delete * from posts set where post_id = {$postValueId}";

                $update_to_delete_status = mysqli_query($connection, $query);
                confirmQuery($update_to_delete_status);
                break;
        
        }

    }
}

?>


<form action="" method="post">

<table class="table table-bordered table-hover">
    <div id="bulkOptionsContainer" class="col-xs-4">
        <select class="form-control" id="" name="bulk_options">

        <option value="form-control">Select option</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>

        </select>

    </div>

    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply"></input>

        <a class="btn btn-primary" href="posts.php?source=add_post">Add new</a>

    </div>

    <thead>
        <tr>
            <th> <input id="selectAllBoxes" type="checkbox"></input> </th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>View Post</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>
    </thead>  

</form>

<tbody>

    <?php
        $query = "select * from posts";
        $select_posts = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];

            $query = "select * from categories where cat_id = {$post_category_id}";
            $select_categories_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<td>{$cat_title}</td>";

            }

            echo "<tr>";

            ?>

            <td> <input class='checkBoxes' type='checkbox' name='checkBoxArray[]' 
            value='<?php echo $post_id; ?>'></input> </td>

            <?php

            echo "<td>{$post_id}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$post_author}</td>";
            
            echo "<td>{$post_status}</td>";
            echo "<td><img width='100' src='../images/$post_image' alt='posts-image'></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";

            echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";

            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "</tr>";
        }
    ?>

</tbody>

</table>


<?php
    if (isset($_GET["delete"])) {
        $the_post_id = $_GET["delete"];

        $query = "delete from posts where post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);

        header("Location: posts.php");
    }

include "admin_footer.php";
?>

