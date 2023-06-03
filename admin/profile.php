<?php include "includes/admin_header.php";?>

<?php
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $query = "select * from users where username = '{$username}'";

        $select_user_profile_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_user_profile_query)) {

            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }
?>

<?php
    if (isset($_POST["edit_user"])) {
        // $user_id = $_POST["user_id"];
        $user_firstname = $_POST["user_firstname"];
        $user_lastname = $_POST["user_lastname"];
        $user_role = $_POST["user_role"];
    
        // $post_image = $_FILES["image"]['name'];
        // $post_image_temp = $_FILES["image"]['tmp_name'];
    
        $username = $_POST["username"];
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];
    
        echo $user_firstname;
        // $post_date = date("d-m-y");
        // $post_comment_count = 4;
    
        // move_uploaded_file($post_image_temp, "../images/$post_image");
    
        $query = "update users set ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "where username = '{$username}'";
    
        $edit_user = mysqli_query($connection, $query);
    
        confirmQuery($edit_user);
    
        if (!$edit_user) {
            die("Query failed " . mysqli_error($connection));
        }
    }
    

?>


    <div id="wrapper">

    <?php
        include "includes/admin_navigation.php";
    ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="author">Firstname</label>
                                <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                            </div>

                            <div class="form-group">
                                <label for="post_status">Lastname</label>
                                <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                            </div>

                            <div class="form-group">
                                <select name="user_role" id="">

                                    <?php 
                                        if ($user_role == "admin") {
                                            ?>
                                            <option value="Admin"><?php echo $user_role; ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="Subscriber"><?php echo $user_role; ?></option>
                                            <?php
                                        }

                                    ?>

                                </select>
                            </div>

                            <!-- <div class="form-group">
                                <label for="post_image">Post Image</label>
                                <input type="file" name="image">
                            </div> -->

                            <div class="form-group">
                                <label for="post_tags">Username</label>
                                <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                            </div>

                            <div class="form-group">
                                <label for="post_content">Email</label>
                                <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="post_content">Password</label>
                                <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
                                </textarea>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                            </div>

                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>


<?php include "includes/admin_footer.php"?>