<?php
include "includes/db.php";
?>

<?php
include "includes/header.php";
?>

<?php
    $session = session_id();
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;

    $query = "select * from users_online where session = '$session'";
    $send_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($send_query);

    if ($count == null) {
        mysqli_query($connection, "insert into users_online (session, time) values ('{$time}', '{$session}')");

    } else {
        mysqli_query($connection, "update users_online set time = '{$time}' where session = {$session}");

    }

    $users_online_query = mysqli_query($connection, "select * from users_online where time < '$time_out'");
    $count_user = mysqli_num_rows($users_online_query);

?>

<?php
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1>
                    <?php echo $count_user; ?>
                </h1>

                <?php 

                $per_page = 5;

                    if (isset($_GET["page"])) {
                        $per_page = 2;
                        $page = $_GET["page"];

                    } else {
                        $page = "";
                    }

                    if ($page == "" || $page == 1) {
                        $page_1 = 0;
                    } else {
                        $page_1 = ($page * $per_page) - $per_page;
                    }

                    $select_post_query_count = "select * from posts";
                    $find_count = mysqli_query($connection, $select_post_query_count);
                    $count = mysqli_num_rows($find_count);

                    $count = ceil($count / $per_page);


                ?>

            <?php
                $query = "select * from posts limit {$page_1}, 5";

                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_title = $row["post_title"];
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 50);
                    $post_status = $row["post_status"];

                    if ($post_status == "published") {
                        ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->

                        <h1><?php echo $count; ?></h1>

                        <h2>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>

                    <a href="post.php?p_id=<?php echo $post_id;?>">

                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">

                    </a>

                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                        <?php
                    }
            

                }
            ?>



            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php 
            include "includes/sidebar.php";
            ?>


        </div>
        <!-- /.row -->

        <ul class="pager">

        <?php
            for ($i = 1; $i <= $count; $i++) {
                if ($i == $page) {
                    echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                } else {
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }

                
            }

        ?>

            <li><a href="">1</a></li>

            <li><a href="">2</a></li>

        </ul>

        <hr>

<?php
include "includes/footer.php";
?>
