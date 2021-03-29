<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    require "./config.php";

    $email = mysqli_real_escape_string($link, $_POST["email"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);

    $query = "SELECT * FROM employee where _email = '$email';";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    
    if (mysqli_num_rows($result) > 0) {
        $password_db = $row['_password'];

        if (password_verify($password, $password_db)) {
            $_SESSION['name'] = $row['_name'];
            $_SESSION['img'] = $row['img'];
            $_SESSION['email'] = $row['_email'];
            echo json_encode(array('auth' => true));
            exit;
        } else {
            echo json_encode(array('password' => false));
            exit;
        }
    } else {
        echo json_encode(array('email' => false));
        exit;
    }
} else {
    header("Location: http://localhost/proge/index.php");
    exit;
}
