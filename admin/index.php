<?php include "includes/admin_header.php";?>

    <div id="wrapper">

    <?php if ($connection) {
        echo "conn";
    }?>

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

                            <!-- <?php 
                                echo $_SESSION["username"];
                            ?> -->

                            <small>Author</small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                       
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php
                                        $query = "select * from posts";
                                        $select_all_post = mysqli_query($connection, $query);
                                        $post_count = mysqli_num_rows($select_all_post);

                                        echo "<div class='huge'>{$post_count}</div>"

                                    ?>

                                
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php
                                        $query = "select * from comments";
                                        $select_all_comments = mysqli_query($connection, $query);
                                        $comment_counts = mysqli_num_rows($select_all_comments);

                                        echo "<div class='huge'>{$comment_counts}</div>"

                                    ?>

                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php
                                        $query = "select * from users";
                                        $select_all_users = mysqli_query($connection, $query);
                                        $user_counts = mysqli_num_rows($select_all_users);

                                        echo "<div class='huge'>{$user_counts}</div>"

                                    ?>

                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php
                                        $query = "select * from categories";
                                        $select_all_categories = mysqli_query($connection, $query);
                                        $category_counts = mysqli_num_rows($select_all_categories);

                                        echo "<div class='huge'>{$category_counts}</div>"

                                    ?>

                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                                <!-- /.row -->

                <div class="row">
                <script type="text/javascript">
                    google.charts.load("current", {packages:['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ["Element", "Density", { role: "style" } ],
                        ["Copper", 8.94, "#b87333"],
                        ["Silver", 10.49, "silver"],
                        ["Gold", 19.30, "gold"],
                        ["Platinum", 21.45, "color: #e5e4e2"]
                    ]);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                                    { calc: "stringify",
                                        sourceColumn: 1,
                                        type: "string",
                                        role: "annotation" },
                                    2]);

                    var options = {
                        title: "Density of Precious Metals, in g/cm^3",
                        width: 600,
                        height: 400,
                        bar: {groupWidth: "95%"},
                        legend: { position: "none" },
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                    chart.draw(view, options);
                }
                </script>

                <div id="columnchart_values" style="width: 900px; height: 300px;"></div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>


<?php include "includes/admin_footer.php"?>