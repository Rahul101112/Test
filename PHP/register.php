
<?php
require  'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["register_submit"])) {
            $name = $_POST["name"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $c_password = $_POST["c_password"];
            $country = $_POST["country"];
            $state = $_POST["state"];
            $error = array();

            // validate data         
            if (empty($name)) $error['name'] = "Name shoud not be blank!";
            else if (!preg_match("/^[a-zA-Z ]*$/", $name)) $error['name'] = "Invalid name format";
            if (empty($email)) $error['email'] = "Email is required";
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email'] = "Invalid email format";
            if (empty($state)) $error['state'] = "state is required";
            if (empty($country)) $error['country'] = "country is required";
            if ($password !== $c_password) {
                $error['password'] = "Password should be same.";
            }
            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // run sql

            $sql = "INSERT INTO user(name, email, password, country, state) VALUES ('$name','$email','$password','$country','$state')";
            if ($conn->query($sql) == TRUE) {
                echo json_encode(array("success" => true, "message" => "Register Successfully "));
            } else {
                echo json_encode(array("success" => false, "message" => "Fill the form correctly"));
            }
        } elseif ($_POST['country']) {
            $sql = "SELECT * FROM state  WHERE c_id =" . $_POST['country'];
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                echo '<option value="">Select State </option>';

                while ($row = $result->fetch_assoc()) {
                    echo '<option value=' . $row['id'] . '>' . $row['state_name'] . '</option>';
                }
            } else {
                echo '<option value=>No data Found</option>';
            }
        } else {
            echo json_encode(array("success" => false, "message" => "Method 1 not found"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Method 2 not found"));
    }
}