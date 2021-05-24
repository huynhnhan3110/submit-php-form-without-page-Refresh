<?php
    $name = $_GET['name'];
    $email = $_GET['email'];
    $gender = $_GET['gender'];
    $comment = $_GET['comment'];

    require 'conn.php';
    $sql = "INSERT INTO user(name,email,gender,comment) VALUES('$name','$email','$gender','$comment')";
    $result = $con->query($sql);

    if($result == NULL) {
        echo "Xay ra loi!";
    } else {
        echo "Them thanh cong";
    }
    $con->close();
?>