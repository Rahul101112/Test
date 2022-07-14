<?php

include 'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["login_submit"])) {
            $email = $_POST['email'];
            $password =  $_POST['password'];
            $error = array();

            // validate data         
            if (empty($email)) $error['email'] = "Email shoud not be blank!";
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email'] = "Invalid email format";
            if (empty($password)) $error['password'] = "Password is required";
            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }
            $email = sql_prevent($conn, xss_prevent($_POST["email"]));
            $password = sql_prevent($conn, xss_prevent($_POST["password"]));

            $find_user = "SELECT * FROM user WHERE email = '$email'";
            $query = mysqli_query($conn, $find_user);
            $result = mysqli_num_rows($query);

            if ($result == 1) {
                $user = mysqli_fetch_assoc($query);
                $DB_pass = $user['password'];
                if ($DB_pass == $password) {
                    echo json_encode(array("success" => true, "message" => "Welcome to AI admin."));
                    die();
                } else {
                    $error['password'] = "Invalid password";
                    if (sizeof($error) > 0) {
                        echo json_encode(array("success" => false, "data" => $error));
                        die;
                    }
                   
                }
            } else {
                $error['email'] = "Invalid email address";
                if (sizeof($error) > 0) {
                    echo json_encode(array("success" => false, "data" => $error));
                    die;
                }
            };
        };
    } else {
        echo ("Method 1 not found");
    }
} else {
    echo ("Method 2 not found");
}
