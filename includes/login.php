<?php 
include "db.php";

session_start();

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "select * from users where username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        die("Query failed" . mysqli_error($connection));
    }

}

while ($row = mysqli_fetch_assoc($select_user_query)) {
    $db_user_id = $row["user_id"];
    $db_username = $row["username"];
    $db_password = $row["user_password"];
    $db_user_firstname = $row["user_firstname"];
    $db_user_lastname = $row["user_lastname"];
    $db_user_role = $row["user_role"];

}

if ($username !== $db_username && $password !== $db_user_password) {
    header("Location: ../header.php");
} else if ($username == $db_username && $password == $db_user_password) {
    $_SESSION["username"] = $db_username;
    $_SESSION["user_firstname"] = $db_user_firstname;
    $_SESSION["user_lastname"] = $db_user_lastname;
    $_SESSION["user_role"] = $db_user_role;


    header("Location: ..admin");
} else {
    header("Location: ../index.php")
}

?>