<?php
require  'function.php';

if ($_POST['country']) {
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
}
