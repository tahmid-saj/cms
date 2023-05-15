<?php

if (isset($_GET["p_id"])) {
    $the_post_id = $_GET["p_id"];
}

$query = "select * from posts";
$select_posts_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
}

// if (isset($_POST["create_post"])) {
//     $post_title = $_POST["title"];
//     $post_author = $_POST["author"];
//     $post_category_id = $_POST["post_category_id"];
//     $post_status = $_POST["post_status"];

//     $post_image = $_FILES["image"]['name'];
//     $post_image_temp = $_FILES["image"]['tmp_name'];

//     $post_tags = $_POST["post_tags"];
//     $post_content = $_POST["post_content"];
//     $post_date = date("d-m-y");
//     $post_comment_count = 4;

//     move_uploaded_file($post_image_temp, "../images/$post_image");

//     $query = "insert into posts(post_category_id, post_title, post_author, post_date, post_image, 
//     post_content, post_tags, post_comment_count, post_status) ";

//     $query .= "values ('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}',
//     '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";

//     $create_post_query = mysqli_query($connection, $query);

//     confirmQuery($create_post_query);
// }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <select name="post_category" id="post_category">
            <?php
                $query = "select * from categories";
                $select_categories = mysqli_query($connection, $query);

                confirmQuery($select_categories);
    
                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";

                }

            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        <?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>