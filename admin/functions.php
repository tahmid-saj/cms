<?php


function users_online() {
    global $connection;

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

    $users_online_query = mysqli_query($connection, "select * from users_online where time > '$time_out'");
    return mysqli_num_rows($users_online_query);

}


    function confirmQuery($result) {
        global $connection;

        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }
    }

    function insert_categories() {
        global $connection;

        if (isset($_POST['submit'])) {
            $cat_title = $_POST['cat_title'];

            if ($cat_title == "" || empty($cat_title)) {
                echo "This field should not be empty";
            } else {
                $query = "insert into categories(cat_title)";
                $query .= "value('{$cat_title}')";
                $create_category_query = mysqli_query($connection, $query);

                if (!$create_category_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
            }
        }
    }

    function findAllCategories() {
        global $connection;

        $query = "select * from categories limit 10";
        $select_categories = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<tr>";
            echo "<td>{$cat_id}</td>";  
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "<tr>";
        }
    }

    function deleteCategories() {
        global $connection;

        if (isset($_GET["delete"])) {
            $the_cat_id = $_GET['delete'];

            $query = "delete from categories where cat_id = {$the_cat_id}";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
        }
    }
?>