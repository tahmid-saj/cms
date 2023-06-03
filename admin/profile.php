<?php include "includes/admin_header.php";?>


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
                                <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
                            </div>

                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>


<?php include "includes/admin_footer.php"?>